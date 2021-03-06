<?php

namespace App\Http\Controllers\Order;

use App\Dto\Order\UpdateOrderCollectionDto;
use App\Exceptions\Forbidden;
use App\Http\Controllers\Controller;
use App\Manager\Client\ClientManager;
use App\Manager\Order\OrderManager;
use App\Manager\Product\ProductManager;
use App\Service\Email\SenderService;
use App\Service\Order\BuildGraphService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @var OrderManager $orderManager
     */
    private $orderManager;

    /**
     * OrderController constructor.
     *
     * @param OrderManager $orderManager
     */
    public function __construct(OrderManager $orderManager)
    {
        $this->orderManager = $orderManager;
    }

    /**
     * View orders page
     *
     * @return Factory|View|void
     * @throws Exception
     */
    public function index()
    {
        try {
            $orders = $this->orderManager->getOrders();

            return view('order.index', compact('orders'));
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @param ClientManager $clientManager
     * @param ProductManager $productManager
     * @return void
     * @throws Exception
     */
    public function edit($id, ClientManager $clientManager, ProductManager $productManager)
    {
        try {
            $order = $this->orderManager->getEditOrderById($id);
            $clients = $clientManager->getClients();
            $products = $productManager->getProducts();

            return view('order.edit', compact('order', 'clients', 'products'));
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        try {
            $client = $request->get('client', '');
            $product = $request->get('product', '');
            $total = $request->get('total', '');

            $dataOrder = new UpdateOrderCollectionDto(
                (int) $id,
                (int) $client,
                (int) $product,
                (float) $total
            );
            $validation = $this->orderManager->orderValidation($dataOrder);
            if(!empty($validation)) {

                return redirect('orders/' . $id . '/edit')
                    ->withErrors($validation)
                    ->withInput();
            }

            $this->orderManager->updateOrder($dataOrder);

            return back()->with('success', Lang::get('order.messages.update.success'));
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|void
     */
    public function destroy($id)
    {
        try {
            $this->orderManager->deleteOrder($id);

            return $this->jsonResponse();
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }

    /**
     * Search by selected field
     *
     * @param Request $request
     * @return Factory|View|void
     * @throws Exception
     */
    public function search(Request $request)
    {
        try {
            $orders = [];

            $searchKeyword = $request->get('keyword');
            $searchField = $request->get('field');
            if (!(empty($searchKeyword)) && !(empty($searchField))) {
                $orders = $this->orderManager->searchOrders($searchKeyword, $searchField);
            }


            return view('order.index', compact('orders', 'searchKeyword', 'searchField'));
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }

    /**
     * @param Request $request
     * @param BuildGraphService $buildGraphService
     * @return JsonResponse|void
     * @throws Exception
     */
    public function orderGraph(Request $request, BuildGraphService $buildGraphService)
    {
        try {
            $orders = [];
            $searchKeyword = $request->get('keyword');
            $searchField = $request->get('field');
            if (!(empty($searchKeyword)) && !(empty($searchField))) {
                $orders = $this->orderManager->searchOrders($searchKeyword, $searchField);
            } elseif((empty($searchKeyword)) && (empty($searchField))) {
                $orders = $this->orderManager->getOrders();
            }


            $buildGraphService->dataSet($orders);
            $buildGraphService->build();
            $graph = $buildGraphService->getGraph();

            return $this->jsonResponse($graph);

        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }

    /**
     * Send orders report to email
     *
     * @param Request $request
     * @param SenderService $senderService
     * @return void
     * @throws Exception
     */
    public function orderSendReport(Request $request, SenderService $senderService)
    {
        try {
            $orders = [];
            $searchKeyword = $request->get('keyword');
            $searchField = $request->get('field');
            if (!(empty($searchKeyword)) && !(empty($searchField))) {
                $orders = $this->orderManager->searchOrders($searchKeyword, $searchField);
            } elseif((empty($searchKeyword)) && (empty($searchField))) {
                $orders = $this->orderManager->getOrders();
            }

            // Send report to email
            $senderService->ordersReport(config('mail.to_addresses'), $orders);

            return back();
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }
}

<?php

namespace App\Http\Controllers\Order;

use App\Exceptions\Forbidden;
use App\Http\Controllers\Controller;
use App\Manager\Order\OrderManager;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @var OrderManager $repository
     */
    private $manager;

    /**
     * OrderController constructor.
     *
     * @param OrderManager $manager
     */
    public function __construct(OrderManager $manager)
    {
        $this->manager = $manager;
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
            $data = $this->manager->getOrders();

            return view('order.index', compact('data'));
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
     * @return void
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
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
            $data = [];

            $searchKeyword = $request->get('keyword');
            $searchField = $request->get('field');
            if ($searchKeyword) {

                $data = $this->manager->searchOrders($searchKeyword, $searchField);
            }


            return view('order.index', compact('data', 'searchKeyword', 'searchField'));
        } catch (Forbidden $e) {

            return abort($e->getCode());
        }
    }
}

<?php

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demoData = [
            'clients' => [
                [
                    'name' => 'Acme',
                ],
                [
                    'name' => 'Microsoft',
                ],
                [
                    'name' => 'Apple',
                ],
            ],
            'products' => [
                [
                    'name'      => 'The Matrix Trilogy',
                    'price'     => 29,
                    'elements'  => 19,
                    'repeat'    => true,
                ],
                [
                    'name'      => 'MacBook Air',
                    'price'     => 1199,
                    'elements'  => 19,
                    'repeat'    => true,
                ],
                [
                    'name'      => 'Server Rack',
                    'price'     => 10000,
                    'elements'  => 0,
                    'repeat'    => false,
                ],
                [
                    'name'      => 'Server Farm',
                    'price'     => 100000,
                    'elements'  => 0,
                    'repeat'    => false,
                ],
                [
                    'name'      => 'Watch',
                    'price'     => 399,
                    'elements'  => 0,
                    'repeat'    => false,
                ],
            ],
            'orders' => [
                'repeat' => [
                    [
                        'client_id' => 1,
                        'products'  => [
                            1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
                        ],
                        'price'     => 29,
                    ],
                    [
                        'client_id' => 2,
                        'products'  => [
                            20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38,
                        ],
                        'price'     => 1199,
                    ],
                ],
                'unique' => [
                    'products'  => [
                        [
                            'id'        => 39,
                            'client_id' => 3,
                            'price'     => 10000
                        ],
                        [
                            'id'        => 40,
                            'client_id' => 3,
                            'price'     => 100000
                        ],
                        [
                            'id'        => 41,
                            'client_id' => 3,
                            'price'     => 399
                        ],
                    ]
                ],
            ]
        ];

        // Insert clients
        foreach ($demoData['clients'] as $client) {
            Client::create($client);
        }

        // Insert products
        foreach ($demoData['products'] as $row) {
            if($row['repeat']) {
                for ($i = 1; $i <= $row['elements']; $i++) {
                    $product = [
                        'name' => $row['name'] . ' ' . $i,
                        'price' => $row['price'] + $i,
                    ];
                    Product::create($product);
                }

                continue;
            }

            $product = [
                'name'  => $row['name'],
                'price' => $row['price'],
            ];
            Product::create($product);
        }

        // Insert orders
        foreach ($demoData['orders']['repeat'] as $row) {
            for ($i = 0; $i < count($row['products']); $i++) {
                $product = [
                    'client_id' => $row['client_id'],
                    'product_id' => $row['products'][$i],
                    'total' => $row['price'] + ($i + 1),
                ];
                Order::create($product);
            }
        }

        foreach ($demoData['orders']['unique']['products'] as $row) {
            $product = [
                'client_id' => $row['client_id'],
                'product_id' => $row['id'],
                'total' => $row['price'],
            ];
            Order::create($product);
        }
    }
}

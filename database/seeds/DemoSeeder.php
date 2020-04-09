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
                [
                    'client_id' => 1,
                    'product_id' => 1,
                    'total' => 30,
                    'created_at' => '2015-02-01',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 2,
                    'total' => 31,
                    'created_at' => '2015-02-02',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 3,
                    'total' => 32,
                    'created_at' => '2015-02-03',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 4,
                    'total' => 33,
                    'created_at' => '2015-02-04',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 5,
                    'total' => 34,
                    'created_at' => '2015-02-05',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 6,
                    'total' => 35,
                    'created_at' => '2015-02-06',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 7,
                    'total' => 36,
                    'created_at' => '2015-02-07',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 8,
                    'total' => 37,
                    'created_at' => '2015-02-08',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 9,
                    'total' => 38,
                    'created_at' => '2015-02-09',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 10,
                    'total' => 49,
                    'created_at' => '2015-02-10',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 11,
                    'total' => 40,
                    'created_at' => '2015-02-11',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 12,
                    'total' => 41,
                    'created_at' => '2015-02-12',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 13,
                    'total' => 42,
                    'created_at' => '2015-02-13',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 14,
                    'total' => 43,
                    'created_at' => '2015-02-14',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 15,
                    'total' => 44,
                    'created_at' => '2015-02-15',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 16,
                    'total' => 45,
                    'created_at' => '2015-02-16',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 17,
                    'total' => 46,
                    'created_at' => '2015-02-17',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 18,
                    'total' => 47,
                    'created_at' => '2015-02-18',
                ],
                [
                    'client_id' => 1,
                    'product_id' => 19,
                    'total' => 48,
                    'created_at' => '2015-02-19',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 20,
                    'total' => 1200,
                    'created_at' => '2015-02-19',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 21,
                    'total' => 1201,
                    'created_at' => '2015-02-20',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 22,
                    'total' => 1202,
                    'created_at' => '2015-02-21',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 23,
                    'total' => 1203,
                    'created_at' => '2015-02-22',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 24,
                    'total' => 1204,
                    'created_at' => '2015-02-23',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 25,
                    'total' => 1205,
                    'created_at' => '2015-02-24',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 26,
                    'total' => 1206,
                    'created_at' => '2015-02-25',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 27,
                    'total' => 1207,
                    'created_at' => '2015-02-26',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 28,
                    'total' => 1208,
                    'created_at' => '2015-02-27',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 29,
                    'total' => 1209,
                    'created_at' => '2015-02-28',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 30,
                    'total' => 1210,
                    'created_at' => '2015-03-01',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 31,
                    'total' => 1211,
                    'created_at' => '2015-03-02',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 32,
                    'total' => 1212,
                    'created_at' => '2015-03-03',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 33,
                    'total' => 1213,
                    'created_at' => '2015-03-04',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 34,
                    'total' => 1214,
                    'created_at' => '2015-03-05',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 35,
                    'total' => 1215,
                    'created_at' => '2015-03-06',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 36,
                    'total' => 1216,
                    'created_at' => '2015-03-07',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 37,
                    'total' => 1217,
                    'created_at' => '2015-03-08',
                ],
                [
                    'client_id' => 2,
                    'product_id' => 38,
                    'total' => 1218,
                    'created_at' => '2015-03-09',
                ],
                [
                    'client_id' => 3,
                    'product_id' => 39,
                    'total' => 10000,
                    'created_at' => '2015-02-10',
                ],
                [
                    'client_id' => 3,
                    'product_id' => 40,
                    'total' => 100000,
                    'created_at' => '2015-02-28',
                ],
                [
                    'client_id' => 3,
                    'product_id' => 41,
                    'total' => 399,
                    'created_at' => '2015-03-09',
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
                        'name'  => $row['name'] . ' ' . $i,
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
        foreach ($demoData['orders'] as $row) {
            $product = [
                'client_id'     => $row['client_id'],
                'product_id'    => $row['product_id'],
                'total'         => $row['total'],
                'created_at'    => $row['created_at'],
            ];
            Order::create($product);
        }
    }
}

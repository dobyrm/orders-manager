<?php

namespace App\Service\Order;

final class BuildGraphService
{
    /**
     * @var null $data
     */
    private $data = [];

    /**
     * @var null $result
     */
    private $result = [];

    /**
     * Set data for build graph
     *
     * @param array $data
     */
    public function dataSet(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Building graph by set data
     */
    public function build()
    {
        $this->calculations();
    }

    /**
     * Get graph by set data
     *
     * @return array
     */
    public function getGraph(): array
    {
        return $this->result;
    }

    /**
     * Calculations for graph
     */
    private function calculations()
    {
        $set = [
            'labels'    => [],
            'datasets'  => [
                'date'      => [],
                'profit'    => [],
            ],
        ];

        foreach ($this->data as $key => $order) {
            $set['labels'][] = $order->getDate();
            $set['datasets']['date'][] = $order->getDate();
            $set['datasets']['profit'][] = $order->getTotal();
        }

        $this->result = $set;
    }
}

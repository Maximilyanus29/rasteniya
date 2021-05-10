<?php

namespace frontend\components\cart;

class CalculatorForCart
{
    /**
     * @param CartItem[] $items
     * @param $withDiscount
     * @return integer
     */
    public function getCost(array $items, $withDiscount)
    {
        $cost = 0;
        foreach ($items as $item) {
            $cost += $item->getCost($withDiscount);
        }
        return $cost;
    }


    /**
     * @param \devanych\cart\CartItem[] $items
     * @return integer
     */
    public function getCount(array $items)
    {
        $count = 0;
        foreach ($items as $item) {
            $count += $item->getQuantity();
        }
        return $count;
    }
}

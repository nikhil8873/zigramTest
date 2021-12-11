<?php
class ElectronicItems {

    private $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getSortedItems()
    {
        $sorted = [];

        foreach ($this->items as $item) {
            $price = $item->price;
            if(count($item->extra))
            {
                foreach ($item->extra as $extra) {
                    $price += $extra->price;
                }
            }
            $sorted[$price] = $item;
        }

        ksort($sorted,SORT_NUMERIC);
        return $sorted;
    }

    public function getItemsTotalPrice()
    {
        $sum = 0;
        foreach ($this->getSortedItems() as $key => $value) {
            $sum += $key;
        }

        return $sum;
    }

    public function getItemsByType($type)
    {
        if (in_array($type,ElectronicItem::$types)) {
            $callback = function($item) use ($type){
                return $item->getType() == $type;
            };

            $items = array_filter($this->items,$callback);
            return $items;
        }

        return false;
    }
}
?>
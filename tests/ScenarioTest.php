<?php

include "./src/ElectronicItem.php";
include "./src/ElectronicItems.php";

use PHPUnit\Framework\TestCase;

class ScenarioTest extends TestCase
{
    public function testScenario1()
    {
        $cart = [];
        $extra = [];

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(200);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(250);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(150);
        $item->setWired(1);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(200);
        $item->setWired(1);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
        $item->setPrice(5000);
        $item->setExtra($extra);
        array_push($cart, $item);

        $extra = [];

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(200);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(250);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_TELEVISION);
        $item->setPrice(5000);
        $item->setExtra($extra);

        array_push($cart, $item);

        $extra = [];

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);
        $item->setPrice(250);
        array_push($extra, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_TELEVISION);
        $item->setPrice(3000);
        $item->setExtra($extra);


        array_push($cart, $item);

        $item = new ElectronicItem;
        $item->setType(ElectronicItem::ELECTRONIC_ITEM_MICROWAVE);
        $item->setPrice(2000);

        array_push($cart, $item);


        $electronicItems = new ElectronicItems($cart);

        $sorted = [];

        foreach ($cart as $item) {
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

        $sortedCart = $electronicItems->getSortedItems();

        $this->assertEquals($sorted , $sortedCart , "Incorrect sorting by price");


        $price = $electronicItems->getItemsTotalPrice();

        $this->assertEquals(16500 , $price , "Incorrect total pricing");
        
        return $electronicItems;

    }

    /**
     * @depends testScenario1
     */

    public function testScenario2($electronicItems)
    {
        
        $console = $electronicItems->getItemsByType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);

        $electronicItems = new ElectronicItems($console);
        $price = $electronicItems->getItemsTotalPrice();

        $this->assertEquals(5800 , $price , "Incorrect console pricing with controllers");
    }
}

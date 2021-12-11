<?php
include "ElectronicItem.php";
include "ElectronicItems.php";

$input = [
    [
        'type' => 'console',
        'remote' => 2,
        'wired' => 2,
    ],

    [
        'type' => 'television',
        'remote' => 2,
        'wired' => 0

    ],

    [
        'type' => 'television',
        'remote' => 1,
        'wired' => 0

    ],

    [
        'type' => 'microwave',
        'remote' => 0,
        'wired' => 0
    ],
];

function createElectronicItemList($type, $remoteController, $wiredController, $wired , $price = -1)
{
    $item = new ElectronicItem;
    $item->setType($type);
    
    if($price == -1)
        $price = rand(1000, 10000);

    $item->setPrice($price);
    $item->setWired($wired);
    $extra = [];
    $maxExtra = $item->maxExtra($type);

    if ($maxExtra == -1 || ($maxExtra >= ($remoteController + $wiredController))) {
        for ($j = 0; $j < $remoteController; $j++) {
            array_push($extra, createElectronicItemList(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 0, 0, 0));
        }
        for ($k = 0; $k < $wiredController; $k++) {
            array_push($extra, createElectronicItemList(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER, 0, 0, 1));
        }
    }
    $extras = new ElectronicItems($extra);
    $item->setExtra($extras->getSortedItems());
    return $item;
}

$cart = [];

foreach ($input as $item) {
    array_push($cart, createElectronicItemList($item['type'], $item['remote'], $item['wired'], 0));
}

$cartItems = new ElectronicItems($cart);

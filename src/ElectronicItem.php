<?php

class ElectronicItem {

    public $price;
    public $wired; // 1 - for wired , 0 - for remote
    private $type;
    public $extra;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';

    public static $types = [self::ELECTRONIC_ITEM_CONSOLE,self::ELECTRONIC_ITEM_MICROWAVE,self::ELECTRONIC_ITEM_TELEVISION];

    function __construct()
    {
        $this->wired = 0;
        $this->extra = [];
    }

    function getPrice()
    {
        return $this->price;
    }

    function getWired()
    {
        return $this->wired;
    }

    function getType()
    {
        return $this->type;
    }

    function getExtra()
    {
        return $this->extra;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

   

    function setWired($wired)
    {
        $this->wired = $wired;
    }

    function setType($type)
    {
        $this->type = $type;
    }

  

    function setExtra($extra)
    {
        $this->extra = $extra;
    }


    public function maxExtra($type)
    {
        switch ($type) {
            case self::ELECTRONIC_ITEM_CONSOLE:
                return 4;
                break;

            case self::ELECTRONIC_ITEM_TELEVISION:
                return -1;
                break;
                    
            case self::ELECTRONIC_ITEM_MICROWAVE:
                return 0;
                break;

            case self::ELECTRONIC_ITEM_CONTROLLER:
                return 0;
                break;
            
        }
    }
}

?>
<?php


class product
{
    private $price;
    private $id;
    private $stock;
    private $title;
    private $quantity;
    private $shortdesc;
    private $cat;
    private $subcat;

    function __construct($id, $price, $stock, $title, $shortdesc, $cat, $subcat, $quantity)
    {
        $this->id = $id;
        $this->price = $price;
        $this->stock = $stock;
        $this->title = $title;
        $this->shortdesc = $shortdesc;
        $this->cat = $cat;
        $this->subcat = $subcat;
        $this->quantity = $quantity;
    }

    function getId()
    {
        return $this->id;
    }

    function getTitle()
    {
        return $this->title;
    }


    function getStock()
    {
        return $this->stock;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getShortdesc()
    {
        return $this->shortdesc;
    }

    function getCat()
    {
        return $this->cat;
    }

    function getSubcat()
    {
        return $this->subcat;
    }

    function getQuantity()
    {
        return $this->quantity;
    }

    function deleteQ()
    {
        $this->quantity = 0;
    }

    function addQ($quantity)
    {
        $this->quantity += $quantity;
    }

    function adjustQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}

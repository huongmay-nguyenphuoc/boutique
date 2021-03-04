<?php


class product
{
    private $price;
    private $id;
    private $stock;
    private $title;
    private $quantity;
    private $shortdesc;
    private $description;
    private $cat;
    private $subcat;
    private $picture;
    private $reference;

    function __construct($id, $ref, $price, $stock, $title, $description, $shortdesc, $cat, $subcat, $picture, $quantity)
    {
        $this->id = $id;
        $this->price = $price;
        $this->reference = $ref;
        $this->stock = $stock;
        $this->title = $title;
        $this->description = $description;
        $this->shortdesc = $shortdesc;
        $this->cat = $cat;
        $this->subcat = $subcat;
        $this->quantity = $quantity;
        $this->picture = $picture;
    }


    function getId()
    {
        return $this->id;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getReference()
    {
        return $this->reference;
    }

    function getStock()
    {
        return $this->stock;
    }

    function getPrice()
    {
        return $this->price;
    }

    function getPicture()

    {
        return $this->picture;
    }

    function getDescription()
    {
        return $this->description;
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

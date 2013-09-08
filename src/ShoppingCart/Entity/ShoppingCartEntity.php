<?php
/**
 * Basic Shopping Cart entity
 * -------------------------------------------------------
 * You can easily create your own Entity to pass any parameters you need to have in Cart. 
 * Just create Cart Entity in your module, don't forget to implement ShoppingCartEntityInterface.
 * Here are 4 required fields to have Cart working: id, product, qty, price.
 * 
 * @package ShoppingCart
 * @subpackage Entity
 * @author Aleksander Cyrkulewski
 */
namespace ShoppingCart\Entity;

use ShoppingCart\Entity\ShoppingCartEntityInterface;

class ShoppingCartEntity implements ShoppingCartEntityInterface
{

    protected $id;

    protected $product;

    protected $qty;

    protected $price;

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setProduct($product)
    {
        $this->product = $product;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}
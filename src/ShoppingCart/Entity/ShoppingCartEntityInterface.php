<?php
namespace ShoppingCart\Entity;

/**
 *
 * @package ShoppingCart
 * @subpackage Entity
 * @author Aleksander Cyrkulewski
 */
interface ShoppingCartEntityInterface
{
    public function getId();

    public function getProduct();
    
    public function getQty();
    
    public function getPrice();
    
    public function setId($id);
   
    public function setProduct($product);
   
    public function setQty($qty);
    
    public function setPrice($price);
}
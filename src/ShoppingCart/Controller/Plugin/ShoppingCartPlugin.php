<?php
/**
 * ShoppingCart Plugin
 * Provides basic functionality of Shopping Cart.
 *
 * @package ShoppingCart
 * @subpackage Plugin
 * @author Aleksander Cyrkulewski
 */
namespace ShoppingCart\Controller\Plugin;

use ShoppingCart\Service\ShoppingCartService;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class ShoppingCartPlugin extends AbstractPlugin
{
    private $shoppingCartService;

    public function __construct (ShoppingCartService $shoppingCartService) {
        $this->setShoppingCartService($shoppingCartService);
    }

    /**
     * Add a product(s) to cart
     *
     * @param array $items
     * @return bool
     */
    public function insert (array $items) {
        return $this->getShoppingCartService()->insert($items);
    }

    /**
     * Delete all items from the cart
     *
     * @return bool
     */
    public function destroy () {
        return $this->getShoppingCartService()->destroy();
    }

    /**
     * Remove one item from shopping cart
     *
     * @param string $token
     * @return bool
     */
    public function remove ($token) {
        return $this->getShoppingCartService()->remove($token);
    }

    /**
     * Counts the total number of items in the cart
     *
     * @return int
     */
    public function total_items () {
        return $this->getShoppingCartService()->total_items();
    }

    /**
     * Counts the total sum of the cart
     *
     * @param int $round
     * @param bool $with_vat
     * @return number
     */
    public function total_sum ($round = 2, $with_vat = false) {
        return $this->getShoppingCartService()->total_sum($round, $with_vat);
    }

    /**
     * Return cart content
     *
     * @return array
     */
    public function cart () {
        return $this->getShoppingCartService()->cart();
    }

    /**
     * @param ShoppingCartService $shoppingCartService
     */
    public function setShoppingCartService($shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    /**
     * @return ShoppingCartService
     */
    public function getShoppingCartService()
    {
        return $this->shoppingCartService;
    }
}
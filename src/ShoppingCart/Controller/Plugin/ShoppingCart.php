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

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class ShoppingCart extends AbstractPlugin
{

    /**
     * @var Zend\Session\Container
     */
    private $session;

    /**
     * @var object
     */
    private $entityPrototype;

    /**
     * @var Hydrator
     */
    private $hydrator;

    /**
     * @var array
     */
    private $config;

    /**
     *
     * @param Zend\Session\Container $session            
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     *
     * @param $entityPrototype
     */
    public function setEntityPrototype($entityPrototype)
    {
        $this->entityPrototype = $entityPrototype;
    }

    /**
     *
     * @param Hydrator $hydrator            
     */
    public function setHydrator($hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @param array $config            
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * Add a product(s) to cart
     *
     * @param array $items            
     * @return true
     */
    public function insert(array $items)
    {
        if (! is_array($items) or empty($items)) {
            throw new \Exception('Only correct values could be saved in Shopping cart.');
        }
        
        if (! is_array($this->session['cart'])) {
            $this->session['cart'] = array();
        }
        
        if ($this->isMultidimention($items)) {
            foreach ($items as $item) {
                $this->session['cart'][$this->generateToken($item)] = $this->hydrator->hydrate($item, new $this->entityPrototype());
            }
        } else {
            $this->session['cart'][$this->generateToken($items)] = $this->hydrator->hydrate($items, $this->entityPrototype);
        }
        return true;
    }

    /**
     * Generate unique token ID for each item in cart
     *
     * @param array $item            
     * @return string
     */
    private function generateToken(array $item)
    {
        if (! is_array($item) or empty($item)) {
            throw new \Exception('The value must be an array.');
        }
        return sha1($item['id'] . $item['qty'] . time());
    }

    /**
     * Decide if given array is multidimentional array or not
     *
     * @param array $arr            
     * @return boolean
     */
    private function isMultidimention($arr)
    {
        if (! is_array($arr)) {
            return false;
        }
        foreach ($arr as $elm) {
            if (! is_array($elm)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Delete all items from the cart
     *
     * @return true
     */
    public function destroy()
    {
        $this->session->offsetUnset('cart');
        return true;
    }

    /**
     * Remove one item from shopping cart
     *
     * @param string $token            
     * @return true
     */
    public function remove($token)
    {
        unset($this->session['cart'][$token]);
        return true;
    }

    /**
     * Counts the total number of items in the cart
     *
     * @return int
     */
    public function total_items()
    {
        $total_items = 0;
        $items = $this->cart();
        if (is_array($items) and ! empty($items)) {
            foreach ($items as $item) {
                $total_items = + ($total_items + $item->getQty());
            }
        }
        return (int) $total_items;
    }

    /**
     * Counts the total sum of the cart
     *
     * @param int $round            
     * @param bool $with_vat            
     * @return number
     */
    public function total_sum($round = 2, $with_vat = false)
    {
        $sum = 0;
        $items = $this->cart();
        if (is_array($items) and ! empty($items)) {
            foreach ($items as $item) {
                $sum = + ($sum + ($item->getPrice() * $item->getQty()));
            }
        }
        if ($with_vat) {
            $vat = ($sum / 100) * $this->config['vat'];
            $sum = $sum + $vat;
        }
        return (float) round($sum, (int) $round);
    }

    /**
     * Return cart content
     *
     * @return array
     */
    public function cart()
    {
        $items = $this->session->offsetGet('cart');
        if (empty($items)) {
            return array();
        }
        return $items;
    }
}
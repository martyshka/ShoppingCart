<?php
/**
 * ShoppingCart Factory
 * Initializate Shopping Cart
 * 
 * @package ShoppingCart
 * @subpackage Factory
 * @author Aleksander Cyrkulewski
 */
namespace ShoppingCart\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\Container;
use ShoppingCart\Controller\Plugin\ShoppingCart;
use ShoppingCart\Hydrator\ShoppingCartHydrator;
use ShoppingCart\Entity\ShoppingCartEntity;

class ShoppingCartFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $servicelocator)
    {
        $allServices = $servicelocator->getServiceLocator();
        $config = $allServices->get('ServiceManager')->get('Configuration');
        
        if (! isset($config['shopping_cart'])) {
            throw new \Exception('Configuration ShoppingCart not set.');
        }
        
        $cart = new ShoppingCart();
        $cart->setHydrator(new ShoppingCartHydrator());
        $cart->setEntityPrototype(new ShoppingCartEntity());
        $cart->setSession(new Container($config['shopping_cart']['session_name']));
        $cart->setConfig($config['shopping_cart']);
        return $cart;
    }
}
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
use ShoppingCart\Controller\Plugin\ShoppingCartPlugin;
use ShoppingCart\Hydrator\ShoppingCartHydrator;
use ShoppingCart\Entity\ShoppingCartEntity;

class ShoppingCartPluginFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $servicelocator)
    {
        $shoppingCartService = $servicelocator->getServiceLocator()->get('ShoppingCartService');
        
        $cart = new ShoppingCartPlugin($shoppingCartService);
        return $cart;
    }
}
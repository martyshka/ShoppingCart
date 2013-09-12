<?php
/**
 *
 * @package ShoppingCart
 * @subpackage Hydrator
 * @author Aleksander Cyrkulewski
 */
namespace ShoppingCart\Hydrator;

use Zend\Stdlib\Hydrator\ClassMethods;

class ShoppingCartHydrator extends ClassMethods
{


    /**
     * Extract values from an object
     *
     * @param object $object 
     * @return array
     * @throws \Exception
     */
    public function extract($object)
    {
        if (! in_array('ShoppingCart\Entity\ShoppingCartEntityInterface', class_implements($object))) {
            throw new \Exception('$object must implement ShoppingCart\Entity\ShoppingCartEntityInterface');
        }
        
        $data = parent::extract($object);
        return $data;
    }


    /**
     * Hydrate $object with the provided $data.
     *
     * @param array $data 
     * @param object $object 
     * @return object
     * @throws \Exception
     */
    public function hydrate(array $data, $object)
    {
        if (! in_array('ShoppingCart\Entity\ShoppingCartEntityInterface', class_implements($object))) {
            throw new \Exception('$object must implement ShoppingCart\Entity\ShoppingCartEntityInterface');
        }
        return parent::hydrate($data, $object);
    }

}

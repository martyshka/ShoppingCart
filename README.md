ZendCart
============================

This model is a simple ZF2 Shopping Cart solution. Provide basic functionality to create and modify Shopping Cart with any content in it. Easy to extend, just create your own Cart Entity and push it during Cart initialisation.

Inspired by
------------
I was inspired to create the ShoppingCart by great job of Vincenzo Provenza and Concetto Vecchio (http://github.com/vikey89/ZendCart). Keeped the same idea behind but made it more flexible, easier to extend and simplier to change.


Installation
------------
For the installation uses composer [composer](http://getcomposer.org "composer - package manager").

```sh
php composer.phar require  cyrkulewski/shopping-cart:dev-master
```

Add this project in your composer.json:


    "require": {
        "cyrkulewski/shopping-cart": "dev-master"
    }
    

Post Installation
------------
Configuration:
- Add the module of `config/application.config.php` under the array `modules`, insert `ShoppingCart`.
- Copy a file named `shoppingcart.global.php.dist` to `config/autoload/` and change name to `shoppingcart.global.php`.
- Modify config to fit your expectations.


Examples
=====================================
Insert
------------
```php
$product = array(
    'id'      => 'XYZ',
    'qty'     => 1,
    'price'   => 15.15,
    'product' => 'Book',
);
$this->ZendCart()->insert($product);
```


Remove
------------
```php
$token => '4b848870240fd2e976ee59831b34314f7cfbb05b';
$this->ZendCart()->remove($token);
```

Destroy
------------
```php
$this->ZendCart()->destroy();
```

Cart
------------
```php
$this->ZendCart()->cart();
```

Total Sum
------------
```php
$this->ZendCart()->total_sum();
```

Total Items
------------
```php
$this->ZendCart()->total_items();
```


Example in controller
------------
```php
return new ViewModel(array(
    'cart' => $this->ZendCart()->cart(),
    'total_items' => $this->ZendCart()->total_items(),
    'total_sum' => $this->ZendCart()->total_sum(),
));
```


FunctionsReference
------------
<table>
    <tr>
    <td>Function</td>
    <td>Description</td></tr>
    <tr><td>$this->ZendCart()->insert();</td><td>Add a product to cart.</td></tr>
    <tr><td>$this->ZendCart()->remove();</td><td>Delete the item from the cart.</td></tr>
    <tr><td>$this->ZendCart()->destroy();</td><td>Delete all items from the cart.</td></tr>
    <tr><td>$this->ZendCart()->cart();</td><td>Extracts all items from the cart.</td></tr>
    <tr><td>$this->ZendCart()->total_sum();</td><td>Counts the total number of items in cart</td></tr>
    <tr><td>$this->ZendCart()->total_items();</td><td>Counts the total number of items in cart</td></tr>
</table>

Contributors
=====================================

* Aleksander Cyrkulewski - cyrkulewski@gmail.com

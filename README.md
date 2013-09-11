ShoppingCart
============================

This model is a simple ZF2 Shopping Cart solution. Provide basic functionality to create and modify Shopping Cart with any content in it. Easy to extend, just create your own Cart Entity and push it during Cart initialisation.

Inspired by
------------
I was inspired to create the ShoppingCart by great job of Vincenzo Provenza and Concetto Vecchio (http://github.com/vikey89/ZendCart). Keeped the same idea behind but made it more flexible, easier to extend and simplier to change.


Installation
------------
For the installation uses composer [composer](http://getcomposer.org "composer - package manager").
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
You can insert as many items to the cart as you want. Each entry in cart will have unique token to work with.
Example with one product:
```php
$product = array(
    'id'      => 'XYZ',
    'qty'     => 1,
    'price'   => 15.15,
    'product' => 'Book: ZF2 for beginners',
);
$this->ShoppingCart()->insert($product);
```
Example with 2 products:
```php
$products = array(
    array(
        'id'      => 'XYZ',
        'qty'     => 1,
        'price'   => 15.15,
        'product' => 'Book: ZF2 for beginners',
    ),
    array(
        'id'      => 'ZYX',
        'qty'     => 3,
        'price'   => 19.99,
        'product' => 'Book: ZF2 for advanced users',
    )
);
$this->ShoppingCart()->insert($products);
```


Remove
------------
```php
$token => '4b848870240fd2e976ee59831b34314f7cfbb05b';
$this->ShoppingCart()->remove($token);
```

Destroy
------------
Erase Shopping Cart completely.
```php
$this->ShoppingCart()->destroy();
```

Cart
------------
Get all content of Cart.
```php
$this->ShoppingCart()->cart();
```

Total Sum
------------
```php
$this->ShoppingCart()->total_sum();
```

Total Items
------------
```php
$this->ShoppingCart()->total_items();
```


Example in controller
------------
```php
return new ViewModel(array(
    'cart' => $this->ShoppingCart()->cart(),
    'total_items' => $this->ShoppingCart()->total_items(),
    'total_sum' => $this->ShoppingCart()->total_sum(),
));
```

How to change/extend Shopping Cart
=====================================
Provided Shopping Cart Entity is really basic one. You can change the structure of it. For example, if you need to add options to each item in the cart or to provide discount field and so on. What you should do:
* copy ShoppingCart/Entity/ShoppingCartEntity to your module
* modify YourModule/Entity/ShoppingCartEntity: add any fields you need to have
* during Shopping Cart initialisation provide your YourModule/Entity/ShoppingCartEntity

```php
$this->ShoppingCart()->setEntityPrototype(new YourModule/Entity/ShoppingCartEntity());
```


FunctionsReference
------------
<table>
    <tr>
    <td>Function</td>
    <td>Description</td></tr>
    <tr><td>$this->ShoppingCart()->insert();</td><td>Add item(s) to cart.</td></tr>
    <tr><td>$this->ShoppingCart()->remove();</td><td>Delete the item from the cart.</td></tr>
    <tr><td>$this->ShoppingCart()->destroy();</td><td>Delete all items from the cart.</td></tr>
    <tr><td>$this->ShoppingCart()->cart();</td><td>Extracts all items from the cart.</td></tr>
    <tr><td>$this->ShoppingCart()->total_sum();</td><td>Counts the total sum of all items in the cart.</td></tr>
    <tr><td>$this->ShoppingCart()->total_items();</td><td>Counts the total number of all items in the cart.</td></tr>
</table>

Contributors
=====================================

Aleksander Cyrkulewski - cyrkulewski@gmail.com

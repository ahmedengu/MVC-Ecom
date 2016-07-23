# MVC-Ecom
a simple Ecommerce script for ICC.Canada internship 
it build without using any frameworks as they requested
## features
* MVC
  * controllers
  * models
  * views
  * routes
* Users 
  * welcome mail
  *unique username and email validation
  * md5 password encription {without salt as its not meant for production}
* sessions [for the user login]
* cookies [for the shopping cart]
* products
  * can display one product
  * can display all products
* orders 
  * validate the orders befor submiting then redirect to paypal to do the transactios
  * can display user orders

## how to use
* edit config.php
* go to example.com/install.php 

## TODO
* improve the UI 
* create a REST api

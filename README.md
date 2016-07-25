# MVC-Ecom
a simple Ecommerce script for ICC.Canada internship 
it built without using any frameworks as they requested
Demo : http://nsg36268.tigrimigri.com/
## features
* MVC
  * controllers
  * models
  * views
  * routes
* Users 
  * welcome mail
  * unique username and email validation
  * md5 password encription {without salt as its not meant for production}
* sessions [for the user login]
* cookies [for the shopping cart]
* products
  * can display one product
  * can display all products
* orders 
  * validate the orders befor submiting then redirect to paypal to do the transactios
  * can display user orders

### requirements
php 5.6 or higher
## how to use
* edit config.php
* go to example.com/install.php (or import icc.sql) 

## TODO
* create a REST api
* admin dashboard
* installition wizard 

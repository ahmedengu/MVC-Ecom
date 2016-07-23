<?php
require_once("inc.php");
$URI = $_SERVER["REQUEST_URI"];

if (strpos($_SERVER["REQUEST_URI"], "?") !== false) {
    $URI = substr($URI, 0, strpos($_SERVER["REQUEST_URI"], "?"));

}
const R_INDEX = "/";
const R_USERS = "/users";
const R_USER = "/user/";

const R_REGISTER = "/register";
const R_LOGIN = "/login";
const R_LOGOUT = "/logout";
const R_PRODUCTS = "/products";
const R_PRODUCT = "/product/";
const R_ADD_PRODUCT = "/add_product";
const R_ORDERS = "/orders";
const R_ORDER = "/order/";
const R_ADD_ORDER = "/add_order";
const R_MY_ORDERS = "/my_orders";

if ($URI == R_INDEX)
    (new home())->index();
else if ($URI == R_USERS)
    (new users())->index();
else if (strpos($URI, R_USER) !== false)
    (new products())->product(str_replace(R_USER, '', $URI));
else if ($URI == R_REGISTER)
    (new users())->register();
else if ($URI == R_LOGIN)
    (new users())->login();
else if ($URI == R_LOGOUT)
    (new users())->logout();
else if ($URI == R_PRODUCTS)
    (new products())->index();
else if (strpos($URI, R_PRODUCT) !== false)
    (new products())->product(str_replace(R_PRODUCT, '', $URI));
else if ($URI == R_ADD_PRODUCT)
    (new products())->add();
else if ($URI == R_ORDERS)
    (new orders())->index();
else if (strpos($URI, R_ORDER) !== false)
    (new orders())->order(str_replace(R_ORDER, '', $URI));
else if ($URI == R_ADD_ORDER)
    (new orders())->add();
else if ($URI == R_MY_ORDERS)
    (new orders())->myOrders();
else
    not_found();


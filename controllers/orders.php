<?php
require_once(__DIR__ . "/../inc.php");

class orders
{

    public function index()
    {
        var_dump(order::getAll());

    }

    public function order($id)
    {
        main::order_render(order::getByID($id));

    }

    public function add()
    {
        if (count($_REQUEST) >= 1) {
            if (isset($_SESSION['user_id'])) {

                if ($this->addOrder()) {
                    setcookie("cart", "");
                    header("Location: https://www.paypal.com/"); //TODO: paypal

                } else {
                    main::message_render("something went wrong", "something went wrong", "something went wrong", "something went wrong");
                }

            } else {
                header("Location: " . R_LOGIN);
            }
        } else {
            if (isset($_COOKIE['cart']) && strlen($_COOKIE['cart']) > 0) {
                $products = product::getAllByID(explode(",", $_COOKIE['cart']));

                main::placeOrder_render("order", "order", "order", $products);


            } else {
                main::message_render("your cart is empty", "your cart is empty", "your cart is empty", "your cart is empty");
            }

        }
    }

    private function addOrder()
    {
        $products = product::getAllByID(explode(",", $_REQUEST["products"]));
        $p = "";
        $total = 0;
        foreach ($products as $product) {
            $total += $product[4];
            $p = $p . "," . $product[0];
        }
        $p = "{" . substr($p, 1) . "}";
        return order::add($_SESSION["user_id"], $p, $total);
    }

    public function myOrders()
    {
        if (isset($_SESSION['user_id'])) {
            $orders = order::getMyOrders($_SESSION['user_id']);
            if ($orders != null)
                main::myOrders_render($orders);
            else
                main::message_render("you have no orders", "you have no orders", "you have no orders", "you have no orders");

        } else
            header("Location: " . R_LOGIN);
    }

}
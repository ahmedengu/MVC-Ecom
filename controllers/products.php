<?php

require_once(__DIR__ . "/../inc.php");

class products
{

    public function index()
    {
        var_dump(product::getAll());

    }

    public function product($id)
    {
        $product = product::getByID($id);
        main::product_render($product);
    }

    public function add()
    {
        if (count($_REQUEST) >= 4) {
            $this->addProduct();
        } else {
            main::render("add product");
        }
    }

    private function addProduct()
    {
        var_dump(product::add($_REQUEST["name"], $_REQUEST["image"], $_REQUEST["desc"], $_REQUEST["price"]));
    }
}
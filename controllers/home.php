<?php
require_once(__DIR__ . "/../inc.php");

class home
{
    public function index()
    {
        $data['products'] = product::getAll();
        if (isset($_SESSION["user_id"])) {
            $user['id'] = $_SESSION["user_id"];
            $user['username'] = $_SESSION["user_username"];
            $user['email'] = $_SESSION["user_email"];

            $data['user'] = $user;
        }
        main::render("Home", "Home", "home,ecommerce", $data);
    }


}
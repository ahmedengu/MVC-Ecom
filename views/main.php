<?php
require_once(__DIR__ . "/../inc.php");

class main
{
    public static function echo_header($title, $description, $keywords)
    {
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"description\" content=\"$description\">
        <meta name=\"author\" content=\"$keywords\">
        <title>$title</title>
        <link href=\"" . SITE_ASSETS . "/css/style.css\" rel=\"stylesheet\">
        <script src=\"" . SITE_ASSETS . "/js/main.js\" ></script>
         

    </head>
    <body>
        <header>
            <div>
               <a href=\"/\"> <img src=\"" . SITE_LOGO . "\" class=\"logo\" id=\"logo\" alt='" . SITE_NAME . "' /></a>
                <hr />
                <nav>
                    <ul>
                        <li>
                            <a href=\"/\">Home </a>
                        </li>
                        <li>
                            <a href=\"" . R_MY_ORDERS . "\">my orders </a>
                        </li>
                        <li>
                            <a href=\"" . R_ADD_ORDER . "\">add order </a>
                        </li>
                        
                        " . ((isset($_SESSION['user_id'])) ? "
                         <li>
                            <a href=\"" . R_LOGOUT . "\">log out </a>
                        </li>" : "
                        <li>
                            <a href=\"" . R_LOGIN . "\">login </a>
                        </li>
                        <li>
                            <a href=\"" . R_REGISTER . "\">register </a>
                        </li>") . "
                    </ul>
                </nav>
            </div>
        </header>";
    }

    public static function echo_footer()
    {
        echo "<footer>
            <hr style=\"\">
            <p>" . SITE_COPYRIGHTS . "</p>
        </footer>
    </body>
</html>";
    }

    public static function echo_content($data)
    {
        echo "<main>
            <div id=\"hero\">
                <a href='" . SITE_HERO_LINK . "'> <img src=\"" . SITE_HERO_IMG . "\" /></a>
            </div>";
        $products = $data['products'];
        echo "<div id=\"content\"><div class=\"row\">";
        foreach ($products as $product) {
            echo "<div id='product$product[0]' class=\"col\">
                        <a href=\"" . R_PRODUCT . "$product[0]\">
                            <img src=\"$product[2]\" />
                            <strong>$product[1]</strong>
                        </a>
                        <p>$product[3]</p>
                        <p class='price'>$product[4]</p>
                        <button onclick=\"addToCart('$product[0]')\">add to cart</button>
                    </div>
                    ";
        }
        echo "</div></div>";

        echo "</main>";

    }

    public static function render($title, $description, $keywords, $data)
    {
        main::echo_header($title, $description, $keywords);
        main::echo_content($data);
        main::echo_footer();
    }

    public static function placeOrder_render($title, $description, $keywords, $products)
    {
        main::echo_header($title, $description, $keywords);
        echo "<main>";
        echo "<div id=\"content\"><div class=\"row\">";
        foreach ($products as $product) {
            echo "<div id='product$product[0]' class=\"col\">
                        <a href=\"" . R_PRODUCT . "$product[0]\">
                            <img src=\"$product[2]\" />
                            <strong>$product[1]</strong>
                        </a>
                        <p>$product[3]</p>
                        <p class='price'>$product[4]</p>
                        <button onclick=\"removeFromCart('$product[0]')\">remove</button>
                    </div>
                    ";
        }
        echo "</div></div>";

        $total = 0;
        foreach ($products as $product) {
            $total += $product[4];
        }
        echo "<div id='order'><form method='post'>
                        <input type='text' value='" . $_SESSION['user_id'] . "' name='user' hidden>
                                            <input type='text' value='" . $_COOKIE['cart'] . "' name='products' hidden>
                                          <label>total  <input type='text' value='" . $total . "' name='total' disabled></label>
    <input type='submit' value='order'>
    </form></div>
    ";
        echo "</main>";

        main::echo_footer();
    }

    public static function message_render($title, $description, $keywords, $message)
    {
        main::echo_header($title, $description, $keywords);
        echo "<main><div id=\"content\"><strong>$message</strong</div></main>";
        main::echo_footer();
    }

    public static function login_render()
    {
        main::echo_header("Login", "Login", "Login");
        echo "<main><div id=\"content\">
<form method='post'>
<input type='text' name='username' placeholder='username'>
<input type='password' name='password' placeholder='password'>
<input type='submit' value='login' >
</form>

</div></main>";
        main::echo_footer();
    }

    public static function register_render()
    {
        main::echo_header("register", "register", "register");
        echo "<main><div id=\"content\">
<form method='post'>
<input type='email' name='email' placeholder='email'>
<input type='text' name='username' placeholder='username'>
<input type='password' name='password' placeholder='password'>
<input type='submit' value='register' >
</form>

</div></main>";
        main::echo_footer();
    }

    public static function product_render($product)
    {
        main::echo_header($product[1], $product[1] . ' ' . $product[3] . ' price: ' . $product[4], $product[1] . ',' . $product[3] . ',price: ' . $product[4]);
        echo "<main><div id=\"content\">

<div id='product$product[0]' class=\"productPage\">
                        <a href=\"" . R_PRODUCT . "$product[0]\">
                            <img src=\"$product[2]\" />
                            <strong>$product[1]</strong>
                        </a>
                        <p>$product[3]</p>
                        <p class='price'>$product[4]</p>
                        <button onclick=\"addToCart('$product[0]')\">add to cart</button>
                    </div>
</div></main>";


        main::echo_footer();


    }

    public static function myOrders_render($orders)
    {
        main::echo_header("my orders", "my orders", "my orders");
        echo "<main><div id=\"content\">";
        foreach ($orders as $order) {
            echo "<div>
<a href='" . R_ORDER . "$order[0]'>$order[0]</a>
<p>products: $order[3]</p>
<p>time: $order[1]</p>
<p>total: $order[4]</p>

</div>
";
        }
        echo "</div></main>";


        main::echo_footer();

    }

    public static function order_render($order)
    {
        main::echo_header("my orders", "my orders", "my orders");
        echo "<main><div id=\"content\">";
        echo "<div>
<a href='" . R_ORDER . "$order[0]'>$order[0]</a>
<p>products: $order[3]</p>
<p>time: $order[1]</p>
<p>total: $order[4]</p>

</div>
";

        echo "</div></main>";


        main::echo_footer();

    }
}
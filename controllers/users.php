<?php
require_once(__DIR__ . "/../inc.php");

class users
{
    public function index()
    {
        var_dump(user::getAll());
    }

    public function user($id)
    {
        var_dump(user::getByID($id));
    }

    public function register()
    {
        if (count($_REQUEST) >= 3) {
            if ($this->addUser()) {
                header("Location: " . R_LOGIN);

            } else {
                main::message_render("something went wrong", "something went wrong", "something went wrong", "something went wrong");
            }
        } else {
            main::register_render();
        }
    }

    public function addUser()
    {
        if (user::
        isUniqueEmail($_REQUEST["email"]) && user::
        isUniqueUsername($_REQUEST["username"])
        ) {

            $mysqli_result = user::add($_REQUEST["email"], $_REQUEST["username"], md5($_REQUEST["password"]));
            if ($mysqli_result == true) {
                $this->sendWelcomeMail();
                return true;
            }
        }
        return false;
    }

    public function login()
    {
        if (count($_REQUEST) >= 2) {
            $result = user::login($_REQUEST["username"], md5($_REQUEST["password"]));
            if (sizeof($result) != 0) {
                $_SESSION["user_id"] = $result[0][0];
                $_SESSION["user_username"] = $result[0][1];
                $_SESSION["user_email"] = $result[0][2];
                main::message_render("welcome back", "welcome back", "welcome back", "welcome back");

            } else {
                session_destroy();
                main::message_render("wrong username or password", "wrong username or password", "wrong username or password", "wrong username or password");
            }
        } else {
            if (isset($_SESSION["user_id"]))
                header("Location: " . R_INDEX);
            else
                main::login_render();
        }
    }

    public function logout()
    {
        $_SESSION=null;
        session_destroy();
        main::message_render("goodbye", "goodbye", "goodbye", "goodbye");

    }

    private function sendWelcomeMail()
    {

        set_error_handler(function () {
        });
        mail($_REQUEST['email'], SITE_NAME, "Welcome " . $_REQUEST['username']);
        restore_error_handler();

    }
}
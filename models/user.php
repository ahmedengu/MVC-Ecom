<?php
require_once(__DIR__ . "/../inc.php");

class user
{
    protected $id;
    protected $email;
    protected $username;
    protected $password;

    public static function getAll()
    {
        return (new db())->conn->query("SELECT * FROM user")->fetch_all();
    }

    public static function getByID($id)
    {
        db::dataFilter($id);

        return (new db())->conn->query("SELECT * FROM user WHERE id = $id")->fetch_all();
    }

    /**
     * user constructor.
     * @param $id
     * @param $email
     * @param $username
     * @param $password
     */
    public function __construct($id, $email, $username, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public static function add($email, $username, $password)
    {
        db::dataFilter($email, $username, $password);

        return (new db())->conn->query("INSERT INTO user ( email, password,username)
VALUES ('$email','$password','$username')");

    }

    public static function login($username, $password)
    {
        db::dataFilter($username, $password);

        return (new db())->conn->query("SELECT * FROM user WHERE username='$username' AND password = '$password'")->fetch_all();

    }

    public static function isUniqueEmail($email)
    {
        return (count((new db())->conn->query("SELECT * FROM user WHERE email = '$email'")->fetch_all()) == 0);

    }

    public static function isUniqueUsername($username)
    {
        return (count((new db())->conn->query("SELECT * FROM user WHERE username = '$username'")->fetch_all()) == 0);

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}
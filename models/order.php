<?php
require_once(__DIR__ . "/../inc.php");


class order
{
    protected $id;
    protected $timestamp;
    protected $user;
    protected $products;
    protected $total;

    public static function getAll()
    {
        return (new db())->conn->query("SELECT * FROM   `order` ")->fetch_all();
    }

    public static function getByID($id)
    {
        db::dataFilter($id);
        return (new db())->conn->query("SELECT * FROM   `order`  WHERE id = $id")->fetch_array();
    }

    /**
     * order constructor.
     * @param $id
     * @param $timestamp
     * @param $user
     * @param $products
     * @param $total
     */
    public function __construct($id, $timestamp, $user, $products, $total)
    {
        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->user = $user;
        $this->products = $products;
        $this->total = $total;
    }

    public static function add($user, $products, $total)
    {
        db::dataFilter($user, $products, $total);
        return (new db())->conn->query("INSERT INTO `order` (`id`, `timestamp`, `user`, `products`, `total`) VALUES (NULL, CURRENT_TIMESTAMP, '$user', '$products', '$total')");

    }

    public static function getMyOrders($user_id)
    {
        return (new db())->conn->query("SELECT * FROM  `order` WHERE user = '$user_id'")->fetch_all();
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
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param mixed $products
     */
    public function setProducts($products)
    {
        $this->products = $products;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }


}

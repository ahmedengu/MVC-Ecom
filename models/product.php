<?php
require_once(__DIR__ . "/../inc.php");

class product
{
    protected $id;
    protected $name;
    protected $image;
    protected $desc;
    protected $price;

    public static function getAll()
    {
        return (new db())->conn->query("SELECT * FROM product")->fetch_all();
    }

    public static function getByID($id)
    {
        db::dataFilter($id);
        return (new db())->conn->query("SELECT * FROM product WHERE id = '$id'")->fetch_array();
    }

    public static function getAllByID($ids)
    {
        db::dataFilter($ids);
        $products = array();
        foreach ($ids as $id) {
            $products[] = (new db())->conn->query("SELECT * FROM product WHERE id = '$id'")->fetch_array();
        }
        return $products;
    }

    public static function add($name, $image, $desc, $price)
    {
        db::dataFilter($name, $image, $desc, $price);

        return (new db())->conn->query("INSERT INTO `product` ( `id` , `name` , `image` , `desc` , `price` ) VALUES ( NULL , '$name', '$image', '$desc', '$price' )");

    }

    public function __construct($id, $name, $image, $desc, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->desc = $desc;
        $this->price = $price;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}

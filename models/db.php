<?php
require_once(__DIR__ . "/../inc.php");


class db
{
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    }

    public function getConn()
    {
        return $this->conn;
    }


    public function setConn(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function close()
    {
        $this->conn->close();
    }

    public static function filter(&$data)
    {
        if (isset($data))
            if (is_array($data))
                foreach ($data as $key => $value)
                    if (is_array($value))
                        filter($value);
                    elseif (is_object($value))
                        filter($value);
                    else
                        $data[$key] = addslashes($value);
            elseif (is_object($data))
                foreach ($data as $key => $value)
                    if (is_array($value))
                        filter($value);
                    elseif (is_object($value))
                        filter($value);
                    else
                        $data->$key = addslashes($value);
            else
                $data = addslashes($data);
    }

    public static function dataFilter(&$data = 0, &$data1 = 0, &$data2 = 0, &$data3 = 0, $data4 = 0)
    {
        db::filter($data);
        db::filter($data1);
        db::filter($data2);
        db::filter($data3);
        db::filter($data4);
    }


}
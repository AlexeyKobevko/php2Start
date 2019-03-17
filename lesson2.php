<?php

/**
 * Class Product
 */
abstract class Product
{
    /**
     * Product constructor.
     * @param int $id
     * @param string $name
     * @param int|float $price
     */
    protected function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getCost($amount);
    abstract static function salesRevenue($price, $amount);
}

/**
 * Class DigitalProduct
 * наследник Class Product
 */
class DigitalProduct extends Product
{
    /**
     * DigitalProduct constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct($id, $name, $price)
    {
        parent::__construct($id, $name, $price);
    }

    /**
     * @param int $amount
     * @return int $cost
     */
    public function getCost( $amount=1) : int
    {
        return $this->price;
    }

    /**
     * @param $cost
     * @return int|float
     */
    static function salesRevenue($price, $amount) : int
    {
        return $price *  $amount;
    }
}

/**
 * Class PieceGoods
 */
class PieceGoods extends Product
{
    /**
     * PieceGoods constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct($id, $name, $price)
    {
        parent::__construct($id, $name, $price);
    }

    /**
     * @param $amount
     * @return int
     */
    public function getCost($amount) : int
    {
        return $this->price * $amount;
    }

    /**
     * @param $price
     * @param $amount
     * @return float|int
     */
    public static function salesRevenue($price, $amount)
    {
        return $price *  $amount;
    }
}

/**
 * Class WeightedGoods
 */
class WeightedGoods extends Product
{
    /**
     * WeightedGoods constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct($id, $name, $price)
    {
        parent::__construct($id, $name, $price);
    }

    /**
     * @param $amount
     * @return float
     */
    public function getCost($amount) : float
    {
        return $this->price * $amount;
    }

    /**
     * @param $price
     * @param $amount
     * @return float
     */
    public static function salesRevenue($price, $amount) : float
    {
        return $price *  $amount;
    }
}



trait Singleton
{
    static public function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }
        return $instance;
    }
}

class MyClass
{
    use Singleton;
}

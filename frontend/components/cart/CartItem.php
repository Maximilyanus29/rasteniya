<?php

namespace frontend\components\cart;

class CartItem
{
    /**
     * @var object $product
     */
    private $product;
    /**
     * @var integer $quantity
     */
    private $quantity;
    /**
     * @var array $params Custom configuration params
     */
    private $params;

    public function __construct($product, $quantity, array $params)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->params = $params;
    }

    /**
     * Returns the id of the item
     * @return integer
     */
    public function getId()
    {
        return $this->product->{$this->params['productFieldId']};
    }

    /**
     * Returns the price of the item
     * @return integer|float
     */
    public function getPrice()
    {
        return $this->product->{$this->params['productFieldPrice']};
    }

    /**
     * Returns the price of the item
     * @return integer|float
     */
    public function getDiscountPrice()
    {
        $price = $this->product->{$this->params['productFieldPrice']};

        if (!empty($this->product->{$this->params['productFieldDiscountPrice']})){
            $price = $this->product->{$this->params['productFieldDiscountPrice']};
        }
        return $price;
    }

    /**
     * Returns the product, AR model
     * @return object
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Returns the cost of the item
     * @param bool $withDiscount
     * @return integer|float
     */
    public function getCost($withDiscount = false)
    {
        if ($withDiscount == true){
            return ceil($this->getDiscountPrice() * $this->quantity);
        }else{
            return ceil($this->getPrice() * $this->quantity);
        }
    }

    /**
     * Returns the quantity of the item
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity of the item
     * @param integer $quantity
     * @return void
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }
}

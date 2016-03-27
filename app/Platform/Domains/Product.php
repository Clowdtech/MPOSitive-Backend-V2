<?php

namespace App\Platform\Domains;

use App\Platform\Helpers\Generate;
/**
* Product domain.
*/
class Product
{
	public $uid;
    public $name;
    public $backgroundColor;
    public $fontColor;
    public $price;
    public $user;

    public function __construct()
    {
    	$this->setUid();
    }

    /**
     * Gets the value of uid.
     *
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets the value of uid.
     *
     * @param mixed $uid the uid
     *
     * @return self
     */
    public function setUid()
    {
        $this->uid = Generate::uid();

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of backgroundColor.
     *
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * Sets the value of backgroundColor.
     *
     * @param mixed $backgroundColor the background color
     *
     * @return self
     */
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Gets the value of fontColor.
     *
     * @return mixed
     */
    public function getFontColor()
    {
        return $this->fontColor;
    }

    /**
     * Sets the value of fontColor.
     *
     * @param mixed $fontColor the font color
     *
     * @return self
     */
    public function setFontColor($fontColor)
    {
        $this->fontColor = $fontColor;

        return $this;
    }

    /**
     * Gets the value of price.
     *
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the value of price.
     *
     * @param mixed $price the price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
}
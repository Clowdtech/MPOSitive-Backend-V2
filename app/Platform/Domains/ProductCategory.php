<?php

namespace App\Platform\Domains;

/**
* Product category domain.
*/

class ProductCategory
{
    /**
     * Product category name.
     * 
     * @var string
     */
	public $name;

    /**
     * Is the category active.
     * 
     * @var bool
     */
	public $active;

    /**
     * User who creates the category.
     * 
     * @var \App\User
     */
	public $user;

    public $backgroundColor;

    public $fontColor;
	
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
     * Gets the value of active.
     *
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the value of active.
     *
     * @param mixed $active the active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

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
}
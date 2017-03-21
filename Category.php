<?php

class Category
{
    public $id;
    public $name;
    public $parent_id;
    public $childCategories = array();

    const TOP_CATEGORY = 0;

    function __construct($id, $name, $parent_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_id = $parent_id;

    }

}
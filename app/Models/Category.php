<?php

namespace Oshop\Models;

use \PDO;
use \PDOException;


class Category extends CoreModel {
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    static public function findAll()
    {
        $sql = 'SELECT * FROM `category`';

        $pdo = self::getPDO();

        $pdoStatement = $pdo->query($sql);

        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        unset($pdo);

        return $categories;
    }

    static public function find($id)
    {
        $sql = 'SELECT * FROM `category` WHERE id = ' . $id;
        $pdo = self::getPDO();
        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        
        $category = $pdoStatement->fetch();
        unset($pdo);

        return $category;
    }

    public static function findHomePageCategories()
    {

        $sql = 'SELECT * from `category` WHERE `home_order` > 0 ORDER BY `home_order` LIMIT 5';

        $pdo = self::getPDO();

        $pdoStatement = $pdo->query($sql);

        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        unset($pdo);

        return $categories;
    }
}

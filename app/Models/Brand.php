<?php

namespace Oshop\Models;

use \PDO;
use \PDOException;

class Brand extends CoreModel {

    private $name;
    private $footer_order;

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
     * Get the value of footer_order
     */ 
    public function getFooterOrder()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooterOrder($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }

    static public function findAll()
    {
        $sql = 'SELECT * FROM `brand`';

        $pdo = self::getPDO();

        $pdoStatement = $pdo->query($sql);

        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        unset($pdo);

        return $brands;
    }

    static public function findFiveSorted()
    {
        $sql = 'SELECT * FROM `brand` WHERE `footer_order` > 0 ORDER BY `footer_order` LIMIT 5';

        $pdo = self::getPDO();

        $pdoStatement = $pdo->query($sql);

        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        unset($pdo);

        return $brands;
    }

    static public function find($id)
    {
        $sql = 'SELECT * FROM `brand` WHERE id = ' . $id;
        $pdo = self::getPDO();
        $pdoStatement = $pdo->query($sql);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        
        $brand = $pdoStatement->fetch();
        unset($pdo);

        return $brand;
    }

}

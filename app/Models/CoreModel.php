<?php

namespace Oshop\Models;

use \PDO;
use \PDOException;

class CoreModel {

    protected $id;
    protected $created_at;
    protected $updated_at;

    static $dsn = 'mysql:dbname=oshop;host=localhost;charset=utf8';
    static $user = 'oshop';
    static $password = 'oshop';

    static public function getPDO()
    {
        try {
            $pdo = new PDO(
                self::$dsn, 
                self::$user, 
                self::$password, 
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        } catch (PDOException $exception) {
            echo 'Connexion échouée : ' . $exception->getMessage();
        }

        return $pdo;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}

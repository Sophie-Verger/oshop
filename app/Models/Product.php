<?php

namespace Oshop\Models;

use \PDO;
use \PDOException;


class Product extends CoreModel
{
	private $name;
	private $description;
	private $picture;
	private $price;
	private $rate;
	private $status;
	private $brand_id;
	private $category_id;
	private $type_id;
	private $type_name;
	private $brand_name;

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
	 * Get the value of description
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */
	public function setDescription($description)
	{
		$this->description = $description;

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
	 * Get the value of price
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set the value of price
	 *
	 * @return  self
	 */
	public function setPrice($price)
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get the value of rate
	 */
	public function getRate()
	{
		return $this->rate;
	}

	/**
	 * Set the value of rate
	 *
	 * @return  self
	 */
	public function setRate($rate)
	{
		$this->rate = $rate;

		return $this;
	}

	/**
	 * Get the value of status
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Set the value of status
	 *
	 * @return  self
	 */
	public function setStatus($status)
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * Get the value of brand_id
	 */
	public function getBrandId()
	{
		return $this->brand_id;
	}

	/**
	 * Set the value of brand_id
	 *
	 * @return  self
	 */
	public function setBrandId($brand_id)
	{
		$this->brand_id = $brand_id;

		return $this;
	}

	/**
	 * Get the value of category_id
	 */
	public function getCategoryId()
	{
		return $this->category_id;
	}

	/**
	 * Set the value of category_id
	 *
	 * @return  self
	 */
	public function setCategoryId($category_id)
	{
		$this->category_id = $category_id;

		return $this;
	}

	/**
	 * Get the value of type_id
	 */
	public function getTypeId()
	{
		return $this->type_id;
	}

	/**
	 * Set the value of type_id
	 *
	 * @return  self
	 */
	public function setTypeId($type_id)
	{
		$this->type_id = $type_id;

		return $this;
	}

	/**
	 * Get the value of type_name
	 */
	public function getTypeName()
	{
		return $this->type_name;
	}

	/**
	 * Get the value of type_name
	 */
	public function getBrandName()
	{
		return $this->brand_name;
	}

	static public function findAll()
	{
		$sql = 'SELECT * FROM `product`';
		$pdo = self::getPDO();

		$pdoStatement = $pdo->query($sql);
		$products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		unset($pdo); // unset détruit une variable

		return $products;
	}

	static public function findAllByCategory($categoryId)
	{
		$sql = "SELECT
		product.*,
		type.name AS type_name
		FROM product
		INNER JOIN type ON type.id = product.type_id
		WHERE product.category_id= $categoryId";

		$pdo = self::getPDO();

		$pdoStatement = $pdo->query($sql);
		$products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		unset($pdo); // unset détruit une variable

		return $products;
	}

	static public function findAllByBrand($brandId)
	{
		$sql = "SELECT
		product.*,
		type.name AS type_name
		FROM product
		INNER JOIN type ON type.id = product.type_id
		WHERE product.brand_id= $brandId";

		$pdo = self::getPDO();

		$pdoStatement = $pdo->query($sql);
		$products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		unset($pdo); 

		return $products;
	}

	// récupérer tous les produits
	static public function findAllByType($typeId)
	{
		$sql = "SELECT
		product.*,
		type.name AS type_name
		FROM product
		INNER JOIN type ON type.id = product.type_id
		WHERE product.type_id= $typeId";

		$pdo = self::getPDO();

		$pdoStatement = $pdo->query($sql);
		$products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

		unset($pdo); 

		return $products;
	}

	// récupérer un seul produit
	static public function find($id)
	{
		$sql = "SELECT 
			`product`.*,
			`brand`.`name` AS `brand_name` 
			FROM `product` 
			INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id`
			WHERE product.id = $id
		";

		$pdo = self::getPDO();
		$pdoStatement = $pdo->query($sql);

		$pdoStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

		$product = $pdoStatement->fetch();

		unset($pdo);

		return $product;
	}

	
}

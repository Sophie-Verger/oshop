# Requêtes o'Shop

## récupérer la liste des catégories de la page d'accueil

```sql
SELECT * from `category` WHERE `home_order` > 0 ORDER BY `home_order` LIMIT 5
```

## récupérer les types pour la liste du footer

```sql
SELECT * FROM type WHERE footer_order > 0 ORDER BY footer_order LIMIT 5
```

## récupérer les marques pour la liste du footer

```sql
SELECT * FROM brand WHERE footer_order > 0 ORDER BY footer_order LIMIT 5
```

## récupérer les données des produits ET de leur marque

```sql
SELECT product.id, product.name, product.price, brand.name AS brand_name
FROM product
INNER JOIN brand ON brand.id = product.brand_id
```

### récupérer les infos d'une catégorie en fonction de son id

```sql
SELECT * FROM category WHERE id = $categoryId 
```

### récupérer la liste des produits qui appartiennent à une catégorie donnée (avec le nom du type pour chaque produit)

```sql
SELECT `product`.`id`, `product`.`name`, `product`.`price`, `product`.`picture`, `type`.`name` AS type_name
FROM product
INNER JOIN type ON type.id = product.type_id
WHERE product.`category_id`= $categoryId
```

### récupérer les infos du type

```sql
SELECT * FROM type WHERE id = $typeId
```

### récupérer la liste des produtis qui sont d'un type donné

```sql
SELECT `product`.`id`, `product`.`name`, `product`.`price`, `product`.`picture`, `type`.`name` AS type_name
FROM product
INNER JOIN type ON type.id = product.type_id
WHERE product.`type_id`= $typeId
```

### récupérer les infos de la marque selon son id

```sql
SELECT * FROM brand WHERE id = $brandId
```

### récupérer la liste des produits qui sont fabriqués par une marque donnée

```sql
SELECT `product`.`id`, `product`.`name`, `product`.`price`, `product`.`picture`, `type`.`name` AS type_name
FROM `product`
INNER JOIN `type` ON `type`.`id` = `product`.`type_id`
WHERE `product`.`brand_id` = $brandId
```
<?php

namespace Oshop\Controllers;

use \Oshop\Models\Product;
use \Oshop\Models\Type;
use \Oshop\Models\Category;
use \Oshop\Models\Brand;

class CatalogController extends CoreController
{

    // le paramètre $params contient les valeurs dynamiques passées par l'url (récupérées via AltoRouter)
    function category($params)
    {
        $category = Category::find($params['id']);

        $products = Product::findAllByCategory($params['id']);

        $this->show('category', [
            'category' => $category, 
            'products' => $products 
        ]);
    }

    function brand($params)
    {
        $brand = Brand::find($params['id']);
        $products = Product::findAllByBrand($params['id']);

        $this->show('brand', [
            'brand' => $brand,
            'products' => $products
        ]);
    }

    function type($params)
    {
        $type = Type::find($params['id']);
        $products = Product::findAllByType($params['id']);

        $this->show('type', [
            'type' => $type,
            'products' => $products
        ]);
    }

    function product($params)
    {
        $product = Product::find($params['id']);

        $this->show('product', [
            'product' => $product
        ]);
    }
}

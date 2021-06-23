<?php

namespace Oshop\Controllers;

use \Oshop\Models\Brand;
use \Oshop\Models\Type;

class CoreController {

    private $router;

    public function __construct($routerParam)
    {
        $this->router = $routerParam;
    }

    protected function show($viewName, $viewData = [])
    {   
        $viewData['currentPage'] = $viewName;
        
        extract($viewData);

        // récupérer les marques du footer
        $footerBrands = Brand::findFiveSorted();
        $footerTypes = Type::findFiveSorted();

        // transmettre $router aux vues
        $router = $this->router;

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}

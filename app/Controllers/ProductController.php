<?php

class ProductController {

    function product($params)
    {
        $this->show('product', [
            'productId' => $params['id']
        ]);
    }

    private function show($viewName, $viewData = [])
    {   
        $viewData['currentPage'] = $viewName;

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}
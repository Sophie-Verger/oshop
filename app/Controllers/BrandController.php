<?php

class BrandController {

    function brand($params)
    {
       
        $this->show('brand', [
            'brandId' => $params['id']
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


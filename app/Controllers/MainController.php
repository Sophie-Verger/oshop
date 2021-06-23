<?php

namespace Oshop\Controllers;

use \Oshop\Models\Type;
use \Oshop\Models\Category;

class MainController extends CoreController {

    function home()
    {
        $categories = Category::findHomePageCategories();

        $this->show(
            'home', [
                'categories' => $categories
            ]);
    }

    function legalMentions()
    {
        $this->show('mentions');
    }

    function test()
    {
        $testFindAll = Type::findAll();
        $testFind = Type::find(1);
        dump($testFindAll);
        dump($testFind);
    }
}

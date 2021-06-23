<?php

// inclure notre autoload, on commente car on passe par composer dorénavant
// require __DIR__ . '/../autoload.php';

// inclure les dépendances composer
require __DIR__ . '/../vendor/autoload.php';

// pages possibles => Routing

// instancier l'objet AltoRouter
$router = new AltoRouter();
// on fournit a AltoRouter la partie de l'URL à ne pas prendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
// la valeur de $_SERVER['BASE_URI'] est donnée par le .htaccess. Elle correspond à la racine du site => à la route "/"
$router->setBasePath($_SERVER['BASE_URI']);

// Mapper les routes = prévoir/définir les routes
$router->map(
    'GET', // la méthode HTTP qui est autorisée 
    '/', // l'url à laquelle cette route réagit
    // "target" : ce tableau stocke les noms de l'action et du contrôleur qui vont se déclencher pour réagir à cette URL
    [
        'action' => 'home',
        'controller' => 'MainController'
    ],
    'home' // le nom de la route (arbitraire)
);

$router->map(
    'GET',
    '/legal-mentions/',
    [
        'action' => 'legalMentions',
        'controller' => 'MainController'
    ],
    'legal-mentions'
);

$router->map(
    'GET',
    '/catalog/category/[i:id]',
    [
        'action' => 'category',
        'controller' => 'CatalogController'
    ],
    'catalog-category'
);

$router->map(
    'GET',
    '/catalog/type/[i:id]',
    [
        'action' => 'type',
        'controller' => 'CatalogController'
    ],
    'catalog-type'
);

$router->map(
    'GET',
    '/catalog/brand/[i:id]',
    [
        'action' => 'brand',
        'controller' => 'CatalogController'
    ],
    'catalog-brand'
);

$router->map(
    'GET',
    '/catalog/product/[i:id]',
    [
        'action' => 'product',
        'controller' => 'CatalogController'
    ],
    'catalog-product'
);

$router->map(
    'GET',
    '/test/',
    [
        'action' => 'test',
        'controller' => 'MainController'
    ],
    'test'
);

// Début Dispatcher
$match = $router->match();

// si la page demandée est 'home', je vais chercher $pages['home']
if ($match) {
    
    // On récupére avec altorouteur (le résultat de match()) les données de la route (mappé plus haut)
    $controllerToUse = $match['target']['controller'];
    $controllerToUse = 'Oshop\\Controllers\\' . $controllerToUse;
    $methodToUse = $match['target']['action'];

    // php peut utiliser une variable en tant que nom de la méthode
    // $methodToUse est une chaîne de caractères, donc on peut transformer $mainController->$methodToUse() en $mainController->home();
    $controller = new $controllerToUse($router);
    $controller->$methodToUse($match['params']);

} else {
    // normalement ce serait une 404, car on arrive dans ce bloc de code seulement si on a demandé une page non prévue
    exit('404 Not found');
}



// Fin Dispatcher
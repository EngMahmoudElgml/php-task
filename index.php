<?php
namespace Task;

require_once __DIR__ . '/Controllers/UserController.php';


// Get the current request URI
$request_uri = $_SERVER['REQUEST_URI'];

// Remove any query parameters from the URI
$request_uri = strtok($request_uri, '?');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump(01);
}
else
{
    switch ($request_uri) {
        case '/':
        {
            $controller  = new \Controllers\UserController();
            $controller->register();
            break;
        }
        case '/register':
            {
                var_dump($_REQUEST);
                $controller  = new \Controllers\UserController();
                $controller->store($_REQUEST);
                break;
            }
        case '/about':
            // This is the about page
            echo 'This is the about page';
            break;
        case '/contact':
            // This is the contact page
            echo 'Contact us at info@example.com';
            break;
        default:
            // This is a 404 error
            header('HTTP/1.0 404 Not Found');
            echo 'Page not found';
            break;
    }
}

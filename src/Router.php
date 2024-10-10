<?php
class Router {
    public function handleRequest() {
        $url = $_GET['url'] ?? 'home';
        switch ($url) {
            case 'home':
                $controller = new HomeController();
                $controller->index();
                break;
            case 'product':
                $controller = new ProductController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller->create();
                } else {
                    $controller->list();
                }
                break;
            default:
                http_response_code(404);
                echo "Page not found";
                break;
        }
    }
}

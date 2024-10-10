<?php
require_once '../src/Controller/HomeController.php';
require_once '../src/Controller/IncidentController.php';

class Router {
    public function handleRequest() {
        $url = $_GET['url'] ?? 'home';
        $homeController = new HomeController();
        $incidentController = new IncidentController();

        switch ($url) {
            case 'home':
                $homeController->index();
                break;
            case 'incidents':
                $incidentController->list();
                break;
            case 'incidents/create':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $incidentController->create();
                } else {
                    require '../public/incident_form.html';
                }
                break;
            case 'incidents/update':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $incidentController->update($id);
                } else {
                    http_response_code(404);
                    echo "Page not found";
                }
                break;
            case 'incidents/delete':
                $id = $_GET['id'] ?? null;
                if ($id) {
                    $incidentController->delete($id);
                } else {
                    http_response_code(404);
                    echo "Page not found";
                }
                break;
            default:
                http_response_code(404);
                echo "Page not found";
                break;
        }
    }
}

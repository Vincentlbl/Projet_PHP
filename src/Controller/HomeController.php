<?php
require_once '../src/Model/IncidentModel.php';

class HomeController {
    public function index() {
        // Appel du modèle pour récupérer des données, par exemple les derniers incidents
        $incidentModel = new IncidentModel();
        $recent_incidents = $incidentModel->getRecent(5); // Récupère les 5 derniers incidents

        // Inclure la vue de la page d'accueil en passant les incidents
        echo $this->render('home.twig', ['recent_incidents' => $recent_incidents]);
    }

    private function render($view, $data = []) {
        extract($data);
        require "../src/View/$view";
    }
}

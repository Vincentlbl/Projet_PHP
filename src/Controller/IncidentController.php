<?php
require_once '../src/Model/IncidentModel.php';

class IncidentController {
    private $incidentModel;

    public function __construct() {
        $this->incidentModel = new IncidentModel();
    }

    public function create() {
        if (isset($_POST['title'], $_POST['description'])) {
            $title = htmlspecialchars(trim($_POST['title']));
            $description = htmlspecialchars(trim($_POST['description']));

            // Insertion des données dans la base de données via le modèle
            $this->incidentModel->create($title, $description);

            // Redirection après la création pour éviter la resoumission du formulaire
            header('Location: /incidents');
            exit();
        } else {
            // En cas de données manquantes, affiche un message ou redirige
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }

    public function list() {
        // Affiche la liste des incidents
        $incidents = $this->incidentModel->getAll();
        require '../public/incidents.html';
    }
}

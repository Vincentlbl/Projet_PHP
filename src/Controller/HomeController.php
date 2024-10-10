<?php
require_once '../src/Model/ProductModel.php';

class HomeController {
    public function index() {
        // Appel du modèle pour récupérer des données, par exemple une liste de produits
        $productModel = new ProductModel();
        $products = $productModel->getAll();

        // Inclure la vue de la page d'accueil en passant les produits
        require '../src/View/home.php';
    }
}

<?php
class ProductController {
    public function list() {
        $model = new ProductModel();
        $products = $model->getAll();
        require '../src/View/product_list.php';
    }

    public function create() {
        // Récupération des données et enregistrement via le modèle
    }
}

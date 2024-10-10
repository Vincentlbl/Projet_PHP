<?php
class ProductModel {
    public function getAll() {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

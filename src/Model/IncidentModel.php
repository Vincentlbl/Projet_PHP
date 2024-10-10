<?php
require_once 'Database.php';

class IncidentModel {
    public function getAll() {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM incidents ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($title, $description) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO incidents (title, description) VALUES (:title, :description)");
        $stmt->execute(['title' => $title, 'description' => $description]);
    }

    public function getById($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM incidents WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("UPDATE incidents SET status = :status WHERE id = :id");
        $stmt->execute(['status' => $status, 'id' => $id]);
    }

    public function delete($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM incidents WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}

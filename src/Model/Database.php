<?php
class Database {
    private static $pdo;

    public static function getConnection() {
        if (!self::$pdo) {
            $dbHost = getenv('localhost');
            $dbName = getenv('catalog_db');
            $dbUser = getenv('root');
            $dbPass = getenv('');
            self::$pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        }
        return self::$pdo;
    }
}

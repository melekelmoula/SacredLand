<?php
class connDb {
    private static $instance;
    private $pdo;

    private function __construct() {
        $host = 'localhost';
        $db = 'blogdb_tthd';
        $user = 'root';
        $psw = 'root';
        $port = '3306';
        $charset ='utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
        $options = [
            \PDO:: ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO:: ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO:: ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new \PDO($dsn,$user,$psw,$options);

        }catch (\PDOException $e) {
            throw new \PDOException ($e->getMessage(), $e->getCode());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new connDb();
        }
        return self::$instance;
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>
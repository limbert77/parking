<?php

class Database {
    private $host = "localhost";
    private $port = "5432";
    private $dbname = "parqueo";
    private $user = "postgres";
    private $password = "12345";
    private $conn;

    public function connect() {
        if (!$this->conn) {
            $this->conn = pg_connect("host={$this->host} port={$this->port} dbname={$this->dbname} user={$this->user} password={$this->password}");
            if (!$this->conn) {
                die("Error de conexión a PostgreSQL\n");
            }
        }
        return $this->conn;
    }

    public function close() {
        if ($this->conn) {
            pg_close($this->conn);
        }
    }
}
?>
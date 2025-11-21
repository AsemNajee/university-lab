<?php

class Database {
    private static PDO $conn;
    private string $table;
    public function __construct($table)
    {
        $this->table = $table;
        if(!isset(static::$conn)){
            $config = require base_path('config.php');
            $dbConfig = $config['database']['sqlite'];
            // the method bellow take an array like ['key'=> 'value', 'key2'=> 'value2'] 
            // and return it as string 'key=value;key2=value2'
            $dsn = http_build_query($dbConfig['parameters'], '', ';');
            $dsn = $dbConfig['type'] . ':' . $dsn; // add db type like 'mysql:params...'
            $user = $dbConfig['user'];
            $pass = $dbConfig['password'];
            static::$conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
    }

    public function query($query, $data = []) {
        $stmt = static::$conn->prepare($query);
        $stmt->execute($data);
        return $stmt;
    }

    public function getAll(){
        $q = "SELECT * FROM {$this->table}";
        return $this->query($q)->fetchAll();
    }

    public function find($id){
        return $this->findWhere('id', $id);
    }

    public function findWhere($columnName, $value, $limit = 1){
        $q = "SELECT * FROM {$this->table} WHERE {$columnName} = :value LIMIT {$limit}";
        return $this->query($q, ['value'=> $value]);
    }

    public function create($data){
        $q = "INSERT INTO {$this->table} (content) VALUES (:content);";
        $res = $this->query($q, $data); // send the data which contains the array like ['content'=> 'post content']
        return $res->rowCount() === 1; // if effected row inserted return true
    }

    public function delete($id) {
        return $this->deleteWhere('id', $id) === 1;
    }

    public function deleteWhere($columnName, $value, $limit = 1){
        $q = "DELETE FROM {$this->table} WHERE {$columnName} = :value LIMIT {$limit}";
        $res = $this->query($q, ['value' => $value]);
        return $res->rowCount();
    }
}
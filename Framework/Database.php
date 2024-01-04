<?php

namespace Framework;

use PDO;
use PDOException;
use PDOStatement;
use Exception;

class Database
{
    public $conn;

    /**
     * Constructor for Database class
     * 
     * @param array $config The database config array
     */
    public function __construct($config)
    {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";

        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    
    }


    /**
     * Query the database
     * 
     * @param string $query The SQL query to execute
     * 
     * @return PDOStatement the PDO statement object
     * @throws exception if query execution fails
     */
    public function query($query, $params = [])
    {
      try {
        $sth = $this->conn->prepare($query);
  
        // Bind named parameters
        foreach ($params as $param => $value) {
          $sth->bindValue(':' . $param, $value);
        }
  
        $sth->execute();
        return $sth;
      } catch (PDOException $e) {
        throw new Exception("Query execution failed: " . $e->getMessage());
      }
    }
}
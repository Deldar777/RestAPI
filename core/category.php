<?php

class category {

    // Database
    private $conn;
    private $table = 'categories';

    // Post properties
    public $id;
    public $name;
    public $create_at;

    // Initialize this class

    public function __construct($db)
    {
        $this->conn  = $db;
    }

    // Getting post from our database
    public function read(){

        // Create query
        $query = 'SELECT * FROM  ' .$this->table;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }


}
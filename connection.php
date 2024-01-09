<?php

class Database{
    public static $connection;

    public static function setUpConnections()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost", "root", "12345678", "cofeebean_db", "3306");
        }
    }

    public static function iud($q) //insert Update Delete 
    {
        Database::setUpConnections(); // check database Connection (1 -> Connection eka hadala thamai methata ganne, 2 or 3 nm hadapu connection eka save wela thiyenawa)
        Database::$connection->query($q); // 
    }

    public static function search($q) // only search (Database::search());
    {
        Database::setUpConnections();
        $resultSet = Database::$connection->query($q); // ("SELECT * FROM `coffee`")
        return $resultSet;
    }
}


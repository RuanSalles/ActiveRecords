<?php
namespace Source\Database;

use PDO;
use PDOException;

class Connection {
    private const HOST = "";
    private const USER = "";
    private const DBNAME = "";
    private const PASS = "";

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static PDO $instance;
    /**
     * @return PDO
     */
    public static function getInstance(): PDO 
    {
        if(empty(self::$instance)) {
            try {
                self::$instance = new PDO('sqlite:database.sqlite');
            } catch (PDOException $exception) {
                die("<h1>Whoooops ! Erro ao conectar.... </h1>");
            }
        }
        return self::$instance;
        
    }

    final private function __construct()
    {
        
    }

    final private function __clone()
    {

    }
 }

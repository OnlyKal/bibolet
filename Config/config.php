<?php

class Database extends PDO
{

    private static $instance;

    private const HOST = "localhost";
    private const USER = "root";
    private const PASSWORD = "";
    private const DB = "bibolet";

    public function __construct()
    {

        $_connection_link = "mysql:host=" . self::HOST . ";dbname=" . self::DB;

        try {
            parent::__construct((string)$_connection_link, self::USER, self::PASSWORD);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            die($th->getMessage());
        }
    }
    public static function getInstance(): self
    {
        if (self::$instance == NULL) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

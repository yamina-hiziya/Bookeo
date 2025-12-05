<?php

namespace App\Db;

class Mysql
{
    // Méthodes pour interagir avec la base de données MySQL
    private static $_instance = null;
    private $db_name;
    private $db_user;
    private $db_password;
    private $db_port;
    private $db_host;

    private function __construct()
    {
        $config = require __DIR__ . '/../../config.php';
        if (isset($config['db_name'])) {

            $this->db_name = $config['db_name'];
        }
        if (isset($config['db_user'])) {

            $this->db_user = $config['db_user'];
        }
        if (isset($config['db_password'])) {
            $this->db_password = $config['db_password'];
        }
        if (isset($config['db_port'])) {
            $this->db_port = $config['db_port'];
        }
        if (isset($config['db_host'])) {
            $this->db_host = $config['db_host'];
        }
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Mysql();
        }
        return self::$_instance;
    }

    public function getPDO(): \PDO
    {
        return new \PDO('mysql:dbname=' . $this->db_name . ';charset=utf8;host=' . $this->db_host . ':' . $this->db_port, $this->db_user, $this->db_password);
    }
}

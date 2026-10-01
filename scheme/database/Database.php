<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Database
{
    protected $db;
    protected $driver;
    protected $get_sql;

    public function __construct()
    {
        $config = config_item('database');

        if (!$config) {
            throw new PDOException('Database configuration not found.');
        }

        $driver   = $config['driver'] ?? 'mysql';
        $host     = $config['hostname'] ?? 'localhost';
        $port     = $config['port'] ?? 3306;
        $username = $config['username'] ?? '';
        $password = $config['password'] ?? '';
        $dbname   = $config['database'] ?? '';
        $charset  = $config['charset'] ?? 'utf8mb4';

        switch ($driver) {
            case 'mysql':
                $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset};port={$port}";
                break;

            case 'pgsql':
                $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";
                break;

            case 'sqlite':
                $dsn = "sqlite:{$dbname}";
                break;

            default:
                throw new PDOException("Unsupported database driver: {$driver}");
        }

        $options = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        );

        /*
         * Enable SSL for MySQL when DB_SSL is set to true.
         *
         * PHP 8.5+ uses Pdo\Mysql::ATTR_SSL_VERIFY_SERVER_CERT.
         */
        if ($driver === 'mysql' && getenv('DB_SSL') === 'true') {
            $options[Pdo\Mysql::ATTR_SSL_VERIFY_SERVER_CERT] = false;
        }

        try {
            $this->db = new PDO(
                $dsn,
                $username,
                $password,
                $options
            );

            $this->driver = $this->db->getAttribute(
                PDO::ATTR_DRIVER_NAME
            );

        } catch (Exception $e) {
            $error = load_class('Errors', 'kernel');

            $error->show_database_error(
                $e->getMessage(),
                $this->get_sql ?? ''
            );
        }
    }

    public function getConnection()
    {
        return $this->db;
    }

    public function get_driver()
    {
        return $this->driver;
    }
}
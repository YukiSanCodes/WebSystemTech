<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    /**
     * The directory that holds the Migrations and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Default database group.
     */
    public string $defaultGroup = 'default';

    /**
     * Main database connection.
     *
     * Local MAMP defaults:
     *   Host: localhost
     *   User: root
     *   Password: root
     *   Database: electriccompany
     *   Port: 8889
     *
     * On Render, these values are replaced by environment variables.
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => 'root',
        'database'     => 'electriccompany',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 8889,
        'numberNative' => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    /**
     * Test database connection.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'db_',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
        'dateFormat'  => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];

    public function __construct()
    {
        parent::__construct();

        /*
         * Use Render/Aiven settings when environment variables exist.
         * Otherwise, keep the local MAMP settings above.
         */
        $this->default['hostname'] = getenv('DB_HOST') ?: $this->default['hostname'];
        $this->default['username'] = getenv('DB_USER') ?: $this->default['username'];
        $this->default['password'] = getenv('DB_PASSWORD') ?: $this->default['password'];
        $this->default['database'] = getenv('DB_NAME') ?: $this->default['database'];

        if (getenv('DB_PORT')) {
            $this->default['port'] = (int) getenv('DB_PORT');
        }

        if (getenv('DB_ENCRYPT')) {
            $this->default['encrypt'] = filter_var(
                getenv('DB_ENCRYPT'),
                FILTER_VALIDATE_BOOLEAN
            );
        }

        /*
         * Do not display detailed database errors in production.
         */
        if (defined('ENVIRONMENT') && ENVIRONMENT === 'production') {
            $this->default['DBDebug'] = false;
        }

        /*
         * Use the test database group during automated testing.
         */
        if (defined('ENVIRONMENT') && ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
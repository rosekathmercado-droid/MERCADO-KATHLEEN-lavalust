<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 */

$database['main'] = array(
    'driver'    => 'mysql',
    'hostname'  => getenv('DB_HOST'),
    'port'      => getenv('DB_PORT'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASSWORD'),
    'database'  => 'defaultdb',
    'charset'   => 'utf8mb4',
    'dbprefix'  => '',
    'path'      => '',
    'ssl'       => getenv('DB_SSL') ?: 'false'
);

?>
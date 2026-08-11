<?php

/**
 * PHP 8.2/8.3 compatibility shim for laravel/framework's config/database.php,
 * which references the Pdo\Mysql::ATTR_SSL_CA class constant. That class was
 * only added to PHP core in 8.4 — on earlier PHP versions with pdo_mysql
 * loaded, referencing it throws "Class Pdo\Mysql not found" before the app
 * ever boots. This defines a minimal stand-in so that reference resolves.
 */

namespace Pdo;

if (! class_exists(Mysql::class) && PHP_VERSION_ID < 80400) {
    class Mysql
    {
        const ATTR_SSL_CA = \PDO::MYSQL_ATTR_SSL_CA;
    }
}

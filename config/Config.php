<?php
namespace install\config;
class Config
{
    const MYSQL_USER = 'xxx';
    const MYSQL_PASSWORD = 'xxx';
    const MYSQL_DB_NAME = 'install';
    const MYSQL_TABLE_NAME = 'install_test';
    const MYSQL_HOST = 'localhost';
    const MYSQL_CHARSET = 'utf8';
    const MYSQL_COLLATE = 'utf8_unicode_ci';
    const MYSQL_PORT = '3306';
    const DB_TYPE = 'MySQL';
    const MYSQL_DSN = 'mysql:host=localhost;dbname='.self::MYSQL_DB_NAME.';charset=utf8';
}
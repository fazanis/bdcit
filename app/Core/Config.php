<?php
namespace App\Core;

class Config
{
    public function __construct()
    {
        $dotenv = new Dotenv();
        $dotenv->load(APPLICATION_PATH.'/../.env');
        define('MODE', 'prod'); //or dev
    }
}
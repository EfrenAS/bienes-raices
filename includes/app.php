<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'functions.php';
require 'config/database.php';

$database = connectToDb();

use Model\ActiveRecord;

ActiveRecord::setDB($database);

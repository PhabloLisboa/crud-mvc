<?php

include './autoload.php';
spl_autoload_register('autoload');

use Routes\Routes;
session_start();
Routes::initRoutes();
<?php
include './autoload.php';

spl_autoload_register('autoload');

use Routes\Routes;

Routes::initRoutes();
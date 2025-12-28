<?php


// comfigure hosting virtuales en mi maquina asi que cambie esta linea de cosigo , adecuala a tu necesidad
define('BASE_URL', rtrim((isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'], '/') . '/');

define('controller_default','paginaController');
define('action_default','index');
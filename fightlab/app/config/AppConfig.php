<?php

const APP_URL = "http://localhost/lab_prog_2025_JoseIgnacio_Leguizamon/public/";
define ('APP_URI', $_SERVER['DOCUMENT_ROOT'] . '/lab_prog_2025_JoseIgnacio_Leguizamon/app/');

 define('APP_DIR_TEMPLATE', APP_URI . 'resources/template/'); // Directorio de las plantillas
    define('APP_DIR_VIEWS', APP_URI . 'resources/views/'); // Directorio de vistas
    define('APP_DIR_REPORTS', APP_URI . 'resources/reports/'); // Directorio de reportes

    
//#########################################
// PLANTILLA PARA LAS VISTAS
//#########################################

    define('APP_FILE_TEMPLATE', APP_DIR_TEMPLATE . 'template.php');
    define('APP_FILE_LOG_ERRORS', APP_URI . '/logs/error.log');
    define('APP_FILE_LOG_ACCESS', APP_URI . '/logs/access.log');

    define('APP_FILE_LOGIN', APP_DIR_VIEWS . 'authentication/index.php');
    define('APP_FILE_LOGOUT', APP_DIR_VIEWS . 'authentication/logout.php');

//#########################################
// CONTROLADOR Y ACCION POR DEFECTO
//#########################################

const APP_DEFAULT_CONTROLLER = "authentication";
const APP_DEFAULT_ACTION = "index";

const APP_AUTHENTICATION_CONTROLLER = "authentication";
const APP_LOGIN_ACTION = "login";


//#########################################
// MANEJO DE SESIONES
//#########################################

const APP_TOKEN = '$2y$10$.g3m/GM35CL0L7IRQY0AzOXN27mAhr5ZTslwetuAhUemb9nX8Cuje';
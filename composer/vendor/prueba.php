<?php
require_once 'autoload.php';
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Crear una nueva instancia del logger
$logger = new Logger('mi_aplicacion');

// Agregar un manejador de registros que envíe los registros a un archivo
$handler = new StreamHandler('log.txt', Level::Warning);
$logger->pushHandler($handler);

// Registrar diferentes niveles de eventos
$logger->debug('Mensaje de depuración');
$logger->info('Mensaje informativo');
$logger->notice('Mensaje de aviso');
$logger->warning('Mensaje de advertencia');
$logger->error('Mensaje de error');
$logger->critical('Mensaje crítico');
$logger->alert('Mensaje de alerta');
$logger->emergency('Mensaje de emergencia');
<?php
require_once 'ChromePhp.php';
$sayi = rand(1,10);

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('log_errors_max_len', 0);
ini_set('error_log', '/var/log/apache2/php_errors.log');
ini_set('memory_limit', '1K');
register_shutdown_function('shutdown_notify');
ChromePhp::log('registered shutdown function');

function shutdown_notify()
{
   $error = error_get_last();
    var_export($error);
}

function a($arg){
    b($arg);
}
function b(&$arg){
    c('beta');

}
function c($arg){
    $declared = 'veriable';
    ChromePhp::log('xdebug_get_declared_vars',xdebug_get_declared_vars());
    ChromePhp::groupCollapsed('backtrace');
    ChromePhp::log(debug_trace());
    ChromePhp::groupEnd();
    //var_dump(xdebug_get_declared_vars());
    ChromePhp::info('Triggired Notice');
    trigger_error('Custum Notice', E_USER_NOTICE);
    ChromePhp::warn('Triggired Warning');
    trigger_error('Costum Warning', E_USER_WARNING);
    ChromePhp::error('Triggired Error');
    trigger_error('Custom Fatal', E_USER_ERROR);
}

for ( $i = 0;$i <=50;$i++){
    slow();
}
slower();
a('sad');

function slow(){
    for ($i = 0;$i<=100000;$i++){

    }
}

function slower(){
    usleep(5000);
}


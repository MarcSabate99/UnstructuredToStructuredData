<?php
const PRESTASHOP = 1;
const NGINX_SERVER = 2;
const IMPORTANT = 1;
const NOT_IMPORTANT = 2;

if (!file_exists('error.log')) {
    touch('error.log');
}

error_log(date("Y/m/d G:i:s") . "-" . PRESTASHOP . "-" . IMPORTANT . "-" . "No se ha podido cargar el Front Controller\n", 3, "error.log");
error_log(date("Y/m/d G:i:s") . "-" . PRESTASHOP . "-" . IMPORTANT . "-" . "Error al generar la comanda\n", 3, "error.log");
error_log(date("Y/m/d G:i:s") . "-" . PRESTASHOP . "-" . NOT_IMPORTANT . "-" . "Notice array key exists\n", 3, "error.log");
error_log(date("Y/m/d G:i:s") . "-" . NGINX_SERVER . "-" . IMPORTANT . "-" . "Error en el archivo index.php en la linea 140.\n", 3, "error.log");

echo "Log generat, <a href='index.php'>tornar a l'arrel</a>";
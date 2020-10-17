<?php
require_once 'classes/DBConnection.php';
require_once 'classes/LogHandler.php';
$dbConnection = new DBConnection("localhost", "root", "", "unstructured_data_to_structured_data");
$connection = $dbConnection->connect();
if ($connection) {
    if (file_exists('error.log')) {
        if ($dbConnection->isInstalled()) {
            $data = file("error.log", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $dataToSave = LogHandler::processData($data);
            LogHandler::saveData($dataToSave, $connection);
            //TODO:El que es vulgui fer després de guardar les dades actuals d'error.log (exemple eliminar l'arxiu, mostrar les dades guardades, etc.)
        }else{
            include_once 'install/index.php';
        }
    } else {
        echo "L'arxiu error.log no existeix, fes clic <a href='generate_log.php'>aquí</a> per generar logs.";
    }
}
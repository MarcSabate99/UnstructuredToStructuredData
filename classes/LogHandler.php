<?php


class LogHandler
{
    public static function processData($data)
    {
        $dataToSave = [];
        foreach ($data as $key => $line) {
            $currentData = explode('-', $line);
            $dataToSave[$key]['date'] = $currentData[0];
            $dataToSave[$key]['logger'] = $currentData[1];
            $dataToSave[$key]['importance'] = $currentData[2];
            $dataToSave[$key]['message'] = $currentData[3];
        }
        return $dataToSave;
    }

    public static function saveData($data, mysqli $connection)
    {
        foreach ($data as $log) {
            $date = $log['date'];
            $logger = $log['logger'];
            $importance = $log['importance'];
            $message = $log['message'];
            $sql = "INSERT INTO logs (`logger`, `date`, `importance`, `message`) VALUES ({$logger} , '{$date}', {$importance}, '{$message}')";
            $stmt = $connection->prepare($sql);
            if ($stmt) {
                $stmt->execute();
            }
        }
    }
}
<?php

function addLog() : bool {
    $logName = date("Y-m-d");

    $info = [
        'dt' => date("H:i:s"),
        'ip'   => $_SERVER['REMOTE_ADDR'],
        'uri'   => $_SERVER['REQUEST_URI'],
        'referer'   => $_SERVER['HTTP_REFERER'] ?? ''
    ];
    $log = json_encode($info) . "\n";
    file_put_contents("logs/$logName.log", $log, FILE_APPEND);
    return true;
}

/*function checkLogName(string $name) : bool {
    return !!preg_match('/^\d{4}\-\d{2}\-\d{2}\.txt$/', $name);
}*/

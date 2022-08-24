<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit', -1);
ini_set('error_reporting', 0);

if (!$argv[1]) {
    echo "How to use : php port.php example.com";
} else {

    // function cURL($hostname)
    // {
    //     $setopt = [
    //         CURLOPT_URL => $hostname,
    //         CURLOPT_RETURNTRANSFER => true,
    //     ];

    //     $ch = curl_init();
    //     curl_setopt_array($ch, $setopt);
    //     return curl_exec($ch);
    //     curl_close($ch);
    // }

    $ports = [
        "http"      => "80",
        "ssl"       => "443",
        "ftp"       => "21",
        "ftps"      => "990",
        "ssh"       => "22",
        "telnet"    => "23",
        "smtp"      => "25",
        "smtps"     => "465",
        "pop3"      => "110",
        "pop3s"     => "995",
        "imap"      => "143",
        "imaps"     => "993",
        "mysql"     => "3306",
    ];

    foreach ($ports as $port) {
        $host = @fsockopen($argv[1], $port, $errno, $errmsg, 2);

        if (is_resource($host)) {
            echo $argv[1] . " : $port [" . array_search($port, $ports) . "] is open" . PHP_EOL;

            fclose($host);
        } else {
            echo $argv[1] . " : $port [" . array_search($port, $ports) . "] not open" . PHP_EOL;
        }
    }
}

// $run->url = 'mysch.id';

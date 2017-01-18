<?php
include 'config.php';

$url = URL;

$db = new mysqli(DBHOST, DBUSER, DBPASS, DATABASE);
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
));

$resp = curl_exec($curl);
curl_close($curl);
$json = json_decode($resp, true);


if ($json['meta']['status'] == "200") {
    foreach ($json['data'] as $event) {
        if ($event['portal']['id'] == "86744") {
            $categoryName = $event['category']['name'];
            $title        = $event['title'];
            foreach ($event['dates'] as $date) {
                $starts_at = str_replace("T", " ", str_replace("Z", "", $date['starts_at']));
                $ends_at   = str_replace("T", " ", str_replace("Z", "", $date['ends_at']));
                $sql       = 'INSERT INTO test ' . '(`Event Name`, `Event Category`, `Start Time`, `End Time`) ' . 'VALUES ( \'' . $title . '\',\'' . $categoryName . '\' , \'' . $starts_at . '\',\' ' . $ends_at . '\' )';
                if ($db->query($sql) === TRUE) {
                    echo "Success";
                } else {
                    echo "Error";
                }
            }
        }
    }
}


?>

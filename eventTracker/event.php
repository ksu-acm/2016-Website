<?php
include 'config.php';

$url = URL;

$db = new mysqli(DBHOST, DBUSER, DBPASS, DATABASE, '8889');
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
                $starts_at = $date['starts_at'];
                $ends_at   = $date['ends_at'];
                $eventID   = $date['id'];

                date_default_timezone_set('America/Chicago');

                $start     = strtotime($starts_at);
                $end       = strtotime($ends_at);
                $sdt       = new DateTime("@$start");
                $edt       = new DateTime("@$end");
                $tz        = new DateTimeZone('America/Chicago');

                $sdt->setTimezone($tz);
                $edt->setTimezone($tz);

                $sql       = 'INSERT INTO events ' . '(`EventName`, `EventID`, `EventCategory`, `StartTime`, `EndTime`) '
                             . 'VALUES ( \'' . $title . '\' , \'' . $eventID . '\' , \'' . $categoryName . '\' , \'' . $sdt->format('Y-m-d H:i:s') .
                             '\',\' ' . $edt->format('Y-m-d H:i:s') . '\' )';
                if ($db->query($sql) === TRUE) {
                    echo "Success";
                } else {
                    echo "Failed or already in DB";
                }
            }
        }
    }
}


?>

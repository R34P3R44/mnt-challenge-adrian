<?php
    echo "we are in php";
    header('Content-type: application/json');
    $host        = "host = 127.0.0.1";
    $port        = "port = 5432";
    $dbname      = "dbname = users";

    $db = pg_connect( "$host $port $dbname"  );
    if(!$db) {
       echo "Error : Unable to open database\n";
    } else {
       echo "Opened database successfully\n";
    }
   
    //$json = file_get_contents('php://input');
    $json = $_POST;
    echo $json;
    $json_decode = json_decode($json, true); 
    $json_encode = json_encode($json_decode);
    echo $json_encode;


    $ret = pg_query($db, $sql);
    if(!$ret) {
       echo pg_last_error($db);
    } else {
       echo "User created successfully\n";
    }
    pg_close($db);
?>
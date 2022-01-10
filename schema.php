<?php
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = users";

   $db = pg_connect( "$host $port $dbname"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }
   
   $sql =<<<EOF
      CREATE TABLE TEST_2
      (ID INT PRIMARY KEY     NOT NULL,
      NAME        CHAR(50),
      TITLE       CHAR(50),
      FIRST       CHAR(50),
      LAST        CHAR(50),
      GENDER      CHAR(50),
      EMAIL       CHAR(50),
      DOB         CHAR(50),
      DATE        CHAR(50),
      AGE         INT         NOT NULL,
      PHONE       CHAR(50));
EOF;

   $ret = pg_query($db, $sql);
   if(!$ret) {
      echo pg_last_error($db);
   } else {
      echo "Table created successfully\n";
   }
   pg_close($db);
?>

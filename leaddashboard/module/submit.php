<?php
try {
    $dbh = new PDO("pgsql:dbname=mpxd_dw;host=192.168.1.52", "postgres", "mrt@mpxd!@#123" );
    /*** echo a message saying we have connected ***/
    echo 'Connected to database<br />';

    /*** INSERT data ***/
    $slug = $_POST["slug"];
    $prognosis = $_POST["prognosis"];
    
    $count = $dbh->query("INSERT INTO \"PROGNOSIS\" (slug, prognosis) VALUES ('$slug', '$prognosis')");

    /*** echo the number of affected rows ***/
    // echo $count;

    /*** close the database connection ***/
    $dbh = null;
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
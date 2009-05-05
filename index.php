<?php

    if ($db = new SQLiteDatabase('database.db')) {
        $q = @$db->query('SELECT * FROM filelist WHERE title LIKE "%Plos Bio%"');

/*        if ($q === false) {
            $db->queryExec('CREATE TABLE tablename (id int, requests int, PRIMARY KEY (id)); INSERT INTO tablename VALUES (1,1)');
            $hits = 1;
        }
        
        else {
        
        */
            $result = $q->fetchSingle();
            echo $result;
//        }


    } else {
        die($err);
    }


?>

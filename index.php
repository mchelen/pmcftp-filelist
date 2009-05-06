<?php
/* Pubmed Central file list
 * 
 * 2009-05-05 Written by Michael Chelen
 *
 *
 *
 */



    if ($db = new SQLiteDatabase('database.db')) {
        $q = @$db->query('SELECT * FROM filelist WHERE title LIKE "%Plos Bio%"');

       if ($q === false) {

exec("wget ftp://ftp.ncbi.nlm.nih.gov/pub/pmc/file_list.txt");
/* 

            $db->queryExec('CREATE TABLE tablename (id int, requests int, PRIMARY KEY (id)); INSERT INTO tablename VALUES (1,1)');
            $hits = 1;
            */
            
            
        }



        else {
            $result = $q->fetchSingle();
            echo $result;
        }


    } else {
    
    die($err);



/*
$myFile = "file_list.txt";

$fh = fopen($myFile, 'w') or die("can't open file");

$stringData = "Floppy Jalopy\n";
fwrite($fh, $stringData);
$stringData = "Pointy Pinto\n";
fwrite($fh, $stringData);
fclose($fh);
*/

    }


?>

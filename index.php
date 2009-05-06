<?php
/* Pubmed Central file list

EXPERIMENTAL CODE!!EXPERIMENTAL CODE!!EXPERIMENTAL CODE!!

  Program outline:
    Prepares database and returns query results.
    - load database if it exists
     > if not create database
      - load file if it exists
        > if not download file


  2009-05-05 Written by Michael Chelen http://www.mikechelen.com
  
  
  License: Public Domain http://creativecommons.org/licenses/publicdomain/

*/

// variable config
$databaseFile = "database.db"; // file name for the database
$tableName = "filelist"; // table name in the database
$fileName = "file_list.txt"; // file name for the text file
$searchString = "%Plos Bio%"; // sql LIKE statement
$searchField = "title"; // column names: path, title, id 

$inputSearch = $_GET['inputSearch'];
$inputField = $_GET['inputField'];
$inputId = $_GET['inputId'];

if ($inputSearch && $inputSearch && $inputId) {}
else{
print_r('<form action="index.php" method="get">
Search: <input type="text" name="inputSearch" />
Field: <input type="text" name="inputField" />
ID: <input type="text" name="inputId" />
<input type="submit" />
</form>');

print_r($inputSearch);
print_r($inputField);
print_r($inputId);
}

$result = getResult($databaseFile, $tableName, $searchField, $searchString);

// $finalOutput = $result;

// print_r $finalOutput;

/*

to do

*/
// load database and check for table



/* Functions
 *
 *
 *
 *
 */

/* function to get the results from the database
should ideally return a result array from fetch() 
*/
function getResult ($databaseFile, $tableName, $searchField, $searchString) {
  if ($db = new SQLiteDatabase($databaseFile)) {
    $q = @$db->query('SELECT * FROM ' . $tableName .' WHERE '. $searchField .' LIKE "'.$searchString.'"');
// if the database has no entries
    if ($q === false) {
//    check if the table exists
      $q = @$db->query('SELECT * FROM ' . $tableName);
            if ($q === false) {
      
      $sql='CREATE TABLE '.$tableName.' (path varchar(128), title varchar(128), id varchar(128));';
      print_r($sql);
      $db->queryExec($sql);
      exec("wget $url");
      }
      }
    else {
      $result = $q->fetch();
      return $result;
    }
  } else {
    die($err);
  }
}










function downloadFile ($url) {
// download file by url
echo "downloading $url";
exec("wget $url");
echo "downloaded $url";
}




function loadFile ($fileName) {
    $myFile = $fileName;
    $fh = fopen($myFile, 'w') or die("can't open file");
    if (isset($fh)) {
      echo "file_list.txt found okay";
    }
}




function loadDatabase ($fileName,$tableName) {

if ($db = new SQLiteDatabase('database.db')) {

  // tries to load a query from the db
  $q = @$db->query('SELECT * FROM ' . $tableName);
  if ($q === false) {
    return false;
  }

    
  $q = @$db->query('SELECT * FROM ' . $tableName .'filelist WHERE title LIKE "%Plos Bio%"');

  // checks if any query results have been returned
  if ($q === false) {
/*            $db->queryExec('CREATE TABLE tableName (id int, requests int, PRIMARY KEY (id)); INSERT INTO tableName VALUES (1,1)');
            $hits = 1;        */
    }
        else {
            $result = $q->fetchSingle();
            echo $result;
        }
        
    } else {
    die($err);
    }


}


// tries to load database object can be created

/*
$stringData = "Floppy Jalopy\n";
fwrite($fh, $stringData);
$stringData = "Pointy Pinto\n";
fwrite($fh, $stringData);
fclose($fh);
*/


?>


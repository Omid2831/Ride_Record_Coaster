<?php
/**
 * we take out the information out of the config.php
 */
include('datainfo/Config.php');

/**
 * Create a dsn ( datasource-string) to log in 
 * on the DataBase server en database
 */

$dsn = "mysql:host=$server;
        dbname=$Database_username;
        charset=UTF8";

/**
 * Create a new PDO-Objects so we can connect to the database and Mysql 
 * and for more Enhancements we use the PDO-Object
 */
$pdo = new PDO($dsn, $Database_username, $Database_password);
/* Delete-query */

$sql = "delete from RollercoasterOfEu
where id = :Id";

/* method prepare in de PDO */
$statement = $pdo->prepare($sql);

$statement -> bindValue(':Id' , $_GET['Id'], PDO::PARAM_INT);

/* EXECUTE THE CODE */

$statement->execute();

?>
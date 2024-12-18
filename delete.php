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
where Id = :Id";

/* method prepare in de PDO */
$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

/* EXECUTE THE CODE */

$statement->execute();
/* give the user a notification so they can see what is going on! */


header('Refresh:3; url=index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="alert alert-success text-center" role="alert">
                    Data has been deleted!!!!
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
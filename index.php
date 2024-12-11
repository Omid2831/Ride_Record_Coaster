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

/**
 * Create a select-query that we want to execute on the database
 */
$query = "SELECT  REC.Id
                 ,REC.Name_ID
                 ,REC.park
                 ,REC.country
                 ,REC.topspeed
                 ,REC.height

 FROM RollercoasterOfEu AS REC
 ORDER BY  REC.HEIGHT ASC";
/**
 * With the method prepare in the PDO-Object
 *  we can prepare the query to execute it
 */
$statement = $pdo->prepare($query);
/**
 * Execute the Query 
 */
$statement->execute();

/**
 * Get the selected records as objects in an array
 * and put them in a variable $result
 */

$result = $statement->fetchAll(PDO::FETCH_OBJ);
/**
 *We'll show the results on the screen so we know what we
 * retrieved from the database
 */

//here are we gonna show the results on the screen but for developers!
//var_dump($result);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>

<body>
    <div class="container mt-3">
        <div class="row ">
            <div class="col-2"></div>
            <div class="col-8 text-primary">
                <h1 style="color:rgb(2,15,142);">Highest Parks in EU</h1>
            </div>
            <div class="col-2"></div>

            <div class="col-2"></div>
            <div class="col-2"></div>
            <div class="col-8">
                Adding new rollercoaster: <a href="./Create.php"><i class="bi bi-plus-square-fill"></i></a>
                <table class="table table-hover">
                    <thead>
                        <th>Name of Rollercoster</th>
                        <th>Name of the Park</th>
                        <th>Country</th>
                        <th>TopSpeed</th>
                        <th>Height</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>

                    </thead>
                    <tbody>
                        <!--here we are going to add foreach to set the databases-->
                        <?php
                        /*foreach ($result as $rollercoaster) 
                          {
                   echo " <tr>
                  <td>$rollercoaster->Name_ID</td>
                  <td>$rollercoaster->park</td>
                  <td>$rollercoaster->country</td>
                  <td>$rollercoaster->topspeed</td>
                  <td>$rollercoaster->height</td>
                          </tr>";
                          }*/
                        ?>

                        <?php foreach ($result as $rollercoaster): ?>
                            <tr>
                                <td><?= $rollercoaster->Name_ID ?></td>
                                <td><?= $rollercoaster->park ?></td>
                                <td><?= $rollercoaster->country ?></td>
                                <td><?= $rollercoaster->topspeed ?></td>
                                <td><?= $rollercoaster->height ?></td>
                                <td class="text-center">
                                    <a href="./update.php?Id=<?= $rollercoaster->Id?>" class="text-primary">
                                        <i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td class="text-center ">
                                    <a href="./delete.php?Id=<?= $rollercoaster->Id?>" class=" text text-danger">
                                        <i class="bi bi-x-square-fill"></i>
                                </td>
                                </a>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
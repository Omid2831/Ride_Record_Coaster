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

if (isset($_POST['submit'])) {

    // Prepare the SQL update statement
    $sql = "UPDATE RollercoasterOfEu AS REC
SET
    REC.Name_ID = :Name_ID,
    REC.park = :park,
    REC.country = :country,
    REC.topspeed = :topspeed,
    REC.height = :height,
    REC.built_year = :built_year

WHERE REC.Id = :Id";

    $statement = $pdo->prepare($sql);

    // Bind values
    $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
    $statement->bindValue(':Name_ID', $_POST['Name_ID'], PDO::PARAM_STR);
    $statement->bindValue(':park', $_POST['park'], PDO::PARAM_STR);
    $statement->bindValue(':country', $_POST['country'], PDO::PARAM_STR);
    $statement->bindValue(':topspeed', $_POST['topspeed'], PDO::PARAM_INT);
    $statement->bindValue(':height', $_POST['height'], PDO::PARAM_INT);
    $statement->bindValue(':built_year', $_POST['built_year'], PDO::PARAM_STR);

    /* EXECUTE THE CODE */
    $statement->execute();
    /**
     *echo 'The data has been modified, you will be redirected to the index page.';
     */
    $display = 'flex';

    header('Refresh:3; url=index.php');
} else {



    /* Creating a sql that gets the record of the table with the id in the url */

    $sql = "SELECT   REC.Id
                 ,REC.Name_ID
                 ,REC.park
                 ,REC.country
                 ,REC.topspeed
                 ,REC.height
                 ,REC.built_year

                FROM RollercoasterOfEu AS REC
                WHERE  REC.Id = :Id";

    // Prepare the statement
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);
    $statement->execute();

    // Fetch the result
    $result = $statement->fetch(PDO::FETCH_OBJ);
    $display = 'none';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container ">

        <div class="row" style="display:<?= $display ?? 'flex'; ?>">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="alert alert-success" role="alert">
                    The rollercoaster has been added to the database, you will be redirected to the index page.
                </div>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-primary text-center">
                <h3 class="text-center">Modify your table</h3>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="col-3"></div>
        <div class="col-6 offset-md-3">
            <form action="update.php" method="POST">
                <div class="mb-3">
                    <label for="nameRoleerCoaster" class="form-label">name of the rollercoaster</label>
                    <input name="Name_ID" type="text" class="form-control" id="nameRoleerCoaster"
                        aria-describedby="rollercoaster" placeholder="Enter the name of the rollercoaster"
                        value="<?= $result->Name_ID ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="nameOfthePark" class="form-label">Name of the park</label>
                    <input name="park" type="text" class="form-control" id="nameOfthePark" aria-describedby="Park"
                        placeholder="Enter the name of the park" value="<?= $result->park ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="nameOftheCountry" class="form-label">Name of the country:</label>
                    <input name="country" type="text" class="form-control" id="nameOftheCountry"
                        aria-describedby="nameOftheCountry" placeholder="Enter the name of the country"
                        value="<?= $result->country ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="topSpeed" class="form-label">Top Speed:</label>
                    <input name="topspeed" type="number" min="0" max="255" class="form-control" id="topSpeed"
                        aria-describedby="topSpeed" placeholder="Enter the Top Speed"
                        value="<?= $result->topspeed ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="heights" class="form-label">Heights:</label>
                    <input name="height" type="number" min="0" max="255" class="form-control" id="heights"
                        aria-describedby="heights" placeholder="Enter the heights"
                        value="<?= $result->height ?? ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="built_year" class="form-label">Built Year:</label>
                    <input name="built_year" type="date" min="1900" class="form-control" id="built_year"
                    aria-describedby="built_year" placeholder="Enter the built year" value="<?= $result->built_year ?? ''; ?>">
                </div>

                <input type="hidden" name="Id" value="<?= $result->Id ?? ''; ?>">

                <div class="d-grid gap-2">
                    <button name="submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-3 "></div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
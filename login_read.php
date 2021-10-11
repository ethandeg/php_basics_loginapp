<?php

        $connection = mysqli_connect('localhost','root','','loginapp');
        if($connection){
            echo "Connected succesfully";
        } else {
            die('Database connection failed');
        }
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die('Query failed' . mysqli_error());
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <pre>
                    <?php 
                    print_r($row);
                    ?>
                    </pre>
                   <?php 
                }
                ?>



        </div>



    </div>
</body>
</html>
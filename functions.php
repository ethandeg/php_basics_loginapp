<?php include "db.php";
function show_all_data(){
    global $connection;
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query failed' . mysqli_error());
    }
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

function update_table(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "UPDATE users SET ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "WHERE id = $id ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query failed man' . mysqli_error($connection));
    }
}
function delete_rows(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $query = "DELETE FROM users ";
    $query .= "WHERE id = $id ";

    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query failed man' . mysqli_error($connection));
    }
}

function create_row(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    /* SANITIZE FOR SQL INJECTION HACKERS */
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    $hash_format = '$2y$10$';
    $salt = "iusesomecrazystrings22";
    $hashF_and_salt = $hash_format . $salt;
    $password = crypt($password, $hashF_and_salt);
    $query = "INSERT INTO users (username, password) ";
    $query .= "VALUES ('$username', '$password')";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die('Query failed' . mysqli_error());
    }
}






?>
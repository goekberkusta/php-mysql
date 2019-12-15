<?php

session_start();

$name ='';
$trainer='';
$players='';
$update = false;
$id=0;
$mysqli = new mysqli('localhost','root','','football') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){

    $id = $_POST['save'];

    $name = $_POST['name'];
    $trainer = $_POST['trainer'];
    $players = $_POST['players'];

    $mysqli->query("INSERT INTO club(id,name,trainer,players) VALUES('$id','$name','$trainer','$players')") or
    die($mysqli -> error);

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: test.php");
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM club WHERE id=$id") or die(mysqli_error($mysqli));

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: test.php");

}

if(isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM club WHERE id = $id") or die($mysqli->error);
    if(@count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $trainer = $row['trainer'];
        $players = $row['players'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $trainer = $_POST['trainer'];
    $players = $_POST['players'];

    $mysqli ->query("UPDATE club SET name='$name', trainer='$trainer', players='$players' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: test.php');
}
<!DOCTYPE HTML>
<html>

<head>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Football Club</title>
</head>
<body>
<?php require_once 'process.php'; ?>

<?php
if(isset($_SESSION['message'])): ?>

<div class ="alert alert-<?=$_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
</div>
<?php endif ?>
<div class="container">
<?php
    $mysqli = new mysqli('localhost','root','','football') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM club");
    //pre_r($result);
    ?>
<div class="row justify-content-center">
    <table class ="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Team Name</th>
                <th>Team Trainer Name</th>
                <th>Number of Players</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
        <tr>
            <td> <?php echo $row['id'];?> </td>
            <td> <?php echo $row['name'];?> </td>
            <td> <?php echo $row['trainer'];?> </td>
            <td> <?php echo $row['players'];?> </td>

            <td>
                <a href="test.php?edit=<?php echo $row['id']; ?>"
                   class ="btn btn-info">Edit</a>
                <a href="process.php?delete=<?php echo $row['id'];?>"
                   class ="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
<?php
function pre_r($array){
        echo'<pre>';
        print_r($array);
        echo '</pre>';
    }
?>

<div class="row justify-content-center">
<form action="process.php" method="POST">
    <input type="hidden" name ="id" value="<?php echo $id; ?>"
    <div class="form-group">
    <label>Team Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter team name">
    </div>
    <div class="row justify-content-center">
    <label>Team Trainer Name</label>
        <input type="text" name="trainer" class="form-control" value="<?php echo $trainer; ?>" placeholder="Enter trainer name">
     </div>
    <div class="row justify-content-center">
        <label>Number of Players</label>
        <input type="text" name="players" class="form-control" value="<?php echo $players; ?>" placeholder="Enter number of players">
    </div>
    <div class="row justify-content-center">
        <?php
            if($update == true):
        ?>
            <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>
            <button type="submit" class="btn btn-primary" name="save">Save
    <?php endif; ?>
    </div>
</form>
</div>
</div>
</body>
</html>
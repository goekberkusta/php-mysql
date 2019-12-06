<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Football Club</title>
</head>
<body>
<?php require_once 'process.php'; ?>
<div class="row justify-content-center">
<form action="process.php" method="POST">
    <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="Enter your name">
    </div>
    <div class="form-group">
    <label>Location</label>
    <input type="text" name="location" class="form-control" value="Enter your location">
     </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary" name="save">Save</button>
    </div>
</form>
</div>
</body>
</html>
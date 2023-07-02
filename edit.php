<?php
include "db_conn.php";
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $first_name = $_POST['$first_name'];
    $last_name = $_POST['$last_name'];
    $email = $_POST['$email'];
    $gender = $_POST['$gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',
                  `last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=Data updated successfully");
    }else {
        echo "Failed. " .mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>To-do List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <img src="todo.png" alt="todo" height="80px"  width="80px" ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Things to-do</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="text-center mb-4">
        <h3>Edit User Information</h3>
        <p class="text-muted">Click update after changing any information</p>

    </div>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `todo` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Title:</label></label>
                    <input type="text" class="form-control" name="title"
                           value="<?php echo $row['title']?>">
                </div>
                <div class="col">
                    <label class="form-label">Description:</label></label>
                    <input type="text" class="form-control" name="description"
                           value="<?php echo $row['description']?>">
                </div>
            </div>
            <div class="mb-3">

                <label class="form-label">Deu Date:</label></label>
                <input type="date" class="form-control" name="date"
                       value="<?php echo $row['due-date']?>">

            </div>
            <label class="mb-3">
                <label class="form-label">Status:</label></label>&nbsp;
                <input type="text" class="form-control" name="status"
                       value="<?php echo $row['status']?>")>
            </div>
            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>

        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
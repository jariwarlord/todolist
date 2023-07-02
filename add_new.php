<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $status =  $_POST['status'];

    $sql = "INSERT INTO `todo`(`id`, `title`, `description`, `due_date`, `status`) VALUES (NULL,'$title','$description','$due_date','$status')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=New thing to-do created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>To-Do List</title>
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
        <h3>Add New Thing to-do</h3>
        <p class="text-muted">Complete form below to add a new thing to-do</p>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" placeholder="Doing cardio">
                    </div>

                    <div class="col">
                        <label class="form-label">Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="daily exercises">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Due Date:</label>
                    <input type="date" class="form-control" name="date" placeholder="02/07/2023">
                </div>

                <div class="form-group mb-3">

                    &nbsp;
                    <label class="form-label">Status:</label>
                    <input type="text" class="form-control" name="status" placeholder="Not Done Yet">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>

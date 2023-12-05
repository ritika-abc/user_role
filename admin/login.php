<?php
session_start();

include_once "db.php";

// include_once "side.php";


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $user_role = $_POST['user_role'];


    $select = "SELECT * FROM user_role where name='$name' and password ='$password'     ";
    $query = mysqli_query($con, $select);
    $num_row = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
// $row['user_role'] 
    if ($num_row > 0) {
        $_SESSION['password'] = $password;
        $_SESSION['user_role'] =  $row['user_role'];

        $_SESSION['name'] = $name;


        header("location:user_view.php");
    } else {
        echo "not matched";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            overflow: hidden;
            background-image: url("2.png");
            height: 100vh;
            width: 100%;
        }

        form {
            background-color: rgba(0, 0, 0, .2);
            color: white !important;
        }

        input {
            background-color: rgba(255, 255, 255, 0.2) !important;
            border: none !important;
            border: 0px solid #e5eaef;
            color: white !important;

        }

        input::placeholder {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row   mt-5">
            <div class="col-12">

                <form action="" method="post" class="  p-5 w-50 m-auto text-capitalize">

                    <input type="text" placeholder="Username" class="form-control mb-3" name="name">

                    <input type="password" placeholder="Password" class="form-control" name="password">
                    <input type="hidden" class="form-control" name="user_role">


                    <input type="submit" name="submit" class="btn btn-danger mt-3">
                    <a href="logout.php " class="float-end pt-3 text-white">logout here</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>


<?php

ob_end_flush();

?>
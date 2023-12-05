<?php

session_start();


if ($_SESSION["user_role"] == 1) {
    header("location:error.php");
}

if (!$_SESSION["name"]) {
    header("location:error.php");
}
?>

<?php

//  s n 2
ob_start();
include_once "header.php";
include_once "side.php";
include "db.php";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $user_role = $_POST['user_role'];
    $_SESSION['user_role'] = $user_role;
    $sql = "SELECT  * from `user_role`  WHERE 
         name='$name' and password='$password'and 
         email = '$email' ";

    $emailresult = mysqli_query($con, $sql);

    $user_matched = mysqli_num_rows($emailresult);
    if ($user_matched > 0) {
        echo "you have already registered !!";
    } else {
        $insrt = mysqli_query($con, "INSERT INTO 
            `user_role`(`name`, `password`,`email`,`user_role`) VALUES
             ('$name','$password','$email','$user_role')");

        if ($insrt) {
            header("location:login.php");
        }
    }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-capitalize">
                    <p class="m-0  text-danger">welcome <?php echo $_SESSION["name"] ?></p>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12  ">
                <form action="" method="post" class=" w-75 m-auto mt-5 text-capitalize">
                    <label for=""> user name</label>
                    <input type="text" class="form-control" name="name">


                    <label for=""> password</label>
                    <input type="password" class="form-control" name="password">
                    <label for=""> email</label>
                    <input type="email" class="form-control" name="email">

                    <label for="">Add user role</label>
                    <select name="user_role" class="form-select mb-3 " id="">
                        <option>---- Select user ----</option>
                        <option value="0">Admin</option>
                        <option value="1">Normal user</option>
                    </select>
                    <input type="submit" name="submit">
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php";
ob_end_flush();
?>
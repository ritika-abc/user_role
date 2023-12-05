<?php
include "db.php";
ob_start();
include "header.php";
include "side.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `user_role` WHERE `id`='$id'";
$query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($query)) {
    $name = $row['name'];
    $password = $row['password'];
    $email = $row['email'];
}

?>
<?php



if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];




    $sql1 = "UPDATE `user_role` SET `name`='$name',`password`='$password',`email`='$email' WHERE `id`='$id'";
    $query1 = mysqli_query($con, $sql1);
    // The die() function prints a message and exits the current script
    if ($query) {
        header("location:user_view.php");
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

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
                    <input type="text" value="<?php echo $name; ?>" class="form-control" name="name">


                    <label for=""> password</label>
                    <input  value="<?php echo $password;?>" type="text" class="form-control"  name="password">
                    <label for=""> email</label>
                    <input type="email" class="form-control" value="<?php echo $email;?>" name="email">


                    <input type="submit" class="btn btn-outline-info mt-3" name="submit">
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
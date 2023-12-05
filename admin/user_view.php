<?php
session_start();

// if ($_SESSION["user_role"] == 1) {
//     header("location:index.php");
// }

if (!$_SESSION["name"]) {
    header("location:error.php");
}
include "header.php";
include "side.php";
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <p class="m-0  text-danger text-capitalize">welcome <?php echo $_SESSION["name"] ?></p>

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
            <div class="col-12">
                <table class="table table-hover table-white table-bordered text-capitalize">
                    <thead>
                        <tr>
                            <td>s no</td>
                            <td>user name</td>
                            <td>email</td>
                            <td>password</td>
                            <td>User role</td>
                            <td>edit</td>
                            <td>delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "./db.php";
                        if ($_SESSION['user_role'] == 0) {
                            $sel = "SELECT * from `user_role`";
                        } else {
                            $name = $_SESSION['name'];

                            $sel = "SELECT * from `user_role` where `name` = '$name'";
                        }
                        // $sel = "SELECT * FROM `user_role`";
                        $query = mysqli_query($con, $sel);
                        $sno = 1;
                        while ($row = mysqli_fetch_array($query)) {

                            $role = $_SESSION['user_role'];
                        ?>
                            <tr>
                                <td><?php echo $sno ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td class="text-lowercase"><?php echo $row['email'] ?></td>
                                <td><?php echo $row['password'] ?></td>

                                <td><?php echo ($row['user_role'] == 0) ?  "admin" : "normal user"; ?></td>
                                <td><a href="./user_edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-info">edit</a></td>
                                <td><a href="./delete.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger">delete</a></td>

                            </tr>
                        <?php
                            $sno++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php";

?>
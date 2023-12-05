<!-- cat_id // cat_name -->

<?php
include "db.php";
if (isset($_POST['submit'])) {
  $cat_name = $_POST['cat_name'];
  $ins = "INSERT into `cat`(`cat_name`) VALUES ('$cat_name')";
  $qu = mysqli_query($con,$ins);
  if($qu){
    header("location:index.php");
  }
}
?>
<?php
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
            <h1 class="m-0">Add Category</h1>
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
      <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-6 shadow-lg p-5  ">
            <form action="" method="POST">
                <input type="text" name="cat_name" placeholder="Category name" class="form-control">
                <input type="submit" name="submit"  class="btn btn-danger  mt-3">
            </form>
        </div>
      </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
      
   <!-- /.content -->
   </div>
    <?php
include "footer.php";
 
?>
    
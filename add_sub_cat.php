<!-- 
    sub:cat --
    sub_id // cat_name // author_name // followers // rating
 -->

<?php
include "db.php";
if (isset($_POST['submit'])) {
  $author_name = $_POST['author_name'];
  $followers = $_POST['followers'];
  $rating = $_POST['rating'];
  $cat_name = $_POST['cat_name'];
  $sub_cat_name = $_POST['sub_cat_name'];

  $ins = "INSERT into `sub_cat`(`author_name`,`followers`,`rating`,`cat_id`,`sub_cat_name`) VALUES ('$author_name','$followers','$rating','$cat_name','$sub_cat_name')";
  $qu = mysqli_query($con, $ins);
  if ($qu) {
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
          <h1 class="m-0">Add Sub Category</h1>
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
          <form action="" class="text-capitalize" method="POST">
            <label for="">add sub category name</label>
            <input type="text" name="sub_cat_name" placeholder="Add Category Name" class="form-control mb-3">

            <label for="">author_name</label>
            <input type="text" name="author_name" placeholder="Author Name" class="form-control mb-3">

            <label for="">followers</label>
            <input type="text" name="followers" placeholder="Followers" class="form-control mb-3">

            <label for="">rating</label>
            <input type="text" name="rating" placeholder="Rating" class="form-control mb-3">

            <label for="">add category name</label>
            <select name="cat_name" class="form-control text-capitalize" id="">
              <option>Select here</option>
              <?php
              include "db.php";
              $sel = "SELECT * FROM `cat`";
              $quer = mysqli_query($con, $sel);
              while ($row = mysqli_fetch_array($quer)) {
                $cat_id = $row['cat_id'];
                $cat_name = $row['cat_name'];

              ?>
                <option value="<?php echo  $row['cat_id'] ?>"><?php echo  $row['cat_name'] ?></option>
              <?php
              }
              ?>
            </select>
            <input type="submit" name="submit" class="btn btn-danger  mt-3">
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
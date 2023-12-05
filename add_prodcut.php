<!-- 
    pro_id // cat_id // sub_cat_id // book_img // description // price //
 -->

 <?php
include "db.php";
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $cat_name = $_POST['cat_name'];
  $sub_cat_name = $_POST['sub_cat_name'];

  // image
  $image = $_FILES['image']['name'];
  $path = 'image/'.$image;

  move_uploaded_file($_FILES['image']['tmp_name'], $path);
  $ins = "INSERT into `pro`(`title`,`description`,`price`,`cat_id`,`sub_id`,`image`) VALUES ('$title','$description','$price','$cat_name','$sub_cat_name','$path')";
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
          <h1 class="m-0">Add Products</h1>
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
          <form action="" class="text-capitalize" enctype="multipart/form-data" method="POST">
            <label for="">add sub category name</label>
            <input type="text" name="sub_cat_name" placeholder="Add sub Category Name" class="form-control mb-3">

            <label for="">Book Image</label>
            <input type="file" name="image" class="form-control mb-3">
                        

            <label for="">title</label>
            <input type="text" name="title" placeholder="Book Title" class="form-control mb-3">

            <label for="">description</label>
            <input type="text" name="description" placeholder="Description...." class="form-control mb-3">

            <label for="">price</label>
            <input type="text" name="price" placeholder="Price" class="form-control mb-3">

            <label for="">add category name</label>
            
            <select name="cat_name" class="form-control text-capitalize mb-3" id="category-dropdown">
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

            <label for="">add category name</label>
            <select name="sub_cat_name" class="form-control text-capitalize" id="sub-category-dropdown">
              <option>Select here</option>
              <?php
              include "db.php";
              $sel = "SELECT * FROM `sub_cat`";
              $quer = mysqli_query($con, $sel);
              while ($row = mysqli_fetch_array($quer)) {
                $sub_id = $row['sub_id'];
                $sub_cat_name = $row['sub_cat_name'];

              ?>
                <option value="<?php echo  $row['sub_id'] ?>"><?php echo  $row['sub_cat_name'] ?></option>
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
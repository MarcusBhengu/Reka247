<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (isset($_POST['add_Category'])) {
    $category_name= $_POST['category_name'];
        
    $sql = "INSERT INTO Category (category_id, category_name) VALUES (NULL, '$category_name');";  
    mysqli_query($conn, $sql);
    
    echo "<script>alert(\"Category has been added Successfully...!\")</script>";
    echo "<script>window.location = 'Categories.php'</script>";
}
if (isset($_POST['add_Sub_Category'])) {
    $category_name= $_POST['category_name'];
    $sub_category_name= $_POST['sub_category_name'];
        
    $sql = "INSERT INTO Sub_Category (sub_category_id, category_name, sub_category_name) VALUES (NULL, '$category_name', '$sub_category_name');";  
    mysqli_query($conn, $sql);
    
    echo "<script>alert(\"Sub-Category has been added Successfully...!\")</script>";
    echo "<script>window.location = 'Categories.php'</script>";
}

if (isset($_POST['edit_Sub_Category'])) {
    $id = $_POST['id'];
    $category_name= $_POST['category_name'];
    $sub_category_name= $_POST['sub_category_name'];
    $sql = "UPDATE Sub_Category SET category_name='$category_name', sub_category_name='$sub_category_name' WHERE sub_category_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Sub Category Successfully Updated...!\")</script>";
  }
  if (isset($_POST['delete_Sub_Category'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Sub_Category WHERE sub_category_id= '$id';";
    mysqli_query($conn, $sql);
  }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          Categories
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">
                Add Category
              </button>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal2">
                Add Sub-Category
              </button>
            </div>
          </div>
        </div>
      </div>
        <!-- /.modal -->
        <div class="modal modal fade" id="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" method="post" action="Categories.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="exampleInputText" placeholder="Enter Category Name">
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Category" class="btn btn-success">Add Category</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.modal -->
        <div class="modal modal fade" id="modal2">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Sub-Category</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub-Category Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" method="post" action="Categories.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Main Category</label>
                                <select class="form-control select2" name="category_name" style="width: 100%;" required>
                                <?php
                                  $sql = "SELECT * FROM Category";
                                  $result = mysqli_query($conn, $sql);
                                  $resultcheck = mysqli_num_rows($result);
                                                  
                                  if($resultcheck>0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      
                                      echo"<option>".$row['category_name']."</option>";
                                      
                                    }
                                  }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sub-Category Name</label>
                                <input type="text" class="form-control" name="sub_category_name" id="exampleInputText" placeholder="Enter Sub-Category Name">
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Sub_Category" class="btn btn-success">Save changes</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories & Sub-Ctegories Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Main Category</th>
                  <th>Sub-Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Sub_Category ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      sub_category($row['sub_category_id'],$row['category_name'],$row['sub_category_name']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Main Category</th>
                  <th>Sub-Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    </section>
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
     
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>




<?php 
include('Footer.php');
?>
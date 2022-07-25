<?php 
include('header.php');
include('action.php');
require_once('connect.php');
if (isset($_POST['add_Attribute'])) {
    $attribute_name= $_POST['attribute_name'];
        
    $sql = "INSERT INTO Attributes (attribute_id, attribute_name) VALUES (NULL, '$attribute_name');";  
    mysqli_query($conn, $sql);
    
    echo "<script>alert(\"Attribute has been added Successfully...!\")</script>";
    echo "<script>window.location = 'Attributes.php'</script>";
}
if (isset($_POST['add_Sub_Attribute'])) {
    $attribute_name= $_POST['attribute_name'];
    $sub_attribute_name= $_POST['sub_attribute_name'];
        
    $sql = "INSERT INTO Sub_Attributes (sub_attribute_id, attribute_name, sub_attribute_name) VALUES (NULL, '$attribute_name', '$sub_attribute_name');";  
    mysqli_query($conn, $sql);
    
    echo "<script>alert(\"Sub-Attribute has been added Successfully...!\")</script>";
    echo "<script>window.location = 'Attributes.php'</script>";
}

if (isset($_POST['edit_Sub_Attribute'])) {
    $id = $_POST['id'];
    $attribute_name= $_POST['attribute_name'];
    $sub_attribute_name= $_POST['sub_attribute_name'];
    $sql = "UPDATE Sub_Attributes SET attribute_name='$attribute_name', sub_attribute_name='$sub_attribute_name' WHERE sub_attribute_id='$id' ;";
    mysqli_query($conn, $sql);
    echo "<script>alert(\"Sub Attribute Successfully Updated...!\")</script>";
  }
  if (isset($_POST['delete_Sub_Attribute'])) {
    
    $id = $_POST['id'];
    $sql = "DELETE FROM Sub_Attributes WHERE sub_attribute_id= '$id';";
    mysqli_query($conn, $sql);
  }

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Attribute
        <small>new</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Attribute</li>
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
                Add Attribute
              </button>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal2">
                Add Sub-Attribute
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
                <h4 class="modal-title">Add Attribute</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Attribute Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" method="post" action="Attributes.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Attribute Name</label>
                                <input type="text" name="attribute_name" class="form-control" id="exampleInputText" placeholder="Enter Attribute Name">
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Attribute" class="btn btn-success">Add Attribute</button>
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
                <h4 class="modal-title">Add Sub-Attribute</h4>
              </div>
              <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub-Attribute Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form role="form" method="post" action="Attributes.php">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Main Attribute</label>
                                <select class="form-control select2" name="attribute_name" style="width: 100%;" required>
                                <?php
                                  $sql = "SELECT * FROM Attributes";
                                  $result = mysqli_query($conn, $sql);
                                  $resultcheck = mysqli_num_rows($result);
                                                  
                                  if($resultcheck>0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      
                                      echo"<option>".$row['attribute_name']."</option>";
                                      
                                    }
                                  }
                                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sub-Attribute Name</label>
                                <input type="text" class="form-control" name="sub_attribute_name" id="exampleInputText" placeholder="Enter Sub-Attribute Name">
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="add_Sub_Attribute" class="btn btn-success">Save changes</button>
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
              <h3 class="box-title">AttributeS & Sub-Attribute Overview</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Main Attribute</th>
                  <th>Sub-Attribute</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $sql = "SELECT * FROM Sub_Attributes ";
                  $result = mysqli_query($conn, $sql);
                  $resultcheck = mysqli_num_rows($result);
                                  
                  if($resultcheck>0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      
                      sub_attribute($row['sub_attribute_id'],$row['attribute_name'],$row['sub_attribute_name']);
                    }
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Main Attribute</th>
                  <th>Sub-Attribute</th>
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
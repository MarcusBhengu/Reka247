<?php 
include('header.php');

if (isset($_POST['add_Permissions'])) {
  //position
  $position =$_POST['position'];

  //suppliers
  $add_suplliers=$_POST['add_suplliers'];
  $view_suplliers=$_POST['view_suplliers'];
  $update_suplliers=$_POST['update_suplliers'];
  $delete_suplliers=$_POST['delete_suplliers'];
  
  //brands
  $add_brands=$_POST['add_brands'];
  $view_brands=$_POST['view_brands'];
  $update_brands=$_POST['update_brands'];
  $delete_brands=$_POST['delete_brands'];

  //products
  $add_products=$_POST['add_products'];
  $view_products=$_POST['view_products'];
  $update_products=$_POST['update_products'];
  $delete_products=$_POST['delete_products'];

  //attributes
  $add_attributes=$_POST['add_attributes'];
  $view_attributes=$_POST['view_attributes'];
  $update_attributes=$_POST['update_attributes'];
  $delete_attributes=$_POST['delete_attributes'];

  //orders
  $add_orders=$_POST['add_orders'];
  $view_orders=$_POST['view_orders'];
  $update_orders=$_POST['update_orders'];
  $delete_orders=$_POST['delete_orders'];

  //permissions
  $add_permissions=$_POST['add_permissions'];
  $view_permissions=$_POST['view_permissions'];
  $update_permissions=$_POST['update_permissions'];
  $delete_permissions=$_POST['delete_permissions'];

  //users
  $add_users=$_POST['add_users'];
  $view_users=$_POST['view_users'];
  $update_users=$_POST['update_users'];
  $delete_users=$_POST['delete_users'];

  //calendar
  $add_calendar=$_POST['add_calendar'];
  $view_calendar=$_POST['view_calendar'];
  $update_calendar=$_POST['update_calendar'];
  $delete_calendar=$_POST['delete_calendar'];

  //mailbox
  $add_mailbox=$_POST['add_mailbox'];
  $view_mailbox=$_POST['view_mailbox'];
  $update_mailbox=$_POST['update_mailbox'];
  $delete_mailbox=$_POST['delete_mailbox'];

  //company
  $add_company=$_POST['add_company'];
  $view_company=$_POST['view_company'];
  $update_company=$_POST['update_company'];
  $delete_company=$_POST['delete_company'];

  //$sql = "INSERT INTO Permission (permission_id, position, add_suplliers, view_suplliers, update_suplliers, delete_suplliers, add_brands, view_brands, update_brands, delete_brands, add_products, view_products, update_products, delete_products, add_attributes, view_attributes, update_attributes, delete_attributes, add_orders, view_orders, update_orderss, delete_orders, add_permissions, view_permissions, update_permissions, delete_permissions, add_users, view_users, update_users, delete_users, add_calendar, view_calendar, update_calendar, delete_calendar, add_mailbox, view_mailbox, update_mailbox, delete_mailbox, add_company, view_company, update_company, delete_company) VALUES (NULL, '$position', '$add_suplliers', '$view_suplliers', '$update_suplliers', '$delete_suplliers', '$add_brands', '$view_brands', '$update_brands', '$delete_brands', '$add_products', '$view_products', '$update_products', '$delete_products', '$add_attributes', '$view_attributes', '$update_attributes', '$delete_attributes', '$add_orders', '$view_orders', '$update_orderss', '$delete_orders', '$add_permissions', '$view_permissions', '$update_permissions', '$delete_permissions', '$add_users', '$view_users', '$update_users', '$delete_users', '$add_calendar', '$view_calendar', '$update_calendar', '$delete_calendar', '$add_mailbox', '$view_mailbox', '$update_mailbox', '$delete_mailbox', '$add_company', '$view_company', '$update_company', '$delete_company');";  
  //mysqli_query($conn, $sql);
    
  echo "<script>alert(\"Permissions has been added Successfully...!$delete_calendar\")</script>";
  echo "<script>window.location = 'Permissions.php'</script>";

}




?>
<div class="content-wrapper">
<section class="content-header">
    <h1>
       Permissions Management
    </h1>
    <ol class="breadcrumb">
       <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Permissions</li>
    </ol>
</section>
<div class="callout callout-danger">
    <h4>Reminder!</h4>
    Only Administrator is allowed to give permissions
    <a href="#">Documentation</a>
</div>
<form method="post" action="Permissions.php">
    <section class="content">
      <div class="form-group">
        <label>New Position :</label>
        <input type="text" name="position" class="form-control" id="exampleInputPassword1" placeholder="Enter a New Position" required>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User's Permissions Management</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Permission</th>
                  <th>Create/Add</th>
                  <th>Read/View</th>
                  <th>Update</th>
                  <th>Delete</th>
                  
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Suppliers</td>
                  <td><input name="add_suplliers" type="checkbox" ></td>
                  <td><input name="view_suplliers" type="checkbox" ></td>
                  <td><input name="update_suplliers" type="checkbox" ></td>
                  <td><input name="delete_suplliers" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Brands</td>
                  <td><input name="add_brands" type="checkbox" ></td>
                  <td><input name="view_brands" type="checkbox" ></td>
                  <td><input name="update_brands" type="checkbox" ></td>
                  <td><input name="delete_brands" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Products</td>
                  <td><input name="add_products" type="checkbox" ></td>
                  <td><input name="view_products" type="checkbox" ></td>
                  <td><input name="update_products" type="checkbox" ></td>
                  <td><input name="delete_products" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Attributes</td>
                  <td><input name="add_attributes" type="checkbox"></td>
                  <td><input name="view_attributes" type="checkbox" ></td>
                  <td><input name="update_attributes" type="checkbox" ></td>
                  <td><input name="delete_attributes" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Orders</td>
                  <td><input name="add_orders" type="checkbox" ></td>
                  <td><input name="view_orders" type="checkbox" ></td>
                  <td><input name="update_orders" type="checkbox" ></td>
                  <td><input name="delete_orders" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Permissions</td>
                  <td><input name="add_permissions" type="checkbox" ></td>
                  <td><input name="view_permissions" type="checkbox" ></td>
                  <td><input name="update_permissions" type="checkbox" ></td>
                  <td><input name="delete_permissions" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Users</td>
                  <td><input name="add_users" type="checkbox" ></td>
                  <td><input name="view_users" type="checkbox" ></td>
                  <td><input name="update_users" type="checkbox" ></td>
                  <td><input name="delete_users" type="checkbox" ></td>
                </tr>
                <tr>
                  <td>Calendar</td>
                  <td><input name="add_calendar" type="checkbox"></td>
                  <td><input name="view_calendar" type="checkbox"></td>
                  <td><input name="update_calendar" type="checkbox"></td>
                  <td><input name="delete_calendar" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Mailbox</td>
                  <td><input name="add_mailbox" type="checkbox"></td>
                  <td><input name="view_milbox" type="checkbox"></td>
                  <td><input name="update_mailbox" type="checkbox"></td>
                  <td><input name="delete_mailbox" type="checkbox"></td>
                </tr>
                <tr>
                  <td>Company</td>
                  <td><input name="add_company" type="checkbox"></td>
                  <td><input name="view_company" type="checkbox"></td>
                  <td><input name="update_company" type="checkbox"></td>
                  <td><input name="delete_company" type="checkbox"></td>
                </tr>       
                </tbody>
                <tfoot>
                <tr>
                  <th>Permission</th>
                  <th>Create/Add</th>
                  <th>Read/View</th>
                  <th>Update</th>
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
    <button type="submit" name="add_Permissions" class="btn-success b">Add Permissions</button>
</form>
</div>
<?php 
include('Footer.php');
?>
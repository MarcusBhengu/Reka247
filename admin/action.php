<?php

 function products($product_id,$supplier_id,$brand_id,$product_name,$product_description,$attributes_id,$product_price,$product_main_category,$product_status,$product_arrival_date,$product_quantity,$product_image) {
  if (  $product_quantity== 0) {
    $value2 = "<td><small class=\"label pull-left bg-red\">$product_quantity</small><span class=\"label label-danger\">OUT OF STOCK</span></td>";
  }
  
  elseif ($product_quantity==10 or $product_quantity <10) {
    $value2 = "<td><small class=\"label pull-left bg-orange\">$product_quantity</small><span class=\"label label-warning\">Only $product_quantity left in Stock </span></td>
              
    ";
  }else {
  $value2 = "<td><small class=\"label pull-left bg-green\">$product_quantity</small><span class=\"label label-success\">In Stock</span></td>
  ";
  }
  
  if ($product_status=='Inactive') {
      $value = "<td><small class=\"label pull-right bg-light-blue\">Inactive</small></td>";
  }else {
        $value = "<td><small class=\"label pull-right bg-green\">Active</small></td>";
  }
    
  $element = "
 	
 	<tr>
        <td><img src=\"img/$product_image\" width=\"70px\" height=\"70px\"></td>
        <td>$supplier_id</td>
        <td>$brand_id</td>
        <td>$product_name</td>
        <td>$product_price.00</td>
        <td>$product_main_category</td>
        $value
        <td>$product_arrival_date</td>
        $value2
        <td>
        <div class=\"row\">
        <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$product_id\">
            edit
        </button>
        </td>
        <td>
        <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$product_id\">
            Remove
        </button> 
        </div>
        </td>      
    </tr>
    
      <div class=\"modal modal fade\" id=\"modaledit$product_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Edit $product_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <div class=\"box-header with-border\">
                  <h3 class=\"box-title\">Product's Details</Details></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Products.php\" method=\"post\">
                <div class=\"box-body\">
                  <div class=\"form-group\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Product Name</label>
                                <input type=\"text\" name=\"name\"class=\"form-control\" value=\"$product_name\" id=\"exampleInputText\" placeholder=\"Enter Product Name\" required>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Product Description</label>
                                <input type=\"text\" name=\"description\"class=\"form-control\" value=\"$product_description\" id=\"exampleInputText\" placeholder=\"Enter Product Description Name\" required>
                            </div>
                            <label>Price</label>
                            <div class=\"input-group\">
                              <span class=\"input-group-addon\">R</span>
                              <input type=\"text\" name=\"price\" value=\"$product_price\" class=\"form-control\">
                              <span class=\"input-group-addon\">.00</span>
                            </div>
                            <br>
                            <div class=\"form-group\">
                                <label>Status</label>
                                <select class=\"form-control select2\" name=\"status\" style=\"width: 100%;\" required>
                                <option>Active</option>
                                <option>Inactive</option>
                                </select>
                            </div>
                            
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Quantity</label>
                                <input type=\"number\" name=\"quantity\" value=\"$product_quantity\" class=\"form-control\" id=\"exampleInputNumber\" placeholder=\"Enter Quantity here\" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->  
                </div>
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"edit_Product\": class=\"btn-success b\">Edit Product</button>
                <input type=\"hidden\" name=\"id\" value=\"$product_id\">
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <div class=\"modal-warning modal fade\" id=\"modaldelete$product_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Confirm To Delete $product_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Products.php\" method=\"post\">

                <input type=\"hidden\" name=\"id\" value=\"$product_id\">
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"delete_Product\": class=\"btn-success b\">Confirm</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
 	";
echo $element;
}

function suppliers($supplier_id,$supplier_name,$supplier_company_name,$supplier_phone,$supplier_status,$supplier_mail,$supplier_password) {
    if ($supplier_status=='Inactive') {
       $value = "<td><small class=\"label pull-right bg-light-blue\">Inactive</small></td>";
    }else {
       $value = "<td><small class=\"label pull-right bg-green\">Active</small></td>";
    }
   
   $element = "
    
    <tr>
       <td>Image</td>
       <td>$supplier_name</td>
       <td>$supplier_company_name</td>
       <td>$supplier_phone</td>
       $value
       <td>$supplier_mail</td>
    
       <td>
       <div class=\"row\">
       <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$supplier_id\">
           edit
       </button>
       </td>
       <td>
       <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$supplier_id\">
           Remove
       </button> 
       </div>
       </td>      
   </tr>
   
     <div class=\"modal modal fade\" id=\"modaledit$supplier_id\">
       <div class=\"modal-dialog\">
         <div class=\"modal-content\">
         <div class=\"modal-header\">
           <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
             <span aria-hidden=\"true\">&times;</span></button>
             <h4 class=\"modal-title\">Edit $supplier_name</h4>
         </div>
         <div class=\"modal-body\">
            <div class=\"box box-primary\">
               <div class=\"box-header with-border\">
                 <h3 class=\"box-title\">Supplier's Details</Details></h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role=\"form\" action=\"Suppliers.php\" method=\"post\">
               <div class=\"box-body\">
                 <div class=\"form-group\">
                           <div class=\"form-group\">
                               <label for=\"exampleInputPassword1\">Supplier Name</label>
                               <input type=\"text\" name=\"name\"class=\"form-control\" value=\"$supplier_name\" id=\"exampleInputText\" placeholder=\"Enter Supplier's Name & Surname\" required>
                           </div>
                           <div class=\"form-group\">
                               <label for=\"exampleInputPassword1\">Company Name</label>
                               <input type=\"text\" name=\"company_name\"class=\"form-control\" value=\"$supplier_company_name\" id=\"exampleInputText\" placeholder=\"Enter Suppliers Company Name\" required>
                           </div>
                           <div class=\"form-group\">
                                <label>SA phone no.:</label>

                                <div class=\"input-group\">
                                <div class=\"input-group-addon\">
                                    <i class=\"fa fa-phone\"></i>
                                </div>
                                <input type=\"text\" name=\"phone\" class=\"form-control\" data-inputmask='\"mask\": \"(+27) 99 999-9999\"' data-mask value=\"$supplier_phone\" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                           <br>
                           <div class=\"form-group\">
                               <label>Status</label>
                               <select class=\"form-control select2\" name=\"status\" style=\"width: 100%;\" required>
                               <option selected=\"selected\">Inactive</option>
                               <option>Active</option>
                               </select>
                           </div>
                           <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Email address</label>
                                <input type=\"email\" name=\"mail\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Enter email\"  value=\"$supplier_mail\"required>
                            </div>
                       </div>
                   </div>
                   <!-- /.box-body -->  
               </div>
               <div class=\"modal-footer\">
               <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
               <button type=\"submit\" name=\"edit_Supplier\": class=\"btn-success b\">Edit Product</button>
               <input type=\"hidden\" name=\"id\" value=\"$supplier_id\">
               </form>
           </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
     </div>
     <div class=\"modal-warning modal fade\" id=\"modaldelete$supplier_id\">
       <div class=\"modal-dialog\">
         <div class=\"modal-content\">
         <div class=\"modal-header\">
           <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
             <span aria-hidden=\"true\">&times;</span></button>
             <h4 class=\"modal-title\">Confirm To Delete $supplier_name</h4>
         </div>
         <div class=\"modal-body\">
            <div class=\"box box-primary\">
               <!-- /.box-header -->
               <!-- form start -->
               <form role=\"form\" action=\"Suppliers.php\" method=\"post\">

               <input type=\"hidden\" name=\"id\" value=\"$supplier_id\">
               <div class=\"modal-footer\">
               <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
               <button type=\"submit\" name=\"delete_Supplier\": class=\"btn-success b\">Confirm</button>
               </form>
           </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
     </div>
    ";
echo $element;
}

function brands($brand_id,$brand_supplier,$brand_name) {
   $element = "
    <tr>
       <td>Log here</td>
       <td>$brand_supplier</td>
       <td>$brand_name</td>
       <td>
       <div class=\"row\">
       <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$brand_id\">
           edit
       </button>
       </td>
       <td>
       <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$brand_id\">
           Remove
       </button> 
       </div>
       </td>      
   </tr>
   
     <div class=\"modal modal fade\" id=\"modaledit$brand_id\">
       <div class=\"modal-dialog\">
         <div class=\"modal-content\">
         <div class=\"modal-header\">
           <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
             <span aria-hidden=\"true\">&times;</span></button>
             <h4 class=\"modal-title\">Edit $brand_name</h4>
         </div>
         <div class=\"modal-body\">
            <div class=\"box box-primary\">
               <div class=\"box-header with-border\">
                 <h3 class=\"box-title\">Product's Details</Details></h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role=\"form\" action=\"Brands.php\" method=\"post\">
               <div class=\"box-body\">
                 <div class=\"form-group\">
                           <div class=\"form-group\">
                               <label for=\"exampleInputPassword1\">Brand Supplier</label>
                               <input type=\"text\" name=\"brand_supplier\"class=\"form-control\" value=\"$brand_supplier\" id=\"exampleInputText\" placeholder=\"Enter Brand Supplier\" required>
                           </div>
                           <div class=\"form-group\">
                               <label for=\"exampleInputPassword1\">Brand Name</label>
                               <input type=\"text\" name=\"brand_name\"class=\"form-control\" value=\"$brand_name\" id=\"exampleInputText\" placeholder=\"Enter Brand Name\" required>
                           </div>
                       </div>
                   </div>
                   <!-- /.box-body -->  
               </div>
               <div class=\"modal-footer\">
               <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
               <button type=\"submit\" name=\"edit_Brand\": class=\"btn-success b\">Edit Brand</button>
               <input type=\"hidden\" name=\"id\" value=\"$brand_id\">
               </form>
           </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
     </div>
     <div class=\"modal-warning modal fade\" id=\"modaldelete$brand_id\">
       <div class=\"modal-dialog\">
         <div class=\"modal-content\">
         <div class=\"modal-header\">
           <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
             <span aria-hidden=\"true\">&times;</span></button>
             <h4 class=\"modal-title\">Confirm To Delete $brand_name</h4>
         </div>
         <div class=\"modal-body\">
            <div class=\"box box-primary\">
               <!-- /.box-header -->
               <!-- form start -->
               <form role=\"form\" action=\"Brands.php\" method=\"post\">

               <input type=\"hidden\" name=\"id\" value=\"$brand_id\">
               <div class=\"modal-footer\">
               <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
               <button type=\"submit\" name=\"delete_Brand\": class=\"btn-success b\">Confirm</button>
               </form>
           </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
     </div>
    ";
echo $element;
}

function sub_category($sub_category_id,$category_name,$sub_category_name) {
    $element = "
     <tr>
        <td>$category_name</td>
        <td>$sub_category_name</td>
        <td>
        <div class=\"row\">
        <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$sub_category_id\">
            edit
        </button>
        </td>
        <td>
        <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$sub_category_id\">
            Remove
        </button> 
        </div>
        </td>      
    </tr>
    
      <div class=\"modal modal fade\" id=\"modaledit$sub_category_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Edit $sub_category_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <div class=\"box-header with-border\">
                  <h3 class=\"box-title\">Sub Category's Details</Details></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Categories.php\" method=\"post\">
                <div class=\"box-body\">
                  <div class=\"form-group\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Main Category</label>
                                <input type=\"text\" name=\"category_name\"class=\"form-control\" value=\"$category_name\" id=\"exampleInputText\" placeholder=\"Enter Category Name\" required>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Sub Category Name</label>
                                <input type=\"text\" name=\"sub_category_name\"class=\"form-control\" value=\"$sub_category_name\" id=\"exampleInputText\" placeholder=\"Enter Sub Category Name\" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->  
                </div>
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"edit_Sub_Category\": class=\"btn-success b\">Edit Brand</button>
                <input type=\"hidden\" name=\"id\" value=\"$sub_category_id\">
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <div class=\"modal-warning modal fade\" id=\"modaldelete$sub_category_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Confirm To Delete $sub_category_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Categories.php\" method=\"post\">
 
                <input type=\"hidden\" name=\"id\" value=\"$sub_category_id\">
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"delete_Sub_Category\": class=\"btn-success b\">Confirm</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
     ";
 echo $element;
}

function sub_attribute($sub_attribute_id,$attribute_name,$sub_attribute_name) {
    $element = "
     <tr>
        <td>$attribute_name</td>
        <td>$sub_attribute_name</td>
        <td>
        <div class=\"row\">
        <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$sub_attribute_id\">
            edit
        </button>
        </td>
        <td>
        <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$sub_attribute_id\">
            Remove
        </button> 
        </div>
        </td>      
    </tr>
    
      <div class=\"modal modal fade\" id=\"modaledit$sub_attribute_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Edit $sub_attribute_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <div class=\"box-header with-border\">
                  <h3 class=\"box-title\">Sub Attribute's Details</Details></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Attributes.php\" method=\"post\">
                <div class=\"box-body\">
                  <div class=\"form-group\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Main Attribute</label>
                                <input type=\"text\" name=\"attribute_name\"class=\"form-control\" value=\"$attribute_name\" id=\"exampleInputText\" placeholder=\"Enter Attribute Name\" required>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Sub Attribute Name</label>
                                <input type=\"text\" name=\"sub_attribute_name\"class=\"form-control\" value=\"$sub_attribute_name\" id=\"exampleInputText\" placeholder=\"Enter Sub Attribute Name\" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->  
                </div>
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"edit_Sub_Attribute\": class=\"btn-success b\">Edit Attribute</button>
                <input type=\"hidden\" name=\"id\" value=\"$sub_attribute_id\">
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <div class=\"modal-warning modal fade\" id=\"modaldelete$sub_attribute_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Confirm To Delete $sub_attribute_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Attributes.php\" method=\"post\">
 
                <input type=\"hidden\" name=\"id\" value=\"$sub_attribute_id\">
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"delete_Sub_Attribute\": class=\"btn-success b\">Confirm</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
     ";
 echo $element;
}

function customers($customer_id,$customer_name,$customer_address,$customer_phone,$customer_status,$customer_mail,$customer_password) {
    if ($customer_status=='Offline') {
        $value = "<td><small class=\"label pull-right bg-light-blue\">Inactive</small></td>";
     }else {
        $value = "<td><small class=\"label pull-right bg-green\">Active</small></td>";
     }
   
   $element = "
    
    <tr>
       
       <td>$customer_name</td>
       <td>$customer_address</td>
       <td>$customer_phone</td>
       $value
       <td>$customer_mail</td>
    
       <td>
       <div class=\"row\">
       <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$customer_id\">
           edit
       </button>
       </td>
       <td>
       <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$customer_id\">
           Remove
       </button> 
       </div>
       </td>      
   </tr>
   
     <div class=\"modal modal fade\" id=\"modaledit$customer_id\">
       <div class=\"modal-dialog\">
         <div class=\"modal-content\">
         <div class=\"modal-header\">
           <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
             <span aria-hidden=\"true\">&times;</span></button>
             <h4 class=\"modal-title\">Edit $customer_name</h4>
         </div>
         <div class=\"modal-body\">
            <div class=\"box box-primary\">
               <div class=\"box-header with-border\">
                 <h3 class=\"box-title\">Customer's Details</Details></h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role=\"form\" action=\"Customers.php\" method=\"post\">
               <div class=\"box-body\">
                 <div class=\"form-group\">
                           <div class=\"form-group\">
                               <label for=\"exampleInputPassword1\">Customer Name</label>
                               <input type=\"text\" name=\"name\"class=\"form-control\" value=\"$customer_name\" id=\"exampleInputText\" placeholder=\"Enter Customer Name & Surname\" required>
                           </div>
                           <div class=\"form-group\">
                               <label for=\"exampleInputPassword1\">Customer Address</label>
                               <input type=\"text\" name=\"address\"class=\"form-control\" value=\"$customer_address\" id=\"exampleInputText\" placeholder=\"Enter Customer address\" required>
                           </div>
                           <div class=\"form-group\">
                                <label>SA phone no.:</label>

                                <div class=\"input-group\">
                                <div class=\"input-group-addon\">
                                    <i class=\"fa fa-phone\"></i>
                                </div>
                                <input type=\"text\" name=\"phone\" class=\"form-control\" data-inputmask='\"mask\": \"(+27) 99 999-9999\"' data-mask value=\"$customer_phone\" required>
                                </div>
                                <!-- /.input group -->
                            </div>
                           <br>
                           <div class=\"form-group\">
                               <label>Status</label>
                               <select class=\"form-control select2\" name=\"status\" style=\"width: 100%;\" required>
                               <option selected=\"selected\">Offline</option>
                               <option>Online</option>
                               </select>
                           </div>
                           <div class=\"form-group\">
                                <label for=\"exampleInputEmail1\">Email address</label>
                                <input type=\"email\" name=\"mail\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Enter email\"  value=\"$customer_mail\"required>
                            </div>
                       </div>
                   </div>
                   <!-- /.box-body -->  
               </div>
               <div class=\"modal-footer\">
               <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
               <button type=\"submit\" name=\"edit_Customer\": class=\"btn-success b\">Edit Product</button>
               <input type=\"hidden\" name=\"id\" value=\"$customer_id\">
               </form>
           </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
     </div>
     <div class=\"modal-warning modal fade\" id=\"modaldelete$customer_id\">
       <div class=\"modal-dialog\">
         <div class=\"modal-content\">
         <div class=\"modal-header\">
           <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
             <span aria-hidden=\"true\">&times;</span></button>
             <h4 class=\"modal-title\">Confirm To Delete $customer_name</h4>
         </div>
         <div class=\"modal-body\">
            <div class=\"box box-primary\">
               <!-- /.box-header -->
               <!-- form start -->
               <form role=\"form\" action=\"Customers.php\" method=\"post\">

               <input type=\"hidden\" name=\"id\" value=\"$customer_id\">
               <div class=\"modal-footer\">
               <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
               <button type=\"submit\" name=\"delete_Customer\": class=\"btn-success b\">Confirm</button>
               </form>
           </div>
           </div>
           <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
       </div>
     </div>
    ";
echo $element;
}

function users($supplier_id,$supplier_name,$supplier_company_name,$supplier_phone,$supplier_status,$supplier_mail,$supplier_password,$image) {
  if ($supplier_status=='Offline') {
     $value = "<td><small class=\"label pull-right bg-light-blue\">Offline</small></td>";
  }else {
     $value = "<td><small class=\"label pull-right bg-green\">Online</small></td>";
  }
 
 $element = "
  
  <tr>
     <td><img src=\"img/$image\" width=\"70px\" height=\"70px\"></td>
     <td>$supplier_name</td>
     <td>$supplier_company_name</td>
     <td>$supplier_phone</td>
     $value
     <td>$supplier_mail</td>
  
     <td>
     <div class=\"row\">
     <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$supplier_id\">
         edit
     </button>
     </td>
     <td>
     <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$supplier_id\">
         Remove
     </button> 
     </div>
     </td>      
 </tr>
 
   <div class=\"modal modal fade\" id=\"modaledit$supplier_id\">
     <div class=\"modal-dialog\">
       <div class=\"modal-content\">
       <div class=\"modal-header\">
         <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
           <span aria-hidden=\"true\">&times;</span></button>
           <h4 class=\"modal-title\">Edit $supplier_name</h4>
       </div>
       <div class=\"modal-body\">
          <div class=\"box box-primary\">
             <div class=\"box-header with-border\">
               <h3 class=\"box-title\">User's Details</Details></h3>
             </div>
             <!-- /.box-header -->
             <!-- form start -->
             <form role=\"form\" action=\"User.php\" method=\"post\">
             <div class=\"box-body\">
               <div class=\"form-group\">
                         <div class=\"form-group\">
                             <label for=\"exampleInputPassword1\">Users Name</label>
                             <input type=\"text\" name=\"name\"class=\"form-control\" value=\"$supplier_name\" id=\"exampleInputText\" placeholder=\"Enter Supplier's Name & Surname\" required>
                         </div>
                         <div class=\"form-group\">
                             <label for=\"exampleInputPassword1\">Position</label>
                             <input type=\"text\" name=\"position\"class=\"form-control\" value=\"$supplier_company_name\" id=\"exampleInputText\" placeholder=\"Enter Suppliers Company Name\" required>
                         </div>
                         <div class=\"form-group\">
                              <label>SA phone no.:</label>

                              <div class=\"input-group\">
                              <div class=\"input-group-addon\">
                                  <i class=\"fa fa-phone\"></i>
                              </div>
                              <input type=\"text\" name=\"phone\" class=\"form-control\" data-inputmask='\"mask\": \"(+27) 99 999-9999\"' data-mask value=\"$supplier_phone\" required>
                              </div>
                              <!-- /.input group -->
                          </div>
                         <br>
                         <div class=\"form-group\">
                             <label>Status</label>
                             <select class=\"form-control select2\" name=\"status\" style=\"width: 100%;\" required>
                             <option selected=\"selected\">Offline</option>
                             <option>Online</option>
                             </select>
                         </div>
                         <div class=\"form-group\">
                              <label for=\"exampleInputEmail1\">Email address</label>
                              <input type=\"email\" name=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Enter email\"  value=\"$supplier_mail\"required>
                          </div>
                     </div>
                 </div>
                 <!-- /.box-body -->  
             </div>
             <div class=\"modal-footer\">
             <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
             <button type=\"submit\" name=\"edit_Supplier\": class=\"btn-success b\">Edit Product</button>
             <input type=\"hidden\" name=\"id\" value=\"$supplier_id\">
             </form>
         </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
   </div>
   <div class=\"modal-warning modal fade\" id=\"modaldelete$supplier_id\">
     <div class=\"modal-dialog\">
       <div class=\"modal-content\">
       <div class=\"modal-header\">
         <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
           <span aria-hidden=\"true\">&times;</span></button>
           <h4 class=\"modal-title\">Confirm To Delete $supplier_name</h4>
       </div>
       <div class=\"modal-body\">
          <div class=\"box box-primary\">
             <!-- /.box-header -->
             <!-- form start -->
             <form role=\"form\" action=\"User.php\" method=\"post\">

             <input type=\"hidden\" name=\"id\" value=\"$supplier_id\">
             <div class=\"modal-footer\">
             <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
             <button type=\"submit\" name=\"delete_Supplier\": class=\"btn-success b\">Confirm</button>
             </form>
         </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
   </div>
  ";
echo $element;
}

function company($supplier_id,$supplier_name,$supplier_company_name,$supplier_phone,$supplier_status,$supplier_mail) {

 $element = "
  
  <tr>
     <td>Image</td>
     <td>$supplier_name</td>
     <td>$supplier_company_name</td>
     <td>$supplier_phone</td>
     <td>$supplier_status</td>
     <td>$supplier_mail</td>
  
     <td>
     <div class=\"row\">
     <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$supplier_id\">
         edit
     </button>
     </td>
     <td>
     <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$supplier_id\">
         Remove
     </button> 
     </div>
     </td>      
 </tr>
 
   <div class=\"modal modal fade\" id=\"modaledit$supplier_id\">
     <div class=\"modal-dialog\">
       <div class=\"modal-content\">
       <div class=\"modal-header\">
         <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
           <span aria-hidden=\"true\">&times;</span></button>
           <h4 class=\"modal-title\">Edit $supplier_name</h4>
       </div>
       <div class=\"modal-body\">
          <div class=\"box box-primary\">
             <div class=\"box-header with-border\">
               <h3 class=\"box-title\">Company's Details</Details></h3>
             </div>
             <!-- /.box-header -->
             <!-- form start -->
             <form role=\"form\" action=\"Company_Details.php\" method=\"post\">
             <div class=\"box-body\">
               <div class=\"form-group\">
                         <div class=\"form-group\">
                             <label for=\"exampleInputPassword1\">Company Name</label>
                             <input type=\"text\" name=\"name\"class=\"form-control\" value=\"$supplier_name\" id=\"exampleInputText\" placeholder=\"Enter Company's Full Name\" required>
                         </div>
                         <div class=\"form-group\">
                             <label for=\"exampleInputPassword1\">Company Name</label>
                             <input type=\"text\" name=\"address\"class=\"form-control\" value=\"$supplier_company_name\" id=\"exampleInputText\" placeholder=\"Enter Company Address\" required>
                         </div>
                         <div class=\"form-group\">
                              <label>SA phone no.:</label>

                              <div class=\"input-group\">
                              <div class=\"input-group-addon\">
                                  <i class=\"fa fa-phone\"></i>
                              </div>
                              <input type=\"text\" name=\"phone\" class=\"form-control\" data-inputmask='\"mask\": \"(+27) 99 999-9999\"' data-mask value=\"$supplier_phone\" required>
                              </div>
                              <!-- /.input group -->
                          </div>
                         <br>
                         <div class=\"form-group\">
                                <label>Vat(%) :</label>
                                <input type=\"text\" name=\"vat\" style=\"width: 100%;\" value=\"15\">
                            </div>
                         <div class=\"form-group\">
                              <label for=\"exampleInputEmail1\">Email address :</label>
                              <input type=\"email\" name=\"mail\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Enter email\"  value=\"$supplier_mail\"required>
                          </div>
                     </div>
                 </div>
                 <!-- /.box-body -->  
             </div>
             <div class=\"modal-footer\">
             <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
             <button type=\"submit\" name=\"edit_Company\": class=\"btn-success b\">Edit Company</button>
             <input type=\"hidden\" name=\"id\" value=\"$supplier_id\">
             </form>
         </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
   </div>
   <div class=\"modal-warning modal fade\" id=\"modaldelete$supplier_id\">
     <div class=\"modal-dialog\">
       <div class=\"modal-content\">
       <div class=\"modal-header\">
         <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
           <span aria-hidden=\"true\">&times;</span></button>
           <h4 class=\"modal-title\">Confirm To Delete $supplier_name</h4>
       </div>
       <div class=\"modal-body\">
          <div class=\"box box-primary\">
             <!-- /.box-header -->
             <!-- form start -->
             <form role=\"form\" action=\"Company_Details.php\" method=\"post\">

             <input type=\"hidden\" name=\"id\" value=\"$supplier_id\">
             <div class=\"modal-footer\">
             <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
             <button type=\"submit\" name=\"delete_Company\": class=\"btn-success b\">Confirm</button>
             </form>
         </div>
         </div>
         <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
     </div>
   </div>
  ";
echo $element;
}

function orders($order_id,$customer_id,$customer_name,$product_id,$product_name,$product_price,$order_status,$order_arrival_date,$product_quantity) {
 
  
  if ($order_status=='New') {
    $value = "<td><small class=\"label pull-right bg-blue\">NEW</small></td>";
}elseif ($order_status=='Processed') {
  $value = "<td><small class=\"label pull-right bg-yellow\">Processed</small></td>";
}
else{
  $value = "<td><small class=\"label pull-right bg-green\">Delivered</small></td>";    
}
    
  $element = "
 	
 	<tr>
        
        <td>$order_id</td>
        <td>$customer_name</td>
        <td>$product_name</td>
        <td>R $product_price.00</td>
        $value
        <td>$order_arrival_date</td>
        <td>$product_quantity</td>
        
        <td>
        <div class=\"row\">
        <button type=\"button\" class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modaledit$order_id\">
            edit
        </button>
        </td>
        <td>
        <button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modaldelete$order_id\">
            Remove
        </button> 
        </div>
        </td>      
    </tr>
    
      <div class=\"modal modal fade\" id=\"modaledit$order_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Edit $product_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <div class=\"box-header with-border\">
                  <h3 class=\"box-title\">Order's Details</Details></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Add_Orders.php\" method=\"post\">
                <div class=\"box-body\">
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Order No.</label>
                                <input type=\"text\" name=\"order_id\"class=\"form-control\" value=\"$order_id\" id=\"exampleInputText\"  disabled>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Product Name</label>
                                <input type=\"text\" name=\"name\"class=\"form-control\" value=\"$product_name\" id=\"exampleInputText\" placeholder=\"Enter Product Name\" required disabled>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Customer Name</label>
                                <input type=\"text\" name=\"description\"class=\"form-control\" value=\"$customer_name\" id=\"exampleInputText\" placeholder=\"Enter Customer Name\" required disabled>
                            </div>
                            <label>Price</label>
                            <div class=\"input-group\">
                              <span class=\"input-group-addon\">R</span>
                              <input type=\"text\" name=\"price\" value=\"$product_price\" class=\"form-control\" disabled>
                              <span class=\"input-group-addon\">.00</span>
                            </div>
                            <br>
                            <div class=\"form-group\">
                                <label>Status</label>
                                <select class=\"form-control select2\" name=\"status\" style=\"width: 100%;\" required>
                                <option>Delivered</option>
                                <option>Processed</option>
                                <option>New</option>
                                </select>
                            </div>
                            
                            <div class=\"form-group\">
                                <label for=\"exampleInputPassword1\">Quantity</label>
                                <input type=\"number\" name=\"quantity\" value=\"$product_quantity\" class=\"form-control\" id=\"exampleInputNumber\" placeholder=\"Enter Quantity here\" required>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->  
                </div>
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-danger pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"update_Order\": class=\"btn-success b\">Edit Order</button>
                <input type=\"hidden\" name=\"id\" value=\"$order_id\">
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
      <div class=\"modal-warning modal fade\" id=\"modaldelete$order_id\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
          <div class=\"modal-header\">
            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\">Confirm To Delete $product_name</h4>
          </div>
          <div class=\"modal-body\">
             <div class=\"box box-primary\">
                <!-- /.box-header -->
                <!-- form start -->
                <form role=\"form\" action=\"Products.php\" method=\"post\">

                <input type=\"hidden\" name=\"id\" value=\"$order_id\">
                <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn-warning pull-left\" data-dismiss=\"modal\">Cancel</button>
                <button type=\"submit\" name=\"delete_Product\": class=\"btn-success b\">Confirm</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
 	";
echo $element;
}
function process_orders($order_id,$customer_id,$customer_name,$product_id,$product_name,$product_price,$order_status,$order_arrival_date,$product_quantity) {
 
  
  if ($order_status=='New') {
      $value = "<td><small class=\"label pull-right bg-blue\">NEW</small></td>";
  }elseif ($order_status=='Processed') {
    $value = "<td><small class=\"label pull-right bg-yellow\">Processed</small></td>";
  }
  else{
    $value = "<td><small class=\"label pull-right bg-red\">Delivered</small></td>";    
  }
    
  $element = "
 	
 	<tr>
        
        <td>$order_id</td>
        <td>$customer_name</td>
        <td>$product_name</td>
        <td>R $product_price.00</td>
        $value
        <td>$order_arrival_date</td>
        <td>$product_quantity</td>
        
        <td>
        <div class=\"row\">
        <form method=\"post\" action=\"Process_Orders.php\">
        <input type=\"hidden\" name=\"id\" value=\"$order_id\">
        <button type=\"submit\"  name=\"add\"class=\"btn btn-success\" >
            Add to Supplier
        </button>
        </form>
        </td>
        <td>
         
        </div>
        </td>      
    </tr>
    
      
 	";
echo $element;
}
<?php
use App\Models\Product;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
   $product=new Product();
   //lấy từ form
   $product->name = $_POST['name'];
   $product->slug = (strlen($_POST['slug'])>0) ? $_POST['slug'] : MyClass :: str_slug($_POST['name']);
   $product->description = $_POST['description'];
   $product->status = $_POST['status'];
   //xử lí upload file hình ảnh
   if(strlen($_FILES['image']['name'])>0){
      $target_dir = "../public/images/product/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if(in_array($extension,['jpg','jpeg','png'.'gif','webp'])){
         $filename= $product->slug . '.' . $extension;
         move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
         $product->image = $filename;
      }
   }
   //tự sinh ra
   $product->created_at = date('Y-m-d H:i:s');
   $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
   var_dump($product);
   //lưu vào CSDL
   //INSERT INTO ...
   $product->save();
  //chuyển hướng về index
   header("location:index.php?option=product");
}

if(isset($_POST['CAPNHAT'])){

   $id= $_POST['id'];
   $product=product::find($id);
   if($product==NULL)
 {
    header("location:index.php?option=product");
 }
   //lấy từ form
   $product->name = $_POST['name'];
   $product->slug = (strlen($_POST['slug'])>0) ? $_POST['slug'] : MyClass :: str_slug($_POST['name']);
   $product->description = $_POST['description'];
   $product->status = $_POST['status'];
   //xử lí upload file hình ảnh
   if(strlen($_FILES['image']['name'])>0){
      //xóa hình cũ


      //thêm hình mới
      $target_dir = "../public/images/product/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if(in_array($extension,['jpg','jpeg','png'.'gif','webp'])){
         $filename= $product->slug . '.' . $extension;
         move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
         $product->image = $filename;
      }
   }
   //tự sinh ra
   $product->updated_at = date('Y-m-d H:i:s');
   $product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
   var_dump($product);
   //lưu vào CSDL
   //INSERT INTO ...
   $product->save();
  //chuyển hướng về index
   header("location:index.php?option=product");
}
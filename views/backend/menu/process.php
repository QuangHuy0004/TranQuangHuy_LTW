<?php
use App\Models\Menu;
use App\Libraries\MyClass;

if(isset($_POST['CAPNHAT'])){

   $id= $_POST['id'];
   $menu=Menu::find($id);
   if($menu==NULL)
 {
    header("location:index.php?option=menu");
 }
   //lấy từ form
   $menu->name = $_POST['name'];
   $menu->phone = $_POST['phone'];
   $menu->email = $_POST['email'];
   $menu->title = $_POST['title'];
   $menu->status = $_POST['status'];
   //xử lí upload file hình ảnh
   //tự sinh ra
   $menu->updated_at = date('Y-m-d H:i:s');
   $menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
   var_dump($menu);
   //lưu vào CSDL
   //INSERT INTO ...
   $menu->save();
  //chuyển hướng về index
   header("location:index.php?option=menu");
}
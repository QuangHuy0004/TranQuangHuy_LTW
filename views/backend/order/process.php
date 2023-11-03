<?php
use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $order = Order::find($id);
   if ($order == NULL) {
      header("location:index.php?option=order");
   }
   //lấy từ form
   $order->name = $_POST['name'];
   $order->phone = $_POST['phone'];
   $order->email = $_POST['email'];
   $order->title = $_POST['title'];
   $order->status = $_POST['status'];
   //xử lí upload file hình ảnh
   //tự sinh ra
   $order->updated_at = date('Y-m-d H:i:s');
   $order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
   var_dump($order);
   //lưu vào CSDL
   //INSERT INTO ...
   $order->save();
   //chuyển hướng về index
   MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
   header("location:index.php?option=order");
}
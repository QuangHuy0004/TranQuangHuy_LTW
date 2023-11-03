<?php
use App\Models\Product;

$id= $_REQUEST['id'];
 $product= Product::find($id);

 if($product==NULL)
 {
    header("location:index.php?option=product");
 }

?>



<?php require_once '../views/backend/header.php' ;?>

      <!-- CONTENT -->
    <form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật sản phẩm</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                     <a class="btn btn-sm btn-info "
                        href="index.php?option=product">Tất cả</a>
                        <a class="btn btn-sm btn-warning "
                         href="index.php?option=product&cat=trash">
                         Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=product" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                     </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                           <input type="text" name="id" value="<?=$product->id;?>" /><br>
                           <label>Tên sản phẩm (*)</label>
                           <input type="text" value="<?=$product->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Tên danh mục</label>
                           <input type="text" value="<?=$product->slug;?>" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Tên thương hiệu</label>
                           <textarea name="description" class="form-control"><?=$product->description;?></textarea>
                        </div>
                        <div class="mb-3">
                           <label>Hình ảnh</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
    </form>
      <!-- END CONTENT-->

<?php require_once '../views/backend/footer.php' ;?>


  
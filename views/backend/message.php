<?php
use App\Libraries\MyClass;

?>
<?php if (MyClass::has_flash('message')): ?>
    <?php $arr = MyClass::get_flash('message'); ?>
    <div class="alert alert-<?= $arr['type']; ?> alert-dismissible fade show" role="alert">
        <strong>Thông báo!</strong>
        <?= $arr['msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif; ?>
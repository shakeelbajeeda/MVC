<?php
$title = "Add Company";
$action = "/companies/save";
$btn_txt = "Add";
$id_input = '';
$old_file_name = '';
if (isset($data['company'])) {
    $action = "/companies/update";
    $btn_txt = "Update";
    $title = $btn_txt . " Company";
    $id_input = '<input type="hidden" name="id" value="' . $data['company'][0] . '" >';
    $old_file_name = '<input type="hidden" name="old_image" value="' . $data['company'][3] . '" >';
}
require_once 'header.php';
?>
<h1 class="text-center mt-3"><?= $btn_txt ?> Company</h1>
<div class="container">
    <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?= $id_input ?>
            <?= $old_file_name ?>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?= $data['company'][1] ?>" name="cname" placeholder="Enter Company Name">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?= $data['company'][2] ?>" name="ceo" placeholder="Enter CEO Name">
            </div>
            <div class="col-md-4">
                <input type="file" class="form-control" value="<?= $data['company'][3] ?>" name="image">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-3 mt-2 float-end"><i class="fa fa-plus"></i> <?= $btn_txt ?></button>
            </div>
        </div>
    </form>
</div>
<?php require_once 'footer.php'; ?>
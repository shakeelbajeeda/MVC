<?php
$title = "Add Employee";
$action = "/employees/save";
$btn_txt = "Add";
$id_input = '';
if (isset($data['employees'])) {
    $action = "/employees/update";
    $btn_txt = "Update";
    $id_input = '<input type="hidden" name="id" value="' . $data['employees'][0] . '" >';
    $title = $btn_txt . " Employee";
}
require_once 'header.php';
?>
<h1 class="text-center mt-3"><?= $btn_txt ?> Employee</h1>
<div class="container">
    <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?= $id_input ?>
            <div class="col-md-4">
                <input type="text" class="form-control" value="<?= $data['employees'][1] ?>" name="name" placeholder="Enter Employee Name">
            </div>
            <div class="col-md-4">
                <input type="email" class="form-control" value="<?= $data['employees'][2] ?>" name="email" placeholder="Enter Email">
            </div>
            <div class="col-md-4">
                <select class="form-control" name="company">
                    <option>Select Company</option>
                    <?php foreach ($data['companies'] as $company) { ?>
                        <?php if ($company->id == $data['employees'][3]) { ?>
                            <option value="<?= $company->id ?> " selected><?= $company->name ?></option>
                        <?php } else { ?>

                            <option value="<?= $company->id ?>"><?= $company->name ?></option>
                    <?php  }
                    } ?>
                </select>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary px-3 mt-2 float-end"><i class="fa fa-plus"></i> <?= $btn_txt ?></button>
            </div>
        </div>
    </form>
</div>
<?php require_once 'footer.php'; ?>
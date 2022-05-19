<?php
$title = "View All Companies";
require_once('header.php');
?>
<div class="text-center">
    <h1 class="mt-3"><?= $title ?></h1>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">CEO</th>
                <th scope="col">Company Logo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['companies'] as $company) { ?>
                <tr>
                    <th scope="row"><?= $company->id ?></th>
                    <td><?= $company->name ?></td>
                    <td><?= $company->ceo ?></td>
                    <td><img src="<?= base_url_image . '/logos/' . $company->logo ?>" width="40%" height="50"></td>
                    <td><a href="/companies/edit?id=<?= $company->id ?>" class="btn btn-info me-2">Edit</a><a href="/companies/delete?id=<?= $company->id ?>" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
<?php require_once 'footer.php'  ?>
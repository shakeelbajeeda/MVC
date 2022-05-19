<?php
$title = "View All Employees";
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
                <th scope="col">Employee Name</th>
                <th scope="col">Email</th>
                <th scope="col">Company</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['employees'] as $employee) { ?>
                <tr>
                    <th scope="row"><?= $employee->id ?></th>
                    <td><?= $employee->name ?></td>
                    <td><?= $employee->email ?></td>
                    <td><?= $employee->company ?></td>
                    <td><a href="/employees/edit?id=<?= $employee->id ?>" class="btn btn-info me-2">Edit</a><a href="/employees/delete?id=<?= $employee->id ?>" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
<?php require_once 'footer.php'  ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Students</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Subject</th>
  </tr>
  <?php
    foreach($data['students'] as $student):
  ?>
  <tr>
    <td><?= $student->name ?></td>
    <td><?= $student->age ?></td>
    <td><?= $student->subject ?></td>
  </tr>
  <?php
  endforeach;
  ?>
</table>

</body>
</html>

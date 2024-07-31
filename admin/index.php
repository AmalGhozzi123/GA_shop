<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=4, initial-scale=1.0">
  <title>Document</title>
</head>
<body  style="background-color:#F0F8FF">
<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php";


?>

<?php include "./templates/navbar.php"; ?>

<div class="container-fluid" style="font-family:Georgia,serif">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>


    <h2 style="color:#191970"><center><b>Mes informations personnels</b></center></h2><br><br><bR><bR>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr style="color:#4169E1">
            <th>Prénom</th>

            <th>Nom</th>
            <th>Email</th>
          </tr>
          <tr>
            <td>ghozzi</td>
            <td>amal</td>
            <td>amalghozzi2002@gmail.com</td>

          </tr>
        </thead>
        <tbody id="admin_list">
          <tr>
          </tr>
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>
</body>
</html>
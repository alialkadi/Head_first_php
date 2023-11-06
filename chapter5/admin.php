<?php require_once('./variables/appvars.php') ?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <h1>REmove score</h1>
<?php

require_once('./variables/appvars.php');

$conn = mysqli_connect("localhost", "root", "", "headfirst");
$query = "SELECT * FROM guitarwars ORDER BY score, data  ASC";
$result = mysqli_query($conn, $query);

echo "<table class='table'>";
while ($row = mysqli_fetch_assoc($result)) {
    echo '
    <tr>
      <td>' . $row["name"] . '</td>
      <td>' . $row["score"] . '</td>
      <td>' . $row["data"] . '</td>
      <td> <a href ="removescore.php?id='.$row['id'] .'&amp;data='.$row['data'].'&amp;name='.$row['name'].'&amp;screenshot='.$row['screenshot'].'&amp;score='.$row['score'].'">REMOVE</a> </td>

    </tr>
';
}
?>

</div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
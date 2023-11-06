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

    <div class="container">
        <h2>SCORE LIST</h2>

        <div class="col-md-6 ms-3">
            To participate<a href="add_score.php">Add your score</a>
        </div>
    </div>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "headfirst");
    $query = "SELECT * FROM guitarwars WHERE approved = 1 ORDER BY score DESC";
    $result = mysqli_query($conn, $query);
    echo '<div class="container">
    <table class="table">
    <thead>';
    $i = 0;
    echo '    <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th scope="col">score</th>
          <th scope="col">date</th>
        </tr>
      </thead><tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i == 0) {
            echo '<tfoot> <tr class="text-align bg-danger">top score' . $row['score'] . '</tr> </tfoot>';
        }

        echo '
      
        <tr>
          <th scope="row">' . $row["id"] . ' </th>
          <td>' . $row["name"] . '</td>
          <td>' . $row["score"] . '</td>
          <td>' . $row["data"] . '</td>
        
    ';
        if (is_file(GW_uploads . $row['screenshot']) && filesize(GW_uploads . $row['screenshot']) > 0) {
            echo '<td class="w-25"> <img src="' . GW_uploads . $row["screenshot"] . '" alt ="sorace img" style="width:30%;" /></td>';
        }
        $i++;
    }
    echo '
    </tr></tbody></table>';
    mysqli_close($conn);
    ?>


    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
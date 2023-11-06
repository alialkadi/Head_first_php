<?php require_once('./variables/appvars.php');
require_once('./authorize.php'); ?>
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
        <?php

        require_once('./variables/appvars.php');

        if (isset($_GET['id']) && isset($_GET['data']) && isset($_GET['name']) &&  isset($_GET['screenshot'])) {
            $id = $_GET['id'];
            $name = $_GET['name'];
            $data = $_GET['data'];
            $score = $_GET['score'];
            $screenshot = $_GET['screenshot'];
        } else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['score'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $score = $_POST['score'];
            $screenshot = $_POST['screenshot'];
        } else {
            echo 'no data was specified for removal';
        }
        if (isset($_POST['submit'])) {
            if ($_POST['confirm'] == "yes") {
                // delete image from file
                // @unlink(GW_uploads . $screenshot);
                
                // connect to database
                $conn = mysqli_connect("localhost", "root", "", "headfirst");
                $query = "UPDATE guitarwars SET approved = 1  WHERE id = $id";
                $result = mysqli_query($conn, $query);
                mysqli_close($conn);
                echo "the high score: $score for $name was successfully uproved";
            } else {
                echo "the high score was not confirmed";
            }
        } else if (isset($id) && isset($name) && isset($data) && isset($score) && isset($screenshot)) {
            echo '<p> Confirm Approval </p>
            <p> name :' . $name . ' score: ' . $score . '</p>
            <hr>
            <img src="' . GW_uploads . $screenshot . '" alt ="sorace img" style="width:30%;" />
            <hr>
            <form class="form" method="POST" action="approved.php" >
                <input type ="radio" name = "confirm" value = "yes"  /> YES <br>
                <input type ="radio" name = "confirm" value = "no"  /> No <br>
                <input type="submit" value="submit" class="btn btn-success mt-3 " name="submit">
                <input type ="hidden" name = "id" value = "' . $id . '"  /> 
                <input type ="hidden" name = "name" value = "' . $name . '"  /> 
                <input type ="hidden" name = "score" value = "' . $score . '"  /> 
                <input type ="hidden" name = "screenshot" value = "' . $screenshot . '"  /> 
            </form>
            ';
        }

        echo 'Back to  <a href = "./admin.php" > admin panal </a> ';
        // echo $screenshot;



        ?>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
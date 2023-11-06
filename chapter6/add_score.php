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

<?php

if (isset($_POST["submit"])) {
    $conn = mysqli_connect('localhost', 'root', '', 'headfirst');
    $name = mysqli_real_escape_string($conn,trim($_POST['name']));
    $score = mysqli_real_escape_string($conn,trim($_POST['score']));
    $screenshot = uniqid() . mysqli_real_escape_string($conn,trim($_FILES['screenshot']['name']));
    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size'];
    if(is_numeric($score)){
        if (!empty($name) && !empty($score) && !empty($screenshot)) {
            if ((($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/jpeg')|| ($screenshot_type == 'image/svg')|| ($screenshot_type == 'image/png') || ($screenshot_type == 'image/gif') )
             && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
                
                    $target = GW_uploads . $screenshot;
                    if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
    
                        
                        $query = "INSERT INTO `guitarwars`(`data`,`name`,`score`,`screenshot`) VALUES (NOW(),'$name','$score','$screenshot' ) ";
                        $result = mysqli_query($conn, $query);
                        $success = "<div class='container'>
                            <div class='col-md-8 mx-auto text-center'>
                            <div class='alert alert-success'>SCORE is ADDED</div>
                            </div>
                            </div>";
                        echo $success;
                        // echo "<img src='". GW_uploads.$screenshot."' /> ";
                        $success = '';
                        mysqli_close($conn);
                    } 
                 else {
                    $danger = "<div class='container'>
                        <div class='col-md-8 mx-auto text-center'>
                        <div class='alert alert-danger'>'<p class='bg-danger text-center'> sorry, there was an error uploading the image </p>'</div>
                        </div>
                        </div>";
                    echo $danger;
                }
            } else {
                $danger = "<div class='container'>
                        <div class='col-md-8 mx-auto text-center'>
                        <div class='alert alert-danger'>'<p class='bg-danger text-center'> sorry, the screen shot must be a GIF, JPEG, or PNG image file no grater than 4 megabyte size  </p>'</div>
                        </div>
                        </div>";
                echo $danger;
            }
            @unlink($_FILES['screenshot']['tmp_name']);
        }else {
            $danger = "<div class='container'>
                    <div class='col-md-8 mx-auto text-center'>
                    <div class='alert alert-danger'>'<p class='bg-danger text-center'> All Information is required</p>'</div>
                    </div>
                    </div>";
            echo $danger;
        }
    }else{
        $danger = "<div class='container'>
                        <div class='col-md-8 mx-auto text-center'>
                        <div class='alert alert-danger'>'<p class='bg-danger text-center'> the score must be number And don't contain any spaces  </p>'</div>
                        </div>
                        </div>";
                echo $danger;
    }
}

?>


<body>
    <div class="container mt-5">
        <h1>Add score</h1>
        <h2>see results <a href="index.php">here</a></h2>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="4194304">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="name">Score</label>
                    <input type="text" name="score" id="score" class="form-control">
                    <input type="file" name="screenshot" id="screenshot" accept="image/*">
                    <input type="submit" value="submit" class="btn btn-success mt-3 form-control" name="submit">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
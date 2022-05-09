<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Captcha</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css" />
</head>
<body>
<div id="main">
    <div class="container">
        <div class="row">
            <h1>Captcha bypass 6</h1>
        </div>
        <div class="row">
            <p class="lead">
                Flag is an integer between 6000 and 7000.<br />
            </p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <form name="LoginForm" method="post">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="flag" name="flag" placeholder="Enter flag" required>
                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Captcha" required>
                <img src="../captcha.php" class="form-control"/><br>
                <input type="submit" class="form-control btn btn-default" name="submit">
            </div>
        </form>
    </div>

    <?php
    $flag="6232";
    if(isset ($_POST['submit'])){
        if(empty($_SESSION)){
            echo "<p class=\"alert-danger col-md-2\">Invalid session.</p>";
        }
        else{
            if (isset($_POST["captcha"])&&$_SESSION["code"]==$_POST["captcha"] ){
                if (isset ($_POST['flag'])) {
                    $user_flag = $_POST['flag'];
                    if ($user_flag==$flag) {
                        echo "<p class=\"alert-success col-md-2\">Correct:)<br>";
                        echo "<button onclick=\"window.location.href='../captcha7/'\">Next challenge -></button></p>";
                    }
                    else{
                        echo "<p class=\"alert-danger col-md-2\">Incorrect flag.</p>";
                    }
                }
                $_SESSION["code"]=null;
            }
            else{
                echo "<p class=\"alert-danger col-md-2\">Invalid captcha</p>";
                die();
            }
        }
    }
    ?>
</div>
</body>
</html>
<?php
include ("../footer.php");
?>
<!--Moein Fatehi
<?php
session_start();
include("view.php");
error_reporting(E_ERROR | E_PARSE);

$IP=$_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $IP=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
$first = false;
if($_SESSION["IP"]==$IP){
    $first=false;
}
else{
    $first=true;
}
$_SESSION["IP"]=$IP;

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
            <h1>Captcha bypass 8</h1>
        </div>
        <div class="row">
            <p class="lead">
                Flag is an integer between 8000 and 9000.<br />
            </p>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <form name="LoginForm" method="post">
            <div class="form-group col-md-2">
                <input type="text" class="form-control" id="flag" name="flag" placeholder="Enter flag" required>
                <?php
                if(!$first){
                    echo "<input type=\"text\" class=\"form-control\" id=\"captcha\" name=\"captcha\" placeholder=\"Captcha\" required>";
                    echo "<img src=\"../captcha.php\" class=\"form-control\"/><br>";
                }
                else{

                }
                ?>
                <input type="submit" class="form-control btn btn-default" name="submit">
            </div>
        </form>
    </div>

    <?php
    $flag="8593";
    if(isset ($_POST['submit'])){
        if(empty($_SESSION)||($_SESSION["first"])){
            echo "<p class=\"alert-danger col-md-2\">Invalid session.</p>";
        }
        else{
            if(!$first&&$_SESSION["num"]>2){
                if (isset($_POST["captcha"])&&$_SESSION["code"]===(int)$_POST["captcha"] ){
                    if (isset ($_POST['flag'])) {
                        $user_flag = $_POST['flag'];
                        if ($user_flag==$flag) {
                            echo "<p class=\"alert-success col-md-2\">Correct:)<br>";
                            echo "<button onclick=\"window.location.href='../captcha9/'\">Next challenge -></button></p>";
                        }
                        else {
                            echo "<p class=\"alert-danger col-md-2\">Incorrect flag.</p>";
                        }
                    }
                    $_SESSION["code"]=null;
                }
                else{
                    echo "<p class=\"alert-danger col-md-2\" >Invalid captcha</p>";
                }
            }
            else{
                if (isset ($_POST['flag'])) {
                    $user_flag = $_POST['flag'];
                    if ($user_flag==$flag) {
                        echo "<p class=\"alert-success col-md-2\">Correct:)<br>";
                        echo "<button onclick=\"window.location.href='../captcha9/'\">Next challenge -></button></p>";
                    }
                    else{
                        echo "<p class=\"alert-danger col-md-2\">Incorrect flag.</p>";
                    }
                }
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
<!--Hint: Now we have a WAF that may not have obvious effect on these challenges. -->
<!--Moein Fatehi
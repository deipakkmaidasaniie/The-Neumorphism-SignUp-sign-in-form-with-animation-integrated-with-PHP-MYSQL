<?php
session_start();
function function_alert($message)
{
    ?>
    <script type="text/javascript">
    alert("<?php echo $message;?>");
    window.location.href="index.html";
    </script>
    <?php
}
$con=mysqli_connect('localhost','id16469749_root','Deepak17@1999');
if($con)
{
    //echo"connection successful";
}
else{
    echo"No connection";

}
mysqli_select_db($con,'id16469749_website_users');
$email=$_POST['email'];
$password=$_POST['password'];
if($email=='' || $password=='')
{
    $message="Please Enter All the details!! Login Failed";
    function_alert($message);
  
}
else{
$query="select * from register where Email='$email' && password='$password'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num==1)
{
    ;
    $name=mysqli_query($con,"select Name from register where Email='$email' && password='$password'");
    while($db_name=mysqli_fetch_array($name))
    {
        $_SESSION['username']= $db_name["Name"];
    }
    $_SESSION['email']=$email;
    header('location:home.php');
}
else{

    $message="Wrong Credentials!! Please Try Again.";
    function_alert($message);
  
}
}
?>
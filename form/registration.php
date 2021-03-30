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
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
if($name=='' || $email=='' || $password=='')
{
    $message="Please Enter All the details!! Registration Failed";
    function_alert($message);
  
}
    //validate name
    if(!preg_match("/^([a-zA-Z' ]+)$/",$name)){
     $message= "Invalid name given.";
        function_alert($message);
}
   // Validate email
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   }
   else{
       $message="Email Id Not Valid! Please Enter Correct Email Id!";
      function_alert($message);
    
   }
   //validate password
 $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $message= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    function_alert($message);
}
$query="select * from register where Email='$email'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num==1)
{
  
      $message="Email Id already Registered!!";
      function_alert($message);
    

}
else{
    $qy="insert into register(Name,Email,Password) values ('$name','$email','$password')";
    mysqli_query($con,$qy);

    $message="Registration Successful !!";
    function_alert($message);

}

?>
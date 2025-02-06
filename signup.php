<html>
<head><title>
   SIGNUP
</title>
<style>
    body{
        background-color: rgb(255, 255, 255);
    }
    .imag{
       background-color: rgb(0, 0, 0);
    }
</style>
</head>
<body>
    
    <div class="imag" align="center" style="border:3px solid black;margin:40px 0px 0px 250px;width: 60%;height:auto;border-radius: 50px;padding: 0px;">
        <h1 style="text-shadow: 2px 0px 0px rgb(255, 255, 255);text-align: center;color:rgb(255, 0, 0);font-family:fantasy;font-size: 90px;font-weight: 900;">
           MOVIES FOR YOU
        </h1>
    </div>
    <br><br>
    
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" style="width:350px;height:auto;border:2px none rgb(0, 0, 0);border-radius:40px;padding: 10px 20px
            20px;background-color:rgb(5, 5, 5);margin:0px 0px 0px 430px" name="name1" method="post" align="center">
            
            <tt align="center" style="color:rgb(255, 255, 255);font-size:26px;">SIGNUP</tt>
            <table style="padding:20px;" cellpadding="5">
               
            <tr>
            <td><label><tt class="wt" style="color:rgb(255, 255, 255);">User name*  </tt></label></td>
            <td style="color:rgb(255, 255, 255);">:<input id="i1" type="text" placeholder="Enter your username" name="tb1" style="color:rgb(3, 3, 3);border-radius:4px;
            border:1px solid black"></td>
            </tr>
            <tr>
            <td><label><tt class="wt" style="color:rgb(255, 255, 255);">Password*   </tt></label></td>
            <td style="color:rgb(255, 255, 255);">:<input id="i2" type="text" placeholder="Enter your password" name="tb2" style="color:rgb(0, 0, 0);border-radius:4px;
            border:1px solid black"></td>
            </tr>
            <tr>
                <td><label><tt class="wt" style="color:rgb(255, 255, 255);">Name*  </tt></label></td>
                <td style="color:rgb(255, 255, 255);">:<input id="i1" type="text" placeholder="Enter your name" name="tb3" style="color:rgb(3, 3, 3);border-radius:4px;
                border:1px solid black"></td>
                </tr>
                <tr>
                    <td><label><tt class="wt" style="color:rgb(255, 255, 255);">EmailID*  </tt></label></td>
                    <td style="color:rgb(255, 255, 255);">:<input id="i1" type="text" placeholder="Enter your email" name="tb4" style="color:rgb(3, 3, 3);border-radius:4px;
                    border:1px solid black"></td>
                    </tr>
                    <tr>
                        <td><label><tt class="wt" style="color:rgb(255, 255, 255);">Phone number*  </tt></label></td>
                        <td style="color:rgb(255, 255, 255);">:<input id="i1" type="text" placeholder="Enter your number" name="tb5" style="color:rgb(3, 3, 3);border-radius:4px;
                        border:1px solid black"></td>
                        </tr>
            </table>
            <div align="center">
            <br>
            <input type="submit" value="SingnUp" class="button" name="b1" style="padding:10px;width:80px;color:rgb(0, 0, 0);
            background:rgb(246, 0, 0);border-radius:10px;border: 1px solid rgb(255, 255, 255);">
            </div>
            </form>
 
   

</body>
<?php
$con=mysqli_connect("localhost","root","");
session_start();
if (!$con)
{
die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"ccproject");
$result = mysqli_query($con,"SELECT * FROM register");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$a1=($_POST["tb1"]);
$a2=($_POST["tb2"]);
$a3=($_POST["tb3"]);
$a4=($_POST["tb4"]);
$a5=($_POST["tb5"]);
$count=0;
$count1=0;
if($a1!="" && $a2!="" && $a3!="" && $a4!="" && $a5!=""){
    $count1=1;
}
else{
    echo "<script>alert('Fill all details');</script>";
}
if($count1==1){
    if(strlen($a2)!=8){
        echo "<script>alert('password must be equal to 8 characters including special characters,lowercase,uppercase');</script>";
    }
    else{
        $pattern='/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])\S*$/';
        if(preg_match($pattern,$a2)){
            $count1=2;
            echo "<script>alert('password accepted');</script>";
        }
    }
}
while($row = mysqli_fetch_array($result))
{
if($a1==$row['username']){
    $count=1;
    echo "<script>";
    echo "alert('username already exists')";
    echo "</script>";
    break;
}
}
if($count!=1 && $count1==2){
        echo "<script>alert('Succesfully registered');</script>";
        $result1 = mysqli_query($con,"INSERT INTO register (username,password,name,emailid,phoneno)
    VALUES ('$a1','$a2','$a3','$a4','$a5');");
}
if($count!=1 && $count1==2){
       header("Location: page.html");
}
else{
    echo "<script>alert('password must be equal to 8 characters including special characters,lowercase,uppercase');</script>";
}
}

?>
</html>
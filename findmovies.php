<html>
<head><title>FINDMOVIE</title>
<style>
    body{
        background-color: rgba(255,0,0);
    }
   
.grid-container {
  display: grid;
  grid-template-columns: 415px 415px 415px;
  grid-gap: 8px;
  background-color: rgba(255,0,0);
  
}

.grid-container > div {
  background-color: rgba(255,0,0, 0.8);
  text-align: center;
  padding: 20px 0px;
  font-size: 30px;
}
.but{
    font-style:normal;
    font-size:medium;
    width: 150px;
    color:rgb(0, 0, 0);
    background:rgb(255,0,0,);
    border-radius:10px;
    border: 1px solid rgb(255,255,255);
}
</style>
</head>
<body>

<div class="grid-container">
<?php
//$con=mysqli_connect("ccproject.c7sovmb4ucbm.ap-south-1.rds.amazonaws.com","admin","admin123");
$con=mysqli_connect("localhost","root","");
session_start();
if (!$con)
{
die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"ccproject");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
$a1=($_POST["opt"]);//mood
$a2=($_POST["opt1"]);//genre
$a3=($_POST["tb1"]);//year
$a4=($_POST["opt2"]);//language
$a5=($_POST["opt3"]);//agerating
$count=0;
$count1=0;
$result = mysqli_query($con,"SELECT * FROM movies where mood='$a1' and genre='$a2' and year='$a3' and language='$a4' and agerating='$a5';");
if($a1!="" && $a2!="" && $a3!="" && $a4!="" && $a5!=""){
    $count1=1;
}
else{
    echo "<script>alert('Fill all details');</script>";
}
if($count1==1){
while($row = mysqli_fetch_array($result))
{
    ?>
    <div style="padding:10px;height:500px;border-radius:10px;background-color: rgb(5, 5, 5);">
    <img src="<?php echo $row['image']; ?>" width="70%" height="50%"><br>
    <tt style="color:rgb(255,255,255);text-align:left;text-size:18px;"><?php echo "<tt style='font-size:30px;color:rgb(255,255,255);'>".$row['moviename']."</tt>"?>
    <?php echo "<tt style='font-size:20px;color:rgb(255,255,255);'>".$row['rating']."</tt>"?><br><tt style="text-align:left;text-size:1px;">StroyLine: </tt><?php echo "<h5 style='font-size:12px;color:rgb(255,255,255);text-align:left;'>".$row['storyline']."</h5>"?></tt>
    <input type="button" class="but" value="Watch trailer" onclick="location.href='<?php $row['trailerlink']?>'"></div>
    <?php
}
}
}
/*
    mood
    year
    agerating
    language
    image
    moviename
    rating/imdb
    storyline
    genre
    watch tariler button link
    */
?>


</body>

</html>

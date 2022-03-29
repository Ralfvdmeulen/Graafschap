<?php include 'header.php';?>
<?php include '../src/databaseFunctions.php';?>

    <div class="page lineup">
        <div class="container">
            
            <h1>Line-up</h1>
            <div class="artists">
 <?php 

$mysqli = db_connect();

$sql = "SELECT * FROM lineup";
$lineup = db_getData($sql);
if($lineup -> num_rows > 0){
  while($artist = $lineup->fetch_assoc()){
      $artistImages = IMAGE_FOLDER . "/" . $artist['artistImage'];
      echo "<div class='artist'> <img src=" . $artistImages . "><h2> $artist[artistName]</h2></div>";
  }
}
?>


        
        </div>
    </div>
<?php include'footer.php';?>
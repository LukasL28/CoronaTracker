

<?php
// By Lukas L.
require('config.php');


// Corona Länder Array (Dynamisch)
$jsondata2 = file_get_contents('https://api.thevirustracker.com/free-api?global=stats');
// Corona thevirustracker
$returncorona = json_decode($jsondata2, true);
// auslesen der Corona Virus api
// Auflösen der Corona api
//*********
$corona1 = $returncorona['results'];
$corona = $corona1['0'];
$coronaweltweit = $corona['total_cases'];
$coronatote = $corona['total_deaths'];
//*********
 ?>

 <script>

 window.addEventListener("load", function(){
 	var load_screen = document.getElementById("load_screen");
   setTimeout(function(){
 	document.body.removeChild(load_screen);
}, 500);
 });

 </script>


<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="icon" type="image/png" href="<?php echo $bild; ?>">
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="300" >
    <title>Corona Cases</title>
  </head>
  <body>

<div id="load_screen"><div id="loading"><h1>Lade ...</h1></div></div>

<div class="coronainfototal">
<h1 id="antiselect"><?php echo $teamname; ?></h1>
<h1 id="antiselect">Corona Cases Worldwide: <?php echo number_format($coronaweltweit)."<de>"; ?></h1>
<h1 id="antiselect">Corona Deaths Worldwide: <?php  echo number_format($coronatote)."<de>"; ?></h1>
<div class="corona">
<table class="table table-dark" id="users">
  <thead class="tabletop" id="antiselect">
  <tr>
    <th class="echotext" scope="col">Countries</th>
    <th class="echotext" scope="col">Corona Cases</th>
    <th class="echotext" scope="col">Corona Cases Today</th>
    <th class="echotext" scope="col">Deaths</th>
  </tr>
  </thead>

<?php
foreach ($coronaländer as $coronaland) {
$jsondata3 = file_get_contents('https://api.thevirustracker.com/free-api?countryTotal='.$coronaland);
$returncoronaland1 = json_decode($jsondata3, true);
$coronaland1 = $returncoronaland1['countrydata'];
$coronaland2 = $coronaland1['0'];
$coronainfo = $coronaland2['info'];

?>
<tr>

  <th class="echotextleft"> <img onmousedown="event.preventDefault()" class='positionimg' id=antiselect src="https://www.countryflags.io/<?php echo $coronaland; ?>/shiny/64.png" alt="<?php echo $coronainfo['title']; ?>"> <?php echo $coronainfo['title']; ?></th>
  <th class="echotext"><?php echo number_format($coronaland2['total_cases'])."<de>"; ?></th>
  <th class="echotext"><?php echo number_format($coronaland2['total_new_cases_today'])."<de>"; ?></th>
  <th class="echotext"><?php echo number_format($coronaland2['total_deaths'])."<de>"; ?></th>

</tr>
<?php
}
?>
</table>
  </body>
</html>


<style>
/**
By Lukas L.

Mitwirkende: Gipfel
**/
div#load_screen{
	background: #000;
	opacity: 1;
	position: fixed;
    z-index:10;
	top: 0px;
	width: 100%;
	height: 1600px;
}
div#load_screen > div#loading{
	color:#FFF;
	width:120px;
	height:24px;
	margin: 300px auto;
}

body{
font-family: 'Baloo Thambi 2', cursive;
background-color: #242424;
}

p{
color: #ffffff;
}

div #antiselect {
 -ms-user-select: None;
 -moz-user-select: None;
 -webkit-user-select: None;
 user-select: None;
}
/**
Verhindert das Makieren von Text
**/
.coronainfototal{
  color: #ffffff;
  text-align: center;
}

.coronainfo{
margin-top: 10px ;
}

.positionimg{
-ms-user-select: None;
-moz-user-select: None;
-webkit-user-select: None;
user-select: None;
}

.flex-container{
margin: 10px 10px 10px 10px ;
}

.flex{
border-radius: 10px ;
border-top: 10px solid #343a40 ;
}

.corona{
  margin: 10px 10px 10px 10px ;
  border-radius: 10px ;
  border-top: 10px solid #343a40 ;
}

.table {
border-bottom-left-radius: 10px ;
border-bottom-right-radius: 10px ;
}

.echotextleft{
  text-align: left;
   font-size: xx-large;
}

.echotext {
    text-align: center;
    font-size: xx-large;
}

</style>

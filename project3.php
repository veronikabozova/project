<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Time calculator</title>
		</head>
	<body bgcolor="#FFFFCC">
		<h1 align="center">Time calculator</h1>
  		<img border="3" src="s.jpg" Weight="100px" align="center">
 		<hr>
 		<div align="center">Пътувате по дълъг прав път със светофари, сменящи светлината си в зелено и червено през равен интервал от време. Движите се със скорост 1 метър в секунда.</div>
 		<hr>
 		<div align="center"> За да определите колко време ще ви е необходимо да достигнете края на пътя, въведете продължителността на пътя до всеки светофар в нарастващ ред, както и времето, за което всеки светофар сменя светлината си:</div>
 		<hr>
 		<form method = "post" align="center" action = "project3.php">
		<p><input type = "number" name = "distance1" placeholder = "enter your distance...">
		<input type='number' name='time1' placeholder="enter your time..."></p>
		<p> <input type = "number" name = "distance2" placeholder = "enter your distance...">
		<input type='number' name='time2' placeholder="enter your time..."></p>
		<p><input type = "number" name = "distance3" placeholder = "enter your distance...">
		<input type='number' name='time3' placeholder="enter your time..."></p>
		<input type = "submit" name = "submit" value = "изчисли">
		</form>
		<hr>

	
<?php

if(!empty($_POST)){

$distance1 = $_POST ['distance1'];
$time1 = $_POST ['time1'];
$distance2 = $_POST ['distance2'];
$time2 = $_POST ['time2'];
$distance3 = $_POST ['distance3'];
$time3 = $_POST ['time3'];

$road_map = [[$distance1, $time1], [$distance2, $time2], [$distance3, $time3]];
$pass = [];
$lights = [];
$count = count($road_map);
$time= 0;
$residue1 = 0;
$residue2 = 0;
$road1 = 0;
$road2 = 0;
$final1 = 0;
$final2 = 0;
$final3 = 0;
$finalLight = 0;

// For first light:
for ($i = 0; $i < count($road_map); $i++){ 
}

$time = $road_map[0][1];

while ($road_map[0][0] > $time){
 	$time += $road_map[0][1];
 	$number = $time/$road_map[0][1];

	if ($number % 2 == 0){
		$time += $road_map[0][1];
	}
}

if ($road_map[0][0] <= ($time - $road_map[0][1])){
	$final1 = $time - $road_map[0][1];
}
	
if ($road_map[0][0] > ($time - $road_map[0][1])){
	$final1 = $road_map[0][0];
}


// For second light:
for ($i = 1; $i < count ($road_map); $i++){ 
}

$road1 = $road_map[1][0] - $road_map[0][0];
$time = $road_map[1][1];

if ($final1 <= $time){
	$time = $road_map[1][1] - $final1;
}

elseif ($final1 > $time){
   $num = ($final1) / $road_map[1][1];
	$number = ceil($num);
	$residue1 = (($road_map[1][1] * $number) - $final1);
	$time = $residue1;

	if ($number % 2 == 0){
		$time += $road_map[1][1];
	}
}

while ($road1 >= $time){
	$time += $road_map[1][1] * 2; 	
}

if ($road1 <= ($time - $road_map[1][1])){
	$final2 = $time - $road_map[1][1];
}
	
if ($road1 > ($time - $road_map[1][1])){
	$final2 = $road1;
}


// For third light:

for ($i = 2; $i < count ($road_map); $i++){ 
}

$road2 = $road_map[2][0] - $road_map[1][0];
$time = $road_map[2][1];

if (($final1 + $final2) <= $time){
	$time = $road_map[2][1] - ($final1 + $final2);
}

elseif (($final1 + $final2) > $time){
	$num = ($final1 + $final2) / $road_map[2][1];
	$number = ceil($num);
	$residue2 = (($road_map[2][1] * $number) - ($final1 + $final2));
	$time = $residue2;
	
	if ($number % 2 == 0){
		$time += $road_map[2][1];
	}	
}

while ($road2 >= $time){
 	$time += $road_map[2][1] * 2;
}

if ($road2 <= $time - $road_map[2][1]){
	$final3 = $time - $road_map[2][1];
}

if ($road2 > $time - $road_map[2][1]){
	$final3 = $road2;	
}

array_push($lights, $final1, $final2, $final3);

$finalLight = array_sum($lights);
}
?>
<h1 align="center">
<?php
if(!empty($_POST)){
echo "You will go all the way in " . $finalLight . " seconds."; 
}
?> 
</h1>
</body>
</html>




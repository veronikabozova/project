<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Time calculator</title>
		</head>
	<body bgcolor="#FFFFCC">
		<h1 align="center">Time calculator</h1>
  		<img border="3" src="s.jpg" Weight="100px" align="center">
 		<hr>
 		<div>Пътувате по дълъг прав път със светофари. Движите се със скорост 1 метър в секунда. За да определите колко време ще ви е необходимо да достигнете края на пътя, въведете продължителността на пътя до всеки светофар и времето, за което всеки светофар сменя светлината си:</div>
 		<hr>
 		<form method = "post" align="center" action = "project2-new.php">
		<p><input type = "number" name = "distance1" placeholder = "enter your distance...">
		<input type='number' name='time1' placeholder="enter your time..."></p>
		<p> <input type = "number" name = "distance2" placeholder = "enter your distance...">
		<input type='number' name='time2' placeholder="enter your time..."></p>
		<p><input type = "number" name = "distance3" placeholder = "enter your distance...">
		<input type='number' name='time3' placeholder="enter your time..."></p>
		<input type = "submit" name = "submit" value = "изчисли">
		</form>
		<hr>
	</body>
</html>
	
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

$count = count($road_map);
$time= 0;
$residue = 0;
$final1 = 0;
$final2 = 0;
$final3 = 0;
$timeFinal = 0;

// For firt distance and lights
for ($i = 0; $i < count($road_map); $i++){ 
}

if ($road_map[0][0] <= $road_map[0][1]){
	$final1 = $road_map[0][0];
}

if ($road_map[0][0] > $road_map[0][1]){
	$time = $road_map[0][1] + ($road_map[0][1]*2);
	
	while ($road_map[0][0] > $time){
		$time = $time + ($road_map[0][1]*2);
	}
	
	if (($time - $road_map[0][1]) > $road_map[0][0]){
		$final1 = $time - $road_map[0][1];
	}
	
	if (($time - $road_map[0][1]) <= $road_map[0][0]){
		$final1 = $road_map[0][0];
	}
}


// For second distance and lights
for ($i = 1; $i < count ($road_map); $i++){ 
}

if ($final1 > $road_map[1][1]){
    $num = $final1 / $road_map[1][1];
	$number = floor($num);
	$residue = $final1 - ($road_map[1][1] * $number);

	if ($number % 2 == 0){
		$time = $residue + ($road_map[1][1] * 2);
	}

	if ($number % 2 != 0){
		$time = $residue + $road_map[1][1];
	}
}

elseif ($final1 <= $road_map[1][1]){
	$residue = $road_map[1][1] - $final1;
	$time = $residue + ($road_map[1][1] * 2);
}

if ($road_map[1][0] <= $road_map[1][1]){
	$final2 = $road_map[1][0];
}

if ($road_map[1][0] > $road_map[1][1]){
	$time = $road_map[1][1] + $road_map[1][1] * 2;

	while ($road_map[1][0] > $time){
		$time = $time + ($road_map[1][1] * 2);
	}

	if (($time - $road_map[1][1]) > $road_map[1][0]){
		$final2 = $time - $road_map[1][1];
	}

	if (($time - $road_map[1][1]) <= $road_map[1][0]){
		$final2 = $road_map[1][0];
	}
}

	
// For third distance and lights

for ($i = 2; $i < count ($road_map); $i++){ 
}

if (($final1 + $final2) > $road_map[2][1]){
	$num = ($final1 + $final2) / $road_map[2][1];
	$number = floor($num);
	$residue = ($final1 + $final2) - ($road_map[2][1] * $number);

	if ($number % 2 == 0){
		$time = $residue + ($road_map[2][1] * 2);
	}

	if ($number % 2 != 0){
		$time = $residue + $road_map[2][1];
	}
}

elseif (($final1 + $final2) <= $road_map[2][1]){
	$residue = $road_map[2][1] - ($final1 + $final2);
	$time = $residue + ($road_map[2][1] * 2);
}

if ($road_map[2][0] <= $road_map[2][1]){
	$final3 = $road_map[2][0];
}

if ($road_map[2][0] > $road_map[2][1]){
	$time = $road_map[2][1] + $road_map[2][1]*2;

	while ($road_map[2][0] > $time){
		$time = $time + ($road_map[2][1]*2);
	}

	if (($time - $road_map[2][1]) > $road_map[2][0]){
		$final3 = $time - $road_map[2][1];
	}

	if (($time - $road_map[2][1]) <= $road_map[2][0]){
		$final3 = $road_map[2][0];
	}
}	
	
array_push($pass, $final1, $final2, $final3);	
$timeFinal =  array_sum($pass);	
echo "<p> Your time is: " . $timeFinal . " seconds";
}



<?php
header('Content-Type: image/png');
// Get json data from CyberKitsuness site 
$url = "http://direct.cyberkitsune.net/canibuycubeworld/status.json";
$json = file_get_contents($url);
$json_decode = json_decode($json);


if($json_decode->site == true)
	$text = "Picroma: UP!";
else
	$text = "Picroma: DOWN!";

if($json_decode->reg == true)
	$text .= "Registrations: UP!";
else
	$text .= "Registrations: DOWN!";

if($json_decode->shop == true)
	$text .= "Shop: UP!";
else
	$text .= "Shop: DOWN!";


$text = explode("!", $text);
	putenv('GDFONTPATH=' . realpath('.'));
	$font = 'arialbd.ttf';
	
	// Image from bg.png
	$im =  @imagecreatefrompng('bg.png');
	// colors
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 115, 150, 195);
	
	// starting y
	$y = 18;
	// 3 rows, increase y by 25 each time (new line)
	foreach($text as $line)
	{
		imagettftext($im, 12, 0, 10, $y, $white, $font, $line);
		$y = $y + 15;		
	}
	imagettftext($im, 12, 0, 250, 15, $white, $font, "Data from cyberkitsune.net/cube");
	imagettftext($im, 10, 0, 428, 53, $white, $font, "zeroi9.com");
	
	imagepng($im);
	imagedestroy($im);

?>
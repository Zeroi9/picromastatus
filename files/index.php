<?php
header('Content-Type: image/png');
// Get json data from CyberKitsuness site 
$url = "http://direct.cyberkitsune.net/canibuycubeworld/status.json";
$json = file_get_contents($url);
if($json["site"] == true)
	$text = "Picroma: UP!";
else
	$text = "Picroma: DOWN!";

if($json["reg"] == true)
	$text .= "Registrations: UP!";
else
	$text .= "Registrations: DOWN!";

if($json["shop"] == true)
	$text .= "Shop: UP!";
else
	$text .= "Shop: DOWN!";

// create image
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
	$y = 40;
	// 3 rows, increase y by 25 each time (new line)
	foreach($text as $line)
	{
		imagettftext($im, 22, 0, 140, $y, $white, $font, $line);
		$y = $y + 25;		
	}
	imagettftext($im, 12, 0, 260, 105, $white, $font, "Data from cyberkitsune.net/cube");
	imagettftext($im, 12, 0, 5, 18, $white, $font, "zeroi9.com");
	
	imagepng($im);
	imagedestroy($im);

?>
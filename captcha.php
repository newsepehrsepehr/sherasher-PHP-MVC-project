<?php

$str = substr(rand(12345, 99999), 0, 5);


session_start();
$_SESSION['cap_code'] = $str;

function farsidigit($text)
{
    $text = str_replace('0' , '٠' , $text);
    $text = str_replace('1' , '١' , $text);
    $text = str_replace('2' , '٢' , $text);
    $text = str_replace('3' , '٣' , $text);
    $text = str_replace('4' , '۴' , $text);
    $text = str_replace('5' , '۵' , $text);
    $text = str_replace('6' , '۶' , $text);
    $text = str_replace('7' , '٧' , $text);
    $text = str_replace('8' , '٨' , $text);
    $text = str_replace('9' , '٩' , $text);

    return $text;
}


$img = imagecreate(100 , 35);

$text_color = imagecolorallocate($img, rand(200, 255), rand(200, 255), rand(200, 255));
$text_color2 = imagecolorallocate($img, rand(0, 55), rand(0, 55), rand(0, 55));

imagestring($img , 20 , 22 , 15 , $str , $text_color2);

$line_color = imagecolorallocate($img, rand(100, 200), rand(100, 200), rand(100, 200));


for( $i=0; $i<10; $i++ )
{
    imageline($img, rand(10, 5*$i), rand(0, 10*$i), rand(10, 20*$i), rand(10, 6+$i), $line_color);
}

/*$text = farsidigit($str);

// Free TTF font path ( You can change this with other Farsi fonts )
$font = 'FreeFarsi.ttf';

// Setting image
imagefttext($img, 18, rand(0, 5), rand(5, 10), rand(25, 35), $text_color, $font, $text);*/


header('content:/image/jpeg');

imagejpeg($img);



?>
<?php

require_once 'vendor/autoload.php';

use NumPHP\Core\NumArray;
use NumPHP\LinAlg\LinAlg;
use NumPHP\Core\NumPHP;

// Görseli yükleme ve boyutunu 2 katına çıkarma
$image = imagecreatefrompng('images/cat.png');
$width = imagesx($image);
$height = imagesy($image);
$newWidth = $width * 2;
$newHeight = $height * 2;

// 2 kat büyütülmüş yeni görsel oluşturma
$newImage = imagecreatetruecolor($newWidth, $newHeight);

// Renk tanımlamaları (genişletilmiş)
$colors = [
    'r' => imagecolorallocate($newImage, 255, 0, 0),      // Kırmızı
    'g' => imagecolorallocate($newImage, 0, 255, 0),      // Yeşil
    'b' => imagecolorallocate($newImage, 0, 0, 255),      // Mavi
    'y' => imagecolorallocate($newImage, 255, 255, 0),    // Sarı (Kırmızı + Yeşil)
    'c' => imagecolorallocate($newImage, 0, 255, 255),    // Cyan (Yeşil + Mavi)
    'm' => imagecolorallocate($newImage, 255, 0, 255),    // Magenta (Kırmızı + Mavi)
    'o' => imagecolorallocate($newImage, 255, 165, 0),    // Turuncu
    'br' => imagecolorallocate($newImage, 165, 42, 42),   // Kahverengi
    'lg' => imagecolorallocate($newImage, 192, 192, 192), // Açık gri
    'dg' => imagecolorallocate($newImage, 64, 64, 64)     // Koyu gri
];

// Renk analizi parametreleri
$COLOR_DOMINANCE = 1.15;    // Bir rengin diğerlerine göre baskınlık oranı
$GREY_THRESHOLD = 20;       // Gri ton tespiti için renk farkı eşiği
$DARK_THRESHOLD = 200;      // Koyu renk tespiti için yoğunluk eşiği
$LIGHT_GREY_THRESHOLD = 500; // Açık gri tespiti için yoğunluk eşiği
$MIN_COLOR_INTENSITY = 100;  // Minimum renk yoğunluğu eşiği

// Renk tespiti fonksiyonu
function determineColor($r, $g, $b, $COLOR_DOMINANCE, $GREY_THRESHOLD) {
    $intensity = $r + $g + $b;
    
    // Gri ton kontrolü
    if (abs($r - $g) < $GREY_THRESHOLD && 
        abs($g - $b) < $GREY_THRESHOLD && 
        abs($r - $b) < $GREY_THRESHOLD) {
        if ($intensity > 500) return 'lg';  // Açık gri
        return 'dg';                        // Koyu gri
    }
    
    // Kahverengi kontrolü
    if ($r > $g && $r > $b && $g > $b && $intensity < 500) {
        return 'br';
    }
    
    // Turuncu kontrolü
    if ($r > $g * 1.5 && $g > $b && $intensity > 400) {
        return 'o';
    }
    
    // Ara renk kontrolleri
    if ($r > 200 && $g > 200 && $b < 100) return 'y';  // Sarı
    if ($g > 200 && $b > 200 && $r < 100) return 'c';  // Cyan
    if ($r > 200 && $b > 200 && $g < 100) return 'm';  // Magenta
    
    // Ana renk kontrolleri
    if ($r > $g * $COLOR_DOMINANCE && $r > $b * $COLOR_DOMINANCE) return 'r';
    if ($g > $r * $COLOR_DOMINANCE && $g > $b * $COLOR_DOMINANCE) return 'g';
    if ($b > $r * $COLOR_DOMINANCE && $b > $g * $COLOR_DOMINANCE) return 'b';
    
    // Varsayılan renk seçimi
    $max = max($r, $g, $b);
    if ($max == $r) return 'r';
    if ($max == $g) return 'g';
    return 'b';
}

// Görsel matrisini oluşturma
$imageMatrix = [];
for ($y = 0; $y < $height; $y++) {
    $row = [];
    for ($x = 0; $x < $width; $x++) {
        $rgb = imagecolorat($image, $x, $y);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;
        
        $row[] = determineColor($r, $g, $b, $COLOR_DOMINANCE, $GREY_THRESHOLD);
    }
    $imageMatrix[] = $row;
}

$numMatrix = new NumArray($imageMatrix);

// Pikselleri boyama (2x2 bloklar halinde)
for ($y = 0; $y < $height; $y++) {
    for ($x = 0; $x < $width; $x++) {
        $colorKey = $imageMatrix[$y][$x];
        $color = $colors[$colorKey];
        
        // Her pikseli 2x2 blok olarak çiz
        imagesetpixel($newImage, $x * 2, $y * 2, $color);
        imagesetpixel($newImage, $x * 2 + 1, $y * 2, $color);
        imagesetpixel($newImage, $x * 2, $y * 2 + 1, $color);
        imagesetpixel($newImage, $x * 2 + 1, $y * 2 + 1, $color);
    }
}

// Görseli kaydetme
imagepng($newImage, 'images/cat_processed.png');

// Belleği temizleme
imagedestroy($image);
imagedestroy($newImage);

// HTML çıktısı için gerekli başlık
header('Content-Type: text/html; charset=utf-8');

echo '<div style="text-align: center;">';
echo '<h2>Orijinal Görsel</h2>';
echo '<img src="images/cat.png" alt="Orijinal görsel">';
echo '<h2>İşlenmiş Görsel</h2>';
echo '<img src="images/cat_processed.png" alt="İşlenmiş görsel">';
echo '</div>';












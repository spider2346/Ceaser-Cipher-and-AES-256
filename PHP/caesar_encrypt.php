<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> 
<title>Caesar Cipher</title>
<link rel="stylesheet" type="text/css" href="cipherstyle.css">
</head>

<body>
<section id="top">
<center><img src="banner.jpg" alt="banner" style="width:1500px;height:193px;" border="2"></center>
</section>
<section id="menu">
<h3> Menu </h3>
	<ul>
	    <li><b>Caesar Cipher</b></li>
		<li><a href="caesar_enc.html">Encrypt</a></li>
		<li><a href="caesar_dec.html">Decrypt</a></li>
		<li><b>AES-256</b></li>
		<li><a href="aes_index.html">Encrypt & Decrypt</a></li>
	</ul>
</section>
<br>
<br>
<h3>Caesar Encrypted</h3>
 <body>	

<?php
function encrypt($str, $shift) {
    $encrypted_text = "";
    $shift = $shift % 26;
    if($shift < 0) {
        $shift += 26;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = strtoupper($str{$i}); 
        if(($c >= "A") && ($c <= 'Z')) {
            if((ord($c) + $shift) > ord("Z")) {
                $encrypted_text .= chr(ord($c) + $shift - 26);
        } else {
            $encrypted_text .= chr(ord($c) + $shift);
        }
      } else {
          $encrypted_text .= " ";
      }
      $i++;
    }
    return $encrypted_text;
}

$plaintext = $_POST['usertext'];
$shift1 = $_POST['shift'];

$encrypted = encrypt($plaintext, $shift1);
echo $encrypted;
echo "<br>";
echo "<br>";
echo "Shifted " . $shift1;
?>

</html>
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
<h3>Caesar Decrypted</h3>
 <body>	

<?php
function decrypt($str, $shift) {
    $decrypted_text = "";
    $shift = $shift % 26;
    if($shift < 0) {
        $shift += 26;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = strtoupper($str{$i}); 
        if(($c >= "A") && ($c <= 'Z')) {
            if((ord($c) - $shift) < ord("A")) {
                $decrypted_text .= chr(ord($c) - $shift + 26);
        } else {
            $decrypted_text .= chr(ord($c) - $shift);
        }
      } else {
          $decrypted_text .= " ";
      }
      $i++;
    }
    return $decrypted_text;
}

$plaintext = $_POST['usertext'];
$shift = $_POST['shift'];

$decrypted = decrypt($plaintext, $shift);
echo $decrypted;
echo "<br />";

?>

</html>
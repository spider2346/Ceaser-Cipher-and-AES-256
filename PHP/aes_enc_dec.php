<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> 
<title>AES-256-CBC Cipher</title>
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
<br>
 <body>	
<?php
function aes_256( $string, $action = 'a' ) {
	
	//$secret_key="";
    $secret_key = 'AdT62MnSa890lzZsdfga';
    $secret_iv = 'sCMAKLmnmqzZ6662va';
 
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
 
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
 
    return $output;
}
	//Executes when user clicks Encrypt button
	if (isset($_POST['encrypt'])) {
	$encrypt = $_POST['aesencrypt'];
	$encrypted = aes_256( $encrypt, 'e' );
	echo "<h3>"."Encrypted"."</h3>";
	echo $encrypted;
	}
	
	//Executes when user clicks Decrypt button
	if (isset($_POST['decrypt'])) {
	$decrypt = $_POST['aesdecrypt'];
	$decrypted = aes_256( $decrypt, 'd' );
	echo "<h3>"."Decrypted"."</h3>";
	echo $decrypted;
	}

/*function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>*/
<h3>AES 256 CBC</h3>
 <body>	
<form action="aes_enc_dec.php" method="POST">
		Plain Text:<br>
	<input type="text" require name="aesencrypt" placeholder="Encrypt" size ="50" ><br>
		Encrypted Text:<br>
	<input type="text" name="aesdecrypt" placeholder="Decrypt" size ="50" ><br><br>
	<input type="submit" name="encrypt" value="Encrypt">
	<input type="submit" name="decrypt" value="Decrypt">
</form>
</body>
</html>
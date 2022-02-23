<?php
    session_start();
    if( isset( $_SESSION["girisyapti"]) and $_SESSION["girisyapti"]==1) {
        header("Location: menu.php");
        die();
    }

    if ( isset($_POST["user"])){
        $user = $_POST["user"];
        $pass = $_POST["pass"];

        require_once "config.php";

        $SQL = "select * from kullanicilar
                    where kullaniciadi = '{$user}' AND kullaniciparolasi = '{$pass}'";
        $kayitlar = mysqli_query($mysqli, $SQL);

        $kayit =mysqli_fetch_array($kayitlar);

        $kayitAdedi = ($kayitlar);

        if( $kayitAdedi == 1) {
            session_start();
            $_SESSION["adisoyadi"] = $kayit["adisoyadi"];
            $_SESSION["id"] = $kayit["id"];
            $_SESSION["girisyapti"] = 1;
            header("Location: menu.php");
        } else {
            session_start();
            $_SESSION["girisyapti"] = 0;
            echo "parola yanlış";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Örneğimiz</title>
</head>
<body>

	<h1>Yönetim Paneli Girişi</h1>
	
	<form action="" method="post">
		<p>Kullanıcı Adınız: <input type="text" name="user" value="" autocomplete="off"></p>
		<p>Kullanıcı Parolanız: <input type="password" name="pass" value=""></p>
		<p><button type="submit">Giriş yap</button></p>
	</form>



</body>
</html>
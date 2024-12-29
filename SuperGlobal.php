<?php
echo $_SERVER["DOCUMENT_ROOT"];
echo "<br>";
echo $_SERVER["PHP_SELF"];
echo "<br>";
echo $_SERVER["SERVER_NAME"];
echo "<br>";
echo $_SERVER["REQUEST_METHOD"];
echo "<br>";
echo $_GET["name"];
echo "<br>";
echo $_POST["name"];
echo "<br>";
echo $_REQUEST["name"];
echo "<br>";
echo $_FILES["name"];
echo "<br>";
echo $_COOKIE["name"];
echo "<br>";
$_SESSION["username"] = "Krossing";
echo $_SESSION["username"];
// echo "<br>";
// // echo $_ENV[];


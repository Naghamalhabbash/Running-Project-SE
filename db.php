<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sanaal_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
// تعيين الترميز لدعم اللغة العربية
$conn->set_charset("utf8");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unknown';
   $email = $_POST['email'] ?? 'Unknown';
    $password = $_POST['password'] ?? 'Unknown';
    $option = $_POST['option'] ?? 'Unknown';
    $today = date('l d.m.Y');
$line = "$name;$email;$password;$option;$today\n";
$file = fopen("log.csv", "a");
if ($file) {
fwrite($file, $line);
fclose($file);
 header("Location: index.html");  
    } else {
        echo 'Unable to open the file for writing.';
    }
}
if ($file) {
    fclose($file);
    }
?>

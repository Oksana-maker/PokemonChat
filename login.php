
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $file = @fopen('log.csv', 'r');

    if ($file) {
        $found = false;  
        while (($line = fgets($file)) !== false) {
            $userData = explode(';', trim($line));
            $storedLogin = $userData[0];
            $storedPassword = $userData[2];
            if ($login === $storedLogin && $password === $storedPassword) {
                $found = true;
                break;
            }
            }
fclose($file); 
if ($found) {
            header('Location: chat.html');
            exit();
        } else {
            header('Location: autentification.html');
        }
    } 
       else {
        echo 'Unable to open the file.';
    }
}
?>
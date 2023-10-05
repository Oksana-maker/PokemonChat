<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? 'Unknown';
    $today = date('l d.m.Y');
$line = "$today;$name\n";
$file = fopen("chat.csv", "a");
if ($file) {
fwrite($file, $line);
fclose($file);
 header("Location: chat.php");  
    } else {
        echo 'Unable to open the file for writing.';
    }
}
$data = [];

if (file_exists('chat.csv')) {
$file = fopen('chat.csv', 'r');
    while (($row = fgetcsv($file)) !== false) {
$data[] = $row;
    }
    fclose($file);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
    width:960px;
    display: block;
    align-items: center ;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    text-align: center;
    margin-left: 15%;
    padding: 0;
}
  .beauty-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width:100%;
}

.beauty-table tr.head {
    background-color: #426306;
    color: #ffffff;
    text-align: center;
   
}

.beauty-table th,
.beauty-table td {
    padding: 12px 15px;
}

.beauty-table tr {
    border-bottom: 1px solid #dddddd;
}

.beauty-table tr:nth-of-type(even) {
    background-color:  #c6de95;
}

.beauty-table tr:last-of-type {

    border-bottom: 2px solid rgb(132, 32, 132);
}

.beauty-table tr.active-row {
    font-weight: bold;
    color: #009879;
}
.button-container {
  margin-top: 20px;
  margin-left:15px ;
  text-align: left;
}
input[type="submit"],
input[type="reset"] {
  background-color: #96b559;
  color: white bold;
  padding: 10px ;
  border: 2px #777474 solid;
  cursor: pointer;
  border-radius: 5px;
  margin-right: 10px;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
  background-color: #426306;
  color: white;
}

        </style>

    </head>
    <body>
    <?php
$file = fopen('chat.csv', 'r');
$data = [];

while (($row = fgetcsv($file)) !== false) {
    $data[] = $row;
}

fclose($file);
?>
<?php echo '<table class="beauty-table">';
echo '<tr class="head"><th>Date</th>
<th>SMS</th>';

foreach ($data as $row) {
    echo '<tr>';
    foreach (explode(';', $row[0])as $cell) {
        echo '<td>' . $cell . '</td>';
    }
    echo '</tr>';
}

echo '</table>';
?>
 <div class="button-container">
 <a href="chat.html"><input type="submit" value="Write new SMS"></a>
                <a href="index.html"><input type="submit" value="Home"></a>
            </div>
    </body>
</html> 



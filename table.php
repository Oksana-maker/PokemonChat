<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
    width: 960px;
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
    background-color: rgb(132, 32, 132);
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
    background-color:  rgb(238, 191, 238);
}

.beauty-table tr:last-of-type {

    border-bottom: 2px solid rgb(132, 32, 132);
}

.beauty-table tr.active-row {
    font-weight: bold;
    color: #009879;
}

        </style>

    </head>
    <body>
    <?php
$file = fopen('log.csv', 'r');
$data = [];

while (($row = fgetcsv($file)) !== false) {
    $data[] = $row;
}

fclose($file);
?>
<?php echo '<table class="beauty-table">';
echo '<tr class="head"><th>First name</th>
<th>Last name</th>
<th>Email</th><th>Course</th>
<th>Date</th></tr>';

foreach ($data as $row) {
    echo '<tr>';
    foreach (explode(';', $row[0])as $cell) {
        echo '<td>' . $cell . '</td>';
    }
    echo '</tr>';
}

echo '</table>';
?>
    </body>
</html> 


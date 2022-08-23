<style>
    .d-table {
        display: table;
        width: 30%;
        border-collapse: collapse;
    }

    .d-tr {
        display: table-row;
    }

    .d-td {
        display: table-cell;
        /*   text-align: center;*/
        border: none;
        border: 1px solid #ccc;
    }

    .d-th {
        display: table-cell;
        /*  text-align: center;*/
        border: none;
        border: 1px solid #ccc;
        vertical-align: middle;
        font-weight: bold;
    }
</style>
<?php // sqltest.php
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die("Fatal Error");
$query = "SELECT * FROM villagers";
$result = $conn->query($query);

$q2 = "SELECT cname FROM cities";
$r2 = $conn->query($q2);
if (!$result or !$r2) die ("BD Error");
$rows = $result->num_rows;
$rows2 = $r2->num_rows;

for ($j = 0; $j < $rows2; ++$j) {
    $row2 = $r2->fetch_array(MYSQLI_NUM);
    $cname[$j] = htmlspecialchars($row2[0]);
}
echo "<div class = d-table><div class = d-tr><div class = d-th>ID</div><div class = d-th>Name</div><div class = d-th>Age</div><div class = d-th>City</div></div>";

for ($j = 0; $j < $rows; ++$j) {
    $row = $result->fetch_array(MYSQLI_NUM);
    echo "<div class = d-tr>";
    for ($k = 0; $k < 4; ++$k)
        if ($k == 3) {
            echo "<div class = d-td>" . htmlspecialchars($cname[$row[$k]]) . "</div>";
        } else
            echo "<div class = d-td>" . htmlspecialchars($row[$k]) . "</div>";
    echo "</div>";
}


echo "</div>";

if (isset($_POST["name"])) $name = $_POST["name"];
else $name = "";
if (isset($_POST["age"])) $age = $_POST["age"];
else $age = "";
if (isset($_POST["city"])) $city = $_POST["city"];
else $city = "";

echo <<<_END
<form method="post" action "sqltest.php">
Name
<input type = "text" name = "name" value = "$name">
Age
<input type = "number" name = "age" size = "2" value = "$age" >

<select name="city" size = "1" value = "$city">
_END;
$r2 = $conn->query($q2);
$rows = $r2->num_rows;
for ($j = 0; $j < $rows; ++$j) {
    $row2 = $r2->fetch_row();
    $rff = "<option value = $j>" . htmlspecialchars($row2[0]) . "</option>";
    if ($j == $city) $rff = "<option value = $j selected='true'>" . htmlspecialchars($row2[0]) . "</option>";
    echo $rff;
}

echo <<<_END
</select>
<input type="submit">
</form>
_END;

if (isset($_POST["age"]) && $_POST["age"] != "") {
    if ($age < 10 || $age > 100) {
        echo "Invalid age" . "<br>";
        $bage = false;
    } else {
        $bage = true;
    }
} else {
    $bage = false;
}

if (isset ($_POST["name"]) && $_POST["name"] != "") {
    $name = rtrim($name, " \n\r\t\v\x00");
    $name = ltrim($name, " \n\r\t\v\x00");
    if ($name == "") {
        echo "Name is empty" . "<br>";
        $bname = false;
    } else {
        $bname = true;
    }
} else {
    $bname = false;
}

if ($bage && $bname) {
    $q3 = "INSERT INTO villagers (id, name, age, cid)
    VALUES (NULL, '$name', $age, $city)";

    if ($conn->query($q3) == TRUE) {
        echo "New record created";
    } else {
        echo "Error";
    }
}


//$result->close();
//$r2->close();
//$r3->close();
$conn->close();


?>
<style>
    .d-table {
        display: table;
        width: 40%;
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
require_once ("model/db.php");
require_once ("model/villagers.php");

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$city = filter_input(INPUT_POST, "city", FILTER_VALIDATE_INT);
$age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_STRING);

/*
var_dump($id);
var_dump($action);
var_dump($name);
var_dump($city);
var_dump($age);
*/

if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = 'create_users_table';
    }
}

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
if (!$name) {
    $name = filter_input(INPUT_GET, "name", FILTER_SANITIZE_STRING);
}
$name = rtrim($name, " \n\r\t\v\x00");
$name = ltrim($name, " \n\r\t\v\x00");


switch ($action) {
    case "update":
        if ($id>=0 &&$city >=0 && $name  && $age>=10)
        {
            $count = update_villager($id,$name,$age,$city);;
        }else{
            echo "OPYAT";
        }
        break;
    case "insert":
        if ($name && $age>=10)
        {
            $count = insert_villager($name, $age, $city);
        }else{
            echo "ERROR. LALKA.";
        }
        break;
    case "delete":
        if ($id>=0) {
            $count = delete_villager($id);
        }else{
            echo "nu ne dolbaeb li";
        }
        break;
    default:
        include('view/table.php');
        include('view/create_insert_form.php');
        include ('view/create_update_form.php');
        include ('view/create_delete_form.php');
        break;
}
?>
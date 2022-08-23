<?php
function getCityName($id)
{
    global $db;
    $query = "SELECT cname FROM cities
                WHERE cid = $id";
    $conn = $db->prepare($query);
    $conn->execute();
    $name = $conn->fetchColumn();
    $conn->closeCursor();
    return $name;
}

function getCities()
{
    global $db;
    $query = "SELECT * from cities";
    $conn = $db->prepare($query);
    $conn->execute();
    $results = $conn->fetchAll();
    $conn->closeCursor();
    return $results;
}

function select_all_villagers()
{
    global $db;
    $query = "SELECT * FROM villagers";
    $conn = $db->prepare($query);
    $conn->execute();
    $results = $conn->fetchAll();
    $conn->closeCursor();
    return $results;
}

function update_villager($id, $name, $age, $city)
{
    global $db;
    $count = 0;
    $query = "UPDATE villagers
              SET name = '$name', age = '$age', cid = '$city'
              WHERE id = $id";
    $conn = $db->prepare($query);
    $conn->bindValue(':id', $id);
    $conn->bindValue(':name', $name);
    $conn->bindValue(':age', $age);
    $conn->bindValue(':city', $city);
    if ($conn->execute()) {
        $count = $conn->rowCount();
    }
    $conn->closeCursor();
    return $count;
}

function insert_villager($name, $age, $cid)
{
    global $db;
    $count = 0;
    $query = "INSERT into villagers (name,age,cid)
               VALUES
               ('$name','$age','$cid')";
    $conn = $db->prepare($query);
    $conn->bindValue(':name',$name);
    $conn->bindValue(':age',$age);
    $conn->bindValue(':city',$cid);
    if ($conn->execute()){
        $count = $conn->rowCount();
    }
    $conn->closeCursor();
    return $count;
}

function delete_villager($id)
{
    global $db;
    $count = 0;
    $query = "DELETE from villagers
                WHERE id=$id";
    $conn=$db->prepare($query);
    $conn->bindValue(':id', $id);
    if ($conn->execute()){
        $count = $conn->rowCount();
    }
    $conn->closeCursor();
    return $count;
}

?>
<?php
echo <<<_END
        <form class = "insert" action = "." method = "POST">
            <input type = "hidden" name ="action" value ="insert">
            <label for = "name">Name:</label>
            <input type = "text" id = "name" name = "name" required>
            <label for = "age">Age:</label>
            <input type = "number" id = "age" name = "age" required>
            <select name = "city" value = $city>
_END;
if ($cities=getCities()){
    foreach ($cities as $r2) {
        $cid = $r2['cid'];
        $cname = htmlspecialchars($r2['cname']);
        $s = "<option value = $cid>$cname</option>";
        echo $s;
    }
}
echo <<<_END
            </select>
            <button>Create</button>
        </form>
        _END;

?>
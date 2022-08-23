



<?php
//var_dump($results=getCityName(1));
//var_dump($results=select_all_villagers());

            /*    <input type="text" id="city-<?= $id ?>"
                    name="city" value="<?= $city ?>" required>
*/


if ($results=select_all_villagers()){
    echo "<div class = d-table><div class = d-tr><div class = d-th>ID</div><div class = d-th>Name</div><div class = d-th>Age</div><div class = d-th>City</div></div>";
    foreach ($results as $result) {
        $id=$result['id'];
        $name=$result['name'];
        $age=$result['age'];
        $city=$result['cid'];
        $cname=htmlspecialchars(getCityName($city));
        echo "<div class = d-tr><div class = d-td>$id</div><div class = d-td>$name</div><div class = d-td>$age</div><div class = d-td>$cname</div></div>";
    }
    echo "</div>";
}


?>
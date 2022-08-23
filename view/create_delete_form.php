<?php
echo <<<_END
        <form class = "delete" action = "." method = "POST">
            <input type = "hidden" name ="action" value ="delete">
            <label for = "id">ID:</label>
            <input type = "number" id = "id" name = "id" required>
            <button>Delete</button>
        </form>
        _END;

?>
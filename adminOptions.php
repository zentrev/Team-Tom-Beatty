<nav id='adminOptions'>
        <ul>
            <?php
            echo "<a href='addInsert.php/?page=".$page."&order=".$order."&writeType=insert'>Add </a>";
            echo "<a href='addInsert.php/?page=".$page."&order=".$order."&writeType=update&id=".$id."'> Edit </a>";
            echo "<a href='index.php?write_type=update&order=".$order."'> Delete </a>";
            ?>
        </ul>
    </nav>


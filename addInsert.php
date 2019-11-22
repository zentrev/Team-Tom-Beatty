<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style_sheets/dev.css">
    <title>Document</title>
</head>
<body>

    <?php
    $addingPage = filter_input(INPUT_GET, "page",FILTER_SANITIZE_STRING); 
    $writeType = filter_input(INPUT_GET, "writeType",FILTER_SANITIZE_STRING); 
    $order = filter_input(INPUT_GET, "order",FILTER_SANITIZE_STRING); 
    $id = filter_input(INPUT_GET, "id",FILTER_SANITIZE_STRING); 

    echo $addingPage." : ".$order;


    
    ?>

<div class="inputFields">
        <form class="forms" method="post" onsubmit="Submit()">
            
            <input type="hidden" id="writeType" value=<?php echo $writeType;?> />
            <input type="hidden" id="order" value=<?php echo $order;?> />
            <input type="hidden" id="id" value=<?php echo $id;?> />

            <input type="text" id="content" name="content" id="content" placeholder="Content"/>
            <select id="insertType" name="InsertKind">
                <option value="imageInsert">Image</option>
                <option value="textInsert">Text</option>
            </select>
            <input type="button" value="Submit" onClick="Submit()"/>
        </form>
    </div>
</body>
<script>console.log("hi");</script>

<script >
function Submit()
{
    var writeType = document.getElementById("writeType");
    var order = document.getElementById("order");
    var content = document.getElementById("content");
    var id = document.getElementById("id");

    var insertTypeSelection = document.getElementById("insertType");
    var insertType = insertTypeSelection.options[insertTypeSelection.selectedIndex].value;
    var ord = parseInt(order.value) + 1;
    location='../index.php?write_type='+writeType.value+'&insert_name='+insertType+"&content="+content.value+"&order="+(ord)+"&id="+parseInt(id.value);
}
</script>

</html>
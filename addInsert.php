<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $addingPage = filter_input(INPUT_GET, "page",FILTER_SANITIZE_STRING); 
    echo $addingPage;
    
    ?>

<div class="inputFields">
        <form method="post">
            <input type="text" name="content" id="content" placeholder="Content"/>
            <select name="InsertKind">
                <option value="imageInsert">Image</option>
                <option value="textInsert">Text</option>
            </select>
            <input type="submit" value="Submit"/>
        </form>
    </div>
</body>
</html>
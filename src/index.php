<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import - Export</title>
</head>

<body>
    <form action="includes/readSheet.php" method="post" enctype="multipart/form-data">
        <input type="file" name="sheet" id="sheet">
        <input type="text" name="tableName" id="tableName" placeholder="table name">
        <input type="number" name="columnCount" id="columnCount">
        <div class="columnForms"></div>
        <button type="submit">send</button>
    </form>
    <script src="js/main.js"></script>
</body>

</html>
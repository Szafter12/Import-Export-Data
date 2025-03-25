<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import - Export</title>
</head>

<body>
    <form enctype="multipart/form-data" id="form">
        <input type="file" name="sheet" id="sheet">
        <input type="text" name="tableName" id="tableName" placeholder="table name">
        <input type="number" name="columnCount" id="columnCount">
        <div class="columnForms"></div>
        <button type="submit" id="sendBtn">send</button>
    </form>
    <p class="error"></p>
    <script src="js/main.js"></script>
</body>

</html>
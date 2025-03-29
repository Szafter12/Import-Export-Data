<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import/Export Data App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #0cbaba;
            background-image: linear-gradient(315deg, #0cbaba 0%, #380036 74%);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            color: #fff;
        }
    </style>
</head>

<body class="mx-auto py-5 d-flex flex-column flex-lg-row align-items-start container gap-5">
    <form enctype="multipart/form-data" id="form" class="container mx-auto mt-5 d-flex flex-column align-items-center gap-5 border border-primary p-5 rounded-2 min-height-50">
        <h1>Export Excel File Data to Database</h1>
        <div class="form-group w-100 d-flex flex-column align-items-center gap-2">
            <label for="sheet" class="h6 align-self-start">Choose excel file</label>
            <input type="file" name="sheet" id="sheet" class="form-control">
        </div>
        <div class="form-group w-100 d-flex flex-column align-items-center gap-2">
            <label for="tableName" class="h6 align-self-start">Insert database table name</label>
            <input type="text" name="tableName" id="tableName" placeholder="table name" class="form-control w-100">
        </div>
        <div class="form-group w-100 d-flex flex-column align-items-center gap-2">
            <label for="columnCount" class="h6 align-self-start">Enter number of columns (excluding id, created_at and the like columns)</label>
            <input type="number" name="columnCount" id="columnCount" class="form-control w-100" placeholder="Enter number of columns">
        </div>
        <div class="columnForms d-flex flex-wrap gap-3 align-items-center justify-content-center"></div>
        <button type="submit" id="sendBtn" class="btn btn-primary align-self-end py-2 px-4">send</button>
    </form>

    <div class="container mx-auto mt-5 d-flex flex-column align-items-center gap-3 border border-primary p-5">
        <h2 class="mb-5">Respond will show here</h2>
        <p class="error text-danger fs-3"></p>
        <p class="success text-success fs-3"></p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>
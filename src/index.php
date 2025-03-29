<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import/Export Data App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="mx-auto py-5 d-flex flex-column flex-lg-row align-items-start container gap-5 min-vh-100">
    <section id="export" class="section active export">
        <form enctype="multipart/form-data" id="form" class="container mx-auto d-flex flex-column align-items-center gap-5 border border-primary p-5 rounded-2 min-height-50">
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
            <button type="submit" id="sendBtn" class="btn btn-primary align-self-end py-3 px-5">Export</button>
        </form>
    </section>

    <section id="import" class="section import">
        <form id="form2" class="container mx-auto d-flex flex-column align-items-center gap-5 border border-primary p-5 rounded-2 min-height-50">
            <h1>Import Database table data to excel file</h1>
            <div class="form-group w-100 d-flex flex-column align-items-center gap-2">
                <label for="tableName2" class="h6 align-self-start">Insert database table name</label>
                <input type="text" name="tableName2" id="tableName2" placeholder="table name" class="form-control w-100">
            </div>
            <div class="form-group w-100 d-flex flex-column align-items-center gap-2">
                <label for="columnCount2" class="h6 align-self-start">Enter number of columns (excluding id, created_at and the like columns)</label>
                <input type="number" name="columnCount2" id="columnCount2" class="form-control w-100" placeholder="Enter number of columns">
            </div>
            <div id="columnForms2" class="columnForms2 d-flex flex-wrap gap-3 align-items-center justify-content-center"></div>
            <button type="submit" id="sendBtn2" class="btn btn-primary align-self-end py-3 px-5">Import</button>
        </form>
    </section>


    <div class="d-flex flex-column w-100 gap-5 h-100">
        <div class="d-flex flex-column align-items-center gap-3 border rounded-2 border-primary p-5">
            <h2 class="mb-5">Respond will show here</h2>
            <p class="error text-danger fs-3"></p>
            <p class="success text-success fs-3"></p>
        </div>
        <div class="d-flex flex-column align-items-center gap-3 border rounded-2 border-primary p-5">
            <button class="setBtn btn btn-primary py-3 px-4" data-section="export">Export Excel file data to database</button>
            <button class="setBtn btn btn-primary py-3 px-4" data-section="import">Import Database table data to excel file</button>
        </div>
    </div>


    <script src="js/main.js"></script>
</body>

</html>
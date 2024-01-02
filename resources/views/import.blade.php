<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
<div class="container">

    <div class="card bg-light mt-3">

        <div class="card-header">
            Export Excel to database
        </div>
        <div class="card-body">
            <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
        </div>
    </div>
</div>
</body>
</html>

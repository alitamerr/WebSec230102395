<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Bootstrap Test</title>
 <link href="public/css/bootstrap.min.css" rel="stylesheet">
 <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

@php($j = 5)

<body>
 <div class="card m-4">
    <div class="card-header">Multiplication Table of {{$j}}</div>
    <div class="card-body">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, officia voluptate in vero deleniti culpa possimus numquam repellat dolores, ipsa earum, non eius minus? Ex amet reprehenderit exercitationem optio facere?</div>
        <table>
            <tr><td>5 * 1</td><td>5</td></tr>
        </table>
 </div>
</body>


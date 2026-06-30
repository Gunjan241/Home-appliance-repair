<?php

include '../includes/auth.php';
include '../config/db.php';

/*
ASCENDING ORDER
Oldest request first
*/

$result =
$conn->query("SELECT * FROM service_requests ORDER BY id ASC");

?>

<!DOCTYPE html>
<html>
<head>

<title>My Requests</title>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{

    background:#f4f7fc;
    padding:30px;

}

h1{

    color:#0d6efd;
    margin-bottom:30px;
    font-size:42px;

}

.table-box{

    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);

}

table{

    width:100%;
    border-collapse:collapse;

}

table th{

    background:#0d6efd;
    color:white;
    padding:20px;
    text-align:left;
    font-size:17px;

}

table td{

    padding:20px;
    border-bottom:1px solid #eee;
    vertical-align:middle;

}

tr:hover{

    background:#f8f9ff;

}

img{

    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:10px;
    border:2px solid #ddd;

}

.status{

    padding:8px 18px;
    border-radius:20px;
    color:white;
    font-size:14px;
    display:inline-block;
    min-width:120px;
    text-align:center;
    white-space:nowrap;

}

.pending{

    background:#f59e0b;

}

.progress{

    background:#0d6efd;

}

.completed{

    background:#198754;

}

.problem{

    max-width:300px;
    line-height:28px;

}

@media(max-width:768px){

    body{

        padding:15px;

    }

    h1{

        font-size:32px;

    }

    table{

        min-width:1000px;

    }

}

</style>

</head>

<body>

<h1>

<i class="fa-solid fa-list"></i>
My Service Requests

</h1>

<div class="table-box">

<table>

<tr>

<th>ID</th>
<th>Appliance</th>
<th>Brand</th>
<th>Problem</th>
<th>Image</th>
<th>Status</th>

</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

$statusClass = "pending";

if($row['status'] == 'In Progress'){
    $statusClass = "progress";
}

if($row['status'] == 'Completed'){
    $statusClass = "completed";
}

?>

<tr>

<td>

<?php echo $row['id']; ?>

</td>

<td>

<?php echo $row['appliance']; ?>

</td>

<td>

<?php echo $row['brand']; ?>

</td>

<td class="problem">

<?php echo $row['problem']; ?>

</td>

<td>

<img src="../uploads/appliance_images/<?php echo $row['image']; ?>">

</td>

<td>

<span class="status <?php echo $statusClass; ?>">

<?php echo $row['status']; ?>

</span>

</td>

</tr>

<?php

}

}else{

echo "

<tr>

<td colspan='6'
style='text-align:center;
padding:40px;
color:red;
font-size:18px;'>

No Requests Found

</td>

</tr>

";

}

?>

</table>

</div>

</body>
</html>
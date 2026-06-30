<?php

session_start();

include '../config/db.php';
include '../includes/header.php';

/*
====================================
GET LOGGED IN TECHNICIAN ID
====================================
*/

$technician_id = $_SESSION['user_id'];

/*
====================================
GET ONLY ASSIGNED REQUESTS
====================================
*/

$query = mysqli_query($conn,
"SELECT * FROM service_requests
WHERE technician_id='$technician_id'
ORDER BY id DESC");

?>

<style>

body{

    background:#f4f6f9;
    font-family:Poppins,sans-serif;

}

.container{

    padding:40px;

}

.title{

    font-size:55px;
    font-weight:700;
    color:#0d6efd;
    margin-bottom:30px;

}

.table-box{

    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);

}

table{

    width:100%;
    border-collapse:collapse;

}

table th{

    background:#0d6efd;
    color:white;
    padding:20px;
    font-size:20px;
    text-align:left;

}

table td{

    padding:20px;
    border-bottom:1px solid #eee;
    font-size:18px;
    vertical-align:middle;

}

table tr:hover{

    background:#f8f9fa;

}

img{

    width:90px;
    height:90px;
    object-fit:cover;
    border-radius:12px;

}

.status{

    padding:10px 20px;
    border-radius:30px;
    color:white;
    font-weight:600;
    display:inline-block;
    min-width:120px;
    text-align:center;

}

.pending{

    background:#fd7e14;

}

.progress{

    background:#0dcaf0;

}

.completed{

    background:#198754;

}

.no-data{

    text-align:center;
    padding:50px;
    color:red;
    font-size:24px;
    font-weight:600;

}

@media(max-width:768px){

    .title{

        font-size:38px;

    }

    table th,
    table td{

        padding:12px;
        font-size:14px;

    }

    img{

        width:60px;
        height:60px;

    }

}

</style>

<div class="container">

<h1 class="title">

Assigned Requests

</h1>

<div class="table-box">

<table>

<tr>

<th>ID</th>
<th>Appliance</th>
<th>Brand</th>
<th>Problem</th>
<th>Address</th>
<th>Mobile</th>
<th>Image</th>
<th>Status</th>

</tr>

<?php

if(mysqli_num_rows($query) > 0){

while($row = mysqli_fetch_assoc($query)){

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

<td>

<?php echo $row['problem']; ?>

</td>

<td>

<?php echo $row['address']; ?>

</td>

<td>

<?php echo $row['mobile']; ?>

</td>

<td>

<img src="../uploads/appliance_images/<?php echo $row['image']; ?>">

</td>

<td>

<?php

if($row['status'] == 'Pending'){

echo "<span class='status pending'>Pending</span>";

}

elseif($row['status'] == 'In Progress'){

echo "<span class='status progress'>In Progress</span>";

}

elseif($row['status'] == 'Completed'){

echo "<span class='status completed'>Completed</span>";

}

?>

</td>

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="8" class="no-data">

No Assigned Requests Found

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

<?php include '../includes/footer.php'; ?>
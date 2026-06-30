<?php

include '../includes/auth.php';

?>

<!DOCTYPE html>
<html>
<head>

<title>View Feedback</title>

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
    padding:18px;
    text-align:left;

}

table td{

    padding:18px;
    border-bottom:1px solid #eee;

}

tr:hover{

    background:#f8f9ff;

}

.message{

    max-width:500px;
    line-height:28px;

}

</style>

</head>

<body>

<h1>

<i class="fa-solid fa-comments"></i>
Customer Feedback

</h1>

<div class="table-box">

<table>

<tr>

<th>ID</th>
<th>Customer Name</th>
<th>Feedback Message</th>
<th>Date</th>

</tr>

<tr>

<td>1</td>

<td>Mit</td>

<td class="message">

Excellent Repair Service 👍

</td>

<td>

2026-06-01

</td>

</tr>

<tr>

<td>2</td>

<td>Gunjan</td>

<td class="message">

Technician arrived on time and fixed my washing machine quickly.

</td>

<td>

2026-06-01

</td>

</tr>

</table>

</div>

</body>
</html>
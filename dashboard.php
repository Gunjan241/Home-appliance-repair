<?php

include 'includes/auth.php';
include 'includes/header.php';
include 'config/db.php';

/*
=========================
TOTAL COUNTS
=========================
*/

$total_requests =
$conn->query("SELECT * FROM service_requests")->num_rows;

$total_customers =
$conn->query("SELECT * FROM users
WHERE role='customer'")->num_rows;

$total_technicians =
$conn->query("SELECT * FROM users
WHERE role='technician'")->num_rows;

$completed_services =
$conn->query("SELECT * FROM service_requests
WHERE status='Completed'")->num_rows;

?>

<style>

.container{

    padding:40px;

}

.welcome h1{

    font-size:60px;
    margin-bottom:15px;
    color:#111;

}

.welcome p{

    font-size:22px;
    color:#666;
    margin-bottom:40px;

}

.cards{

    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:30px;
    margin-bottom:40px;

}

.card{

    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    transition:0.3s;
    position:relative;
    overflow:hidden;

}

.card:hover{

    transform:translateY(-8px);

}

.card::before{

    content:'';
    position:absolute;
    left:0;
    top:0;
    width:8px;
    height:100%;

}

.blue::before{

    background:#0d6efd;

}

.green::before{

    background:#198754;

}

.orange::before{

    background:#fd7e14;

}

.red::before{

    background:#dc3545;

}

.card i{

    font-size:50px;
    margin-bottom:20px;
    color:#111;

}

.card h2{

    font-size:55px;
    margin-bottom:10px;
    color:#111;

}

.card p{

    font-size:24px;
    color:#666;
    margin-bottom:20px;

}

.btn-area{

    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-top:20px;

}

.btn{

    display:inline-block;
    padding:16px 28px;
    background:#0d6efd;
    color:white;
    text-decoration:none;
    border-radius:10px;
    font-size:18px;
    font-weight:600;
    transition:0.3s;

}

.btn:hover{

    transform:translateY(-2px);
    opacity:0.9;

}

.green-btn{

    background:#198754;

}

.orange-btn{

    background:#fd7e14;

}

@media(max-width:768px){

    .welcome h1{

        font-size:40px;

    }

    .card h2{

        font-size:40px;

    }

}

</style>

<div class="container">

<div class="welcome">

<h1>

Welcome,
<?php echo $_SESSION['name']; ?> 👋

</h1>

<p>

Role :
<b><?php echo $_SESSION['role']; ?></b>

</p>

</div>

<?php

/*
=========================
ADMIN DASHBOARD
=========================
*/

if($_SESSION['role'] == 'admin'){

?>

<div class="cards">

<!-- TOTAL REQUESTS -->

<div class="card blue">

<i class="fa-solid fa-toolbox"></i>

<h2>

<?php echo $total_requests; ?>

</h2>

<p>Total Service Requests</p>

</div>

<!-- TOTAL CUSTOMERS -->

<div class="card green">

<i class="fa-solid fa-users"></i>

<h2>

<?php echo $total_customers; ?>

</h2>

<p>Total Customers</p>

</div>

<!-- TOTAL TECHNICIANS -->

<div class="card orange">

<i class="fa-solid fa-user-gear"></i>

<h2>

<?php echo $total_technicians; ?>

</h2>

<p>Total Technicians</p>

</div>

<!-- COMPLETED SERVICES -->

<div class="card red">

<i class="fa-solid fa-circle-check"></i>

<h2>

<?php echo $completed_services; ?>

</h2>

<p>Completed Services</p>

</div>

</div>

<!-- BUTTONS -->

<div class="btn-area">

<a href="admin/dashboard.php"
class="btn">

Open Admin Panel

</a>

<a href="admin/assign_technician.php"
class="btn orange-btn">

Assign Technician

</a>

<a href="admin/view_feedback.php"
class="btn green-btn">

View Feedback

</a>

</div>

<?php } ?>

<?php

/*
=========================
CUSTOMER DASHBOARD
=========================
*/

if($_SESSION['role'] == 'customer'){

?>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-screwdriver-wrench"></i>

<h2>Book</h2>

<p>Book Appliance Service</p>

<a href="customer/book_service.php"
class="btn">

Open

</a>

</div>

<div class="card green">

<i class="fa-solid fa-list"></i>

<h2>My</h2>

<p>My Service Requests</p>

<a href="customer/my_requests.php"
class="btn">

Open

</a>

</div>

<div class="card orange">

<i class="fa-solid fa-star"></i>

<h2>Feed</h2>

<p>Give Feedback</p>

<a href="customer/feedback.php"
class="btn">

Open

</a>

</div>

</div>

<?php } ?>

<?php

/*
=========================
TECHNICIAN DASHBOARD
=========================
*/

if($_SESSION['role'] == 'technician'){

?>

<div class="cards">

<div class="card blue">

<i class="fa-solid fa-toolbox"></i>

<h2>Jobs</h2>

<p>Assigned Requests</p>

<a href="technician/assigned_requests.php"
class="btn">

Open

</a>

</div>

<div class="card green">

<i class="fa-solid fa-pen"></i>

<h2>Update</h2>

<p>Update Work Status</p>

<a href="technician/update_status.php"
class="btn">

Open

</a>

</div>

</div>

<?php } ?>

</div>

<?php include 'includes/footer.php'; ?>
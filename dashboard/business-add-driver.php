<!DOCTYPE html>
<html lang="en">
<head>

<!--
FILE: dashboard/business-add-driver.html

PURPOSE
Company adds a new driver under their company account.

FUTURE SUBMIT
../business/drivers/submit/add_business_driver_submit.php
-->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Movex | Add Company Driver</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<style>

.dashboard-form-grid{
display:grid;
grid-template-columns:1fr;
gap:16px;
}

.dashboard-form-group label{
font-weight:700;
margin-bottom:8px;
display:block;
}

.dashboard-form-group input,
.dashboard-form-group select{

width:100%;
padding:14px;
border-radius:12px;
border:1px solid var(--border);
background:#fcfff7;

}

@media(min-width:768px){

.dashboard-form-grid.two-col{
grid-template-columns:1fr 1fr;
}

}

</style>

</head>

<body>

<main class="dashboard-main">

<header class="dashboard-header">

<h1>Add Company Driver</h1>

<p>Register a driver under your company account.</p>

</header>


<section class="dashboard-content">

<div class="panel-card">

<form action="../business/drivers/submit/add_business_driver_submit.php" method="post">

<div class="dashboard-form-grid two-col">

<div class="dashboard-form-group">
<label>First Name</label>
<input type="text" name="first_name">
</div>

<div class="dashboard-form-group">
<label>Last Name</label>
<input type="text" name="last_name">
</div>

<div class="dashboard-form-group">
<label>Phone</label>
<input type="text" name="phone">
</div>

<div class="dashboard-form-group">
<label>Email</label>
<input type="email" name="email">
</div>

<div class="dashboard-form-group">
<label>Driver Pool</label>

<select name="driver_pool">

<option>Truck</option>
<option>Ajeigboro</option>
<option>Dispatch Rider</option>
<option>Tipper and Granite</option>

</select>

</div>

<div class="dashboard-form-group">
<label>Operating State</label>

<select name="state">

<option>Lagos</option>
<option>Ogun</option>
<option>Oyo</option>

</select>

</div>

<div class="dashboard-form-group">
<label>City</label>
<input type="text" name="city">
</div>

<div class="dashboard-form-group">
<label>Association Code</label>
<input type="text" name="association_code">
</div>

<div class="dashboard-form-group">
<label>Garage Code</label>
<input type="text" name="garage_code">
</div>

<div class="dashboard-form-group">
<label>Driver Status</label>

<select name="driver_status">

<option>Pending</option>
<option>Approved</option>

</select>

</div>

<div style="grid-column:1/-1">

<button class="btn-primary">Register Driver</button>

</div>

</div>

</form>

</div>

</section>

</main>

</body>
</html>
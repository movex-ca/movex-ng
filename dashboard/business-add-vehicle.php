<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Movex | Add Vehicle</title>

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

<h1>Add Company Vehicle</h1>

<p>Register a vehicle under the company fleet.</p>

</header>

<section class="dashboard-content">

<div class="panel-card">

<form action="../business/vehicles/submit/add_vehicle_submit.php" method="post">

<div class="dashboard-form-grid two-col">

<div class="dashboard-form-group">
<label>Plate Number</label>
<input type="text" name="plate_number">
</div>

<div class="dashboard-form-group">
<label>Vehicle Type</label>

<select name="vehicle_type">

<option>Truck</option>
<option>Tipper</option>
<option>Dispatch Bike</option>
<option>Cold Van</option>

</select>

</div>

<div class="dashboard-form-group">
<label>Vehicle Brand</label>
<input type="text" name="vehicle_brand">
</div>

<div class="dashboard-form-group">
<label>Vehicle Model</label>
<input type="text" name="vehicle_model">
</div>

<div class="dashboard-form-group">
<label>Year</label>
<input type="number" name="vehicle_year">
</div>

<div class="dashboard-form-group">
<label>Load Capacity</label>
<input type="text" name="capacity">
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
<label>Vehicle Pool</label>

<select name="vehicle_pool">

<option>Truck</option>
<option>Ajeigboro</option>
<option>Dispatch Rider</option>
<option>Tipper and Granite</option>

</select>

</div>

<div style="grid-column:1/-1">

<button class="btn-primary">
Register Vehicle
</button>

</div>

</div>

</form>

</div>

</section>

</main>

</body>
</html>
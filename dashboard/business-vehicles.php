<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Movex | Company Vehicles</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<style>

.vehicle-grid{
display:grid;
grid-template-columns:1fr;
gap:16px;
}

.vehicle-card{
background:#fcfff6;
border:1px solid #e7efca;
border-radius:16px;
padding:16px;
}

.vehicle-card h4{
margin-bottom:8px;
}

.vehicle-tag{
display:inline-block;
padding:6px 10px;
border-radius:999px;
background:#eef7d1;
font-size:12px;
font-weight:700;
margin-right:6px;
}

@media(min-width:768px){

.vehicle-grid{
grid-template-columns:repeat(2,1fr);
}

}

</style>

</head>

<body>

<main class="dashboard-main">

<header class="dashboard-header">

<h1>Company Vehicles</h1>

<p>Vehicles registered under your company account.</p>

</header>

<section class="dashboard-content">

<div class="vehicle-grid">

<div class="vehicle-card">

<h4>LAG-321-TR</h4>

<p>MAN Diesel TGX Truck</p>

<span class="vehicle-tag">Truck</span>
<span class="vehicle-tag">Ajeigboro</span>
<span class="vehicle-tag">Approved</span>

</div>

<div class="vehicle-card">

<h4>OGN-889-TP</h4>

<p>Tipper Truck</p>

<span class="vehicle-tag">Tipper</span>
<span class="vehicle-tag">Granite</span>
<span class="vehicle-tag">Active</span>

</div>

</div>

</section>

</main>

</body>
</html>
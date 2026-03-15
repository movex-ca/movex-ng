<!DOCTYPE html>
<html lang="en">
<head>

<!--
FILE: dashboard/business-drivers.html

PURPOSE
Company dashboard page to manage drivers registered under the business account.

HTML ONLY
Backend will be added later.

FUTURE TARGET
../business/drivers/submit/filter_business_drivers_submit.php
-->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Movex | Company Drivers</title>

<link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg">
<link rel="stylesheet" href="../assets/css/dashboard.css">

<style>

.table-wrap{
overflow-x:auto;
}

table{
width:100%;
min-width:1100px;
border-collapse:collapse;
}

th,td{
padding:14px;
border-bottom:1px solid #edf2dc;
font-size:14px;
text-align:left;
}

th{
background:#fbfff3;
color:var(--text-dark);
font-weight:700;
}

.status-tag{
display:inline-block;
padding:6px 10px;
border-radius:999px;
font-size:12px;
font-weight:700;
background:#eef7d1;
color:#5d7600;
}

.action-links{
display:flex;
gap:10px;
}

.action-links a{
text-decoration:none;
font-weight:700;
color:var(--accent-deep);
}

.toolbar-grid{
display:grid;
grid-template-columns:1fr;
gap:12px;
}

.toolbar-grid input,
.toolbar-grid select{
width:100%;
padding:13px;
border-radius:12px;
border:1px solid var(--border);
background:#fcfff7;
}

@media(min-width:900px){

.toolbar-grid{
grid-template-columns:2fr 1fr 1fr;
}

}

</style>
</head>

<body>

<div class="dashboard-layout">

<main class="dashboard-main">

<header class="dashboard-header">

<h1>Company Drivers</h1>

<p>Drivers registered under your company logistics account.</p>

</header>


<section class="dashboard-content">

<div class="panel-card">

<div class="panel-header">
<h3>Filter Drivers</h3>
</div>

<form action="../business/drivers/submit/filter_business_drivers_submit.php" method="get">

<div class="toolbar-grid">

<input type="text" name="search_driver" placeholder="Search driver name or phone">

<select name="driver_pool">

<option value="">All Pools</option>
<option>Truck</option>
<option>Ajeigboro</option>
<option>Dispatch Rider</option>
<option>Tipper and Granite</option>

</select>

<select name="status">

<option value="">All Status</option>
<option>Approved</option>
<option>Pending</option>
<option>Suspended</option>

</select>

</div>

</form>

</div>


<div class="panel-card">

<div class="panel-header">
<h3>Registered Drivers</h3>
</div>

<div class="table-wrap">

<table>

<thead>

<tr>

<th>Driver ID</th>
<th>Name</th>
<th>Phone</th>
<th>Vehicle Type</th>
<th>Pool</th>
<th>Status</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<tr>

<td>DRV-101</td>
<td>Kunle Adeyemi</td>
<td>+2348011111111</td>
<td>Truck</td>
<td>Ajeigboro</td>
<td><span class="status-tag">Approved</span></td>

<td>
<div class="action-links">
<a href="#">Profile</a>
<a href="#">Documents</a>
</div>
</td>

</tr>

<tr>

<td>DRV-102</td>
<td>Ibrahim Musa</td>
<td>+2348033333333</td>
<td>Tipper</td>
<td>Granite</td>
<td><span class="status-tag">Pending</span></td>

<td>
<div class="action-links">
<a href="#">Review</a>
<a href="#">Edit</a>
</div>
</td>

</tr>

</tbody>

</table>

</div>

</div>

</section>

</main>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-trips.html
        PURPOSE:
        Driver page for trip history and active trip records.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../driver/trips/submit/filter_trips_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Trips</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .toolbar-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .toolbar-grid input,
        .toolbar-grid select {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 13px 14px;
            outline: none;
            background: #fcfff7;
            font-size: 14px;
            color: var(--text-dark);
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 980px;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #edf2dc;
            font-size: 14px;
            vertical-align: top;
        }

        th {
            color: var(--text-dark);
            background: #fbfff3;
            font-weight: 700;
        }

        td {
            color: #5e6850;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-progress {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-complete {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-available {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .action-links {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .action-links a {
            text-decoration: none;
            color: var(--accent-deep);
            font-weight: 700;
            font-size: 13px;
        }

        @media (min-width: 900px) {
            .toolbar-grid {
                grid-template-columns: 2fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Driver Trips</strong>
            <span>This page is reserved for driver trip history, active jobs, and delivery records.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Driver Operations Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">DR</div>
                    <div class="profile-meta">
                        <h2>Driver Account</h2>
                        <p>Ajeigboro Pool</p>
                    </div>
                </div>
                <span class="role-badge">Driver Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="driver-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and trip activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="driver-trips.html">
                            <span class="menu-icon">🚚</span>
                            <span class="menu-text"><strong>My Trips</strong><span>Assigned and completed trips</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-earnings.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Earnings</strong><span>Trip income and summary</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="driver-vehicle-details.html">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text"><strong>Vehicle Details</strong><span>Manage vehicle information</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-documents.html">
                            <span class="menu-icon">📄</span>
                            <span class="menu-text"><strong>Documents</strong><span>Licence and verification docs</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="../forms/auth/login.html">
                            <span class="menu-icon">↩</span>
                            <span class="menu-text"><strong>Logout</strong><span>Return to login</span></span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-row">
                    <div class="header-left">
                        <button class="menu-toggle" data-menu-open aria-label="Open menu">☰</button>
                        <div class="page-heading">
                            <h1>My Trips</h1>
                            <p>Review active jobs, completed trips, and route history for your driver account.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Trip Records</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Trips</h3>
                                <p>Search by trip number, route, pool, or trip status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/trips/submit/filter_trips_submit.php
                        -->
                        <form action="../driver/trips/submit/filter_trips_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_trip" placeholder="Search by trip no, route, or order reference" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Ajeigboro</option>
                                    <option>Truck</option>
                                    <option>Dispatch Rider</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Available</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Trip Records</h3>
                                <p>Sample listing showing active and completed driver trips.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Trip No.</th>
                                        <th>Pool</th>
                                        <th>Route</th>
                                        <th>Customer / Company</th>
                                        <th>Goods Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TRP-2026-001</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos → Oyo</td>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Construction Materials</td>
                                        <td><span class="status-badge status-progress">In Progress</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Track</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRP-2026-002</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos → Ogun</td>
                                        <td>David Aina</td>
                                        <td>General Goods</td>
                                        <td><span class="status-badge status-complete">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRP-2026-003</td>
                                        <td>Truck</td>
                                        <td>Ogun → Lagos</td>
                                        <td>GreenFoods Distribution</td>
                                        <td>Food Supplies</td>
                                        <td><span class="status-badge status-available">Available</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Accept</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Trip Shortcuts</h3>
                                <p>Quick actions for common driver trip tasks.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>View Active Trip</h4>
                                <p>Open your current assigned trip and review order movement details.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Completed Trips</h4>
                                <p>Review finished jobs and use them later for earnings and statement summaries.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Proof of Delivery</h4>
                                <p>Open the future delivery completion and confirmation workflow.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
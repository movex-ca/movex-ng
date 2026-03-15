<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/business-orders.html
        PURPOSE:
        Business partner page for viewing orders linked to the partner account.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../business/orders/submit/filter_business_orders_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Orders</title>
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
            min-width: 1120px;
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

        .status-new,
        .status-progress,
        .status-complete,
        .status-pending {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-new {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .status-progress {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-complete {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-pending {
            background: #fff0f0;
            color: #b14343;
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
                grid-template-columns: 2fr 1fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Business Orders</strong>
            <span>This page is reserved for partner-company order tracking and operational review.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Business Partner Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">BP</div>
                    <div class="profile-meta">
                        <h2>Partner Company</h2>
                        <p>Logistics Business Account</p>
                    </div>
                </div>
                <span class="role-badge">Business Partner</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="business-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Business overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-profile.html">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text"><strong>Company Profile</strong><span>Business details and records</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="business-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders / Jobs</strong><span>Business delivery operations</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Registered Drivers</strong><span>Drivers under your company</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-vehicles.html">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text"><strong>Vehicles</strong><span>Manage company vehicles</span></span>
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
                            <h1>Business Orders</h1>
                            <p>Review operational jobs, order allocation, and order progress under your business account.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Partner Orders</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Business Orders</h3>
                                <p>Search by order number, pool, route, or current order status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../business/orders/submit/filter_business_orders_submit.php
                        -->
                        <form action="../business/orders/submit/filter_business_orders_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_order" placeholder="Search by order no, route, or company reference" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Ajeigboro</option>
                                    <option>Truck</option>
                                    <option>Tipper and Granite</option>
                                    <option>Frozen Foods</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>New</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Pending Review</option>
                                </select>
                                <select name="state_filter">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                    <option>Abuja - FCT</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Business Order Records</h3>
                                <p>Sample listing showing how partner-order records may appear inside the dashboard.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Pool</th>
                                        <th>Route</th>
                                        <th>Customer / Company</th>
                                        <th>Assigned Driver</th>
                                        <th>Vehicle</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>BIZ-ORD-001</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos → Oyo</td>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>LAG-123-TR</td>
                                        <td><span class="status-progress">In Progress</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Track</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BIZ-ORD-002</td>
                                        <td>Truck</td>
                                        <td>Ogun → Lagos</td>
                                        <td>David Aina</td>
                                        <td>Ibrahim Musa</td>
                                        <td>OGN-204-TK</td>
                                        <td><span class="status-complete">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BIZ-ORD-003</td>
                                        <td>Tipper and Granite</td>
                                        <td>Ogun → Lagos</td>
                                        <td>Granite Fleet Services</td>
                                        <td>Not Assigned</td>
                                        <td>LAG-890-TI</td>
                                        <td><span class="status-new">New</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Assign</a>
                                                <a href="#">Open</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BIZ-ORD-004</td>
                                        <td>Frozen Foods</td>
                                        <td>Lagos → Lagos</td>
                                        <td>GreenFoods Distribution</td>
                                        <td>Emeka Okoro</td>
                                        <td>COLD-009-FZ</td>
                                        <td><span class="status-pending">Pending Review</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Insurance</a>
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
                                <h3>Business Order Actions</h3>
                                <p>Quick actions for common partner-order tasks.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Assign Driver</h4>
                                <p>Open future order-assignment flow for approved drivers and vehicles.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Review Order Status</h4>
                                <p>Check current movement, delivery stage, and completion flow.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Insurance Check</h4>
                                <p>Verify insurance requirement before dispatching selected order types.</p>
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
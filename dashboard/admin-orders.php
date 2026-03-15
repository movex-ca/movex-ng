<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-orders.html
        PURPOSE:
        Admin page for viewing and managing all orders.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/orders/submit/filter_orders_submit.php
        - ../admin/orders/submit/order_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Orders</title>
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
            min-width: 1180px;
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

        .status-cancelled {
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
                grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Order Management</strong>
            <span>This page is reserved for viewing, filtering, and managing all platform orders.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Admin Control Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">AD</div>
                    <div class="profile-meta">
                        <h2>System Admin</h2>
                        <p>Movex Operations</p>
                    </div>
                </div>
                <span class="role-badge">Admin Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders</strong><span>All logistics orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-pools.html">
                            <span class="menu-icon">🧭</span>
                            <span class="menu-text"><strong>Pools</strong><span>Manage pool categories</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Drivers</strong><span>Manage driver accounts</span></span>
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
                            <h1>Order Management</h1>
                            <p>Track customer, company, and partner-related logistics orders across all pools.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Orders Centre</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Orders</h3>
                                <p>Search by order reference, customer, pool, state, and order status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/orders/submit/filter_orders_submit.php
                        -->
                        <form action="../admin/orders/submit/filter_orders_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_order" placeholder="Search by order no, customer, phone, or company" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Tipper and Granite</option>
                                    <option>Ajeigboro</option>
                                    <option>Petrol Tanker</option>
                                    <option>Frozen Foods</option>
                                    <option>General</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>New</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Cancelled</option>
                                </select>
                                <select name="pickup_state_filter">
                                    <option value="">All Pickup States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                    <option>Abuja - FCT</option>
                                </select>
                                <select name="account_type_filter">
                                    <option value="">All Account Types</option>
                                    <option>Individual Customer</option>
                                    <option>Company Client</option>
                                    <option>Business Partner</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Order Listing</h3>
                                <p>Sample listing showing how admin can monitor all order flows in one place.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Customer / Company</th>
                                        <th>Pool</th>
                                        <th>Pickup</th>
                                        <th>Drop-off</th>
                                        <th>Assigned Driver</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>ORD-2026-001</td>
                                        <td>David Aina</td>
                                        <td>Dispatch Rider</td>
                                        <td>Lagos</td>
                                        <td>Ogun</td>
                                        <td>Sade Bello</td>
                                        <td><span class="status-badge status-progress">In Progress</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Track</a>
                                                <a href="#">Update</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ORD-2026-002</td>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos</td>
                                        <td>Oyo</td>
                                        <td>Kunle Adeyemi</td>
                                        <td><span class="status-badge status-new">New</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Assign</a>
                                                <a href="#">Open</a>
                                                <a href="#">Pricing</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ORD-2026-003</td>
                                        <td>GreenFoods Distribution</td>
                                        <td>Frozen Foods</td>
                                        <td>Ogun</td>
                                        <td>Lagos</td>
                                        <td>Emeka Okoro</td>
                                        <td><span class="status-badge status-complete">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ORD-2026-004</td>
                                        <td>Granite Fleet Services</td>
                                        <td>Tipper and Granite</td>
                                        <td>Ogun</td>
                                        <td>Lagos</td>
                                        <td>Not Assigned</td>
                                        <td><span class="status-badge status-cancelled">Cancelled</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Reason</a>
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
                                <h3>Order Actions</h3>
                                <p>Common admin actions that can later connect to live order workflows.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Assign Driver</h4>
                                <p>Select a qualified driver from the correct pool and operating state.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Update Status</h4>
                                <p>Move orders through new, in-progress, completed, or cancelled states.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Check Insurance</h4>
                                <p>Confirm whether the order requires insurance based on pool and request type.</p>
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
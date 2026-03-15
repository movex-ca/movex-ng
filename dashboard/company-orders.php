<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-orders.html
        PURPOSE:
        Company client page for listing and tracking company orders.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../company/orders/submit/filter_company_orders_submit.php
        - ../company/orders/submit/company_order_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Orders</title>
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
            min-width: 1100px;
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
                grid-template-columns: 2fr 1fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Company Orders</strong>
            <span>This page is reserved for company order listing, tracking, and internal review.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Company Client Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">CC</div>
                    <div class="profile-meta">
                        <h2>Company Account</h2>
                        <p>Corporate Service User</p>
                    </div>
                </div>
                <span class="role-badge">Company Client</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Company overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Company Order</strong><span>Create a company logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="company-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Company Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-billing.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Billing / Payments</strong><span>Invoices and payments</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Company</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-authorized-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Authorized Users</strong><span>Manage staff access</span></span>
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
                            <h1>Company Orders</h1>
                            <p>Review all company-created logistics requests, statuses, and assigned drivers.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Order List</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Company Orders</h3>
                                <p>Search by order number, department, pool, or current order status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/orders/submit/filter_company_orders_submit.php
                        -->
                        <form action="../company/orders/submit/filter_company_orders_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_order" placeholder="Search by order no, department, or reference" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Ajeigboro</option>
                                    <option>Frozen Foods</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>New</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Cancelled</option>
                                </select>
                                <select name="department_filter">
                                    <option value="">All Departments</option>
                                    <option>Logistics</option>
                                    <option>Procurement</option>
                                    <option>Finance</option>
                                    <option>Operations</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Company Order Records</h3>
                                <p>Sample listing showing how company-based orders may appear inside the dashboard.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Department</th>
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
                                        <td>CORD-2026-001</td>
                                        <td>Logistics</td>
                                        <td>Truck</td>
                                        <td>Lagos</td>
                                        <td>Ogun</td>
                                        <td>Kunle Adeyemi</td>
                                        <td><span class="status-badge status-progress">In Progress</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Track</a>
                                                <a href="#">Details</a>
                                                <a href="#">Invoice</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CORD-2026-002</td>
                                        <td>Procurement</td>
                                        <td>Frozen Foods</td>
                                        <td>Ogun</td>
                                        <td>Lagos</td>
                                        <td>Emeka Okoro</td>
                                        <td><span class="status-badge status-complete">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CORD-2026-003</td>
                                        <td>Operations</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos</td>
                                        <td>Oyo</td>
                                        <td>Not Assigned</td>
                                        <td><span class="status-badge status-new">New</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Edit</a>
                                                <a href="#">Cancel</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CORD-2026-004</td>
                                        <td>Finance</td>
                                        <td>Dispatch Rider</td>
                                        <td>Abuja - FCT</td>
                                        <td>Abuja - FCT</td>
                                        <td>Not Assigned</td>
                                        <td><span class="status-badge status-cancelled">Cancelled</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Reason</a>
                                                <a href="#">History</a>
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
                                <h3>Company Order Actions</h3>
                                <p>Common company-side actions that can later connect to backend workflows.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Track Order</h4>
                                <p>Open detailed tracking view for any active company order.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Repeat Order</h4>
                                <p>Create a new request based on a previous company logistics order.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>View Invoice</h4>
                                <p>Open billing information connected to the selected company order.</p>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-orders.html
        PURPOSE:
        User page for listing and tracking personal orders.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../user/orders/submit/filter_user_orders_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | My Orders</title>
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
                grid-template-columns: 2fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>My Orders</strong>
            <span>This page is reserved for user order history, tracking, and current order records.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Nigeria Logistics Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">AO</div>
                    <div class="profile-meta">
                        <h2>Alao Odeleye</h2>
                        <p>Customer Account</p>
                    </div>
                </div>
                <span class="role-badge">User Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="user-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Order</strong><span>Create logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="user-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>My Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Account</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-profile.html">
                            <span class="menu-icon">👤</span>
                            <span class="menu-text"><strong>Profile</strong><span>Manage account details</span></span>
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
                            <h1>My Orders</h1>
                            <p>Review your order history, current deliveries, and tracking details.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Order Records</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter My Orders</h3>
                                <p>Search by order number, pool category, or current order status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/orders/submit/filter_user_orders_submit.php
                        -->
                        <form action="../user/orders/submit/filter_user_orders_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_order" placeholder="Search by order no or goods type" />
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
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Order List</h3>
                                <p>Sample listing showing how a user can review their order history inside the dashboard.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order No.</th>
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
                                        <td>Dispatch Rider</td>
                                        <td>Lagos</td>
                                        <td>Ogun</td>
                                        <td>Sade Bello</td>
                                        <td><span class="status-badge status-progress">In Progress</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Track</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ORD-2026-008</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos</td>
                                        <td>Oyo</td>
                                        <td>Kunle Adeyemi</td>
                                        <td><span class="status-badge status-complete">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">Repeat</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ORD-2026-014</td>
                                        <td>Truck</td>
                                        <td>Ogun</td>
                                        <td>Lagos</td>
                                        <td>Not Assigned</td>
                                        <td><span class="status-badge status-new">New</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Edit</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ORD-2026-020</td>
                                        <td>Frozen Foods</td>
                                        <td>Lagos</td>
                                        <td>Lagos</td>
                                        <td>Not Assigned</td>
                                        <td><span class="status-badge status-cancelled">Cancelled</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Reason</a>
                                                <a href="#">Repeat</a>
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
                                <h3>Order Shortcuts</h3>
                                <p>Quick actions for common order-related tasks.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="user-new-order.html" class="quick-card">
                                <h4>Create New Order</h4>
                                <p>Start a new delivery or logistics request from your dashboard.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Track Current Order</h4>
                                <p>Open the live status of your active delivery or assigned driver record.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Repeat Previous Order</h4>
                                <p>Reuse a previous order structure for faster booking next time.</p>
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
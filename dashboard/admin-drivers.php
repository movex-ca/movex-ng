<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-drivers.html
        PURPOSE:
        Admin driver management page.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE TARGETS:
        - Driver search/filter
        - Driver approval actions
        - Driver profile open page
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Drivers</title>
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
            min-width: 860px;
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

        .status-approved {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-review {
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
                grid-template-columns: 2fr 1fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Driver Management</strong>
            <span>This page is reserved for driver filtering, approval review, and admin actions.</span>
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
                <div class="menu-group-title">Overview</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Accounts</div>
                <ul class="menu-list">
                    <li class="menu-item active">
                        <a href="admin-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Drivers</strong><span>Manage driver accounts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Customers</strong><span>Manage customer accounts</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-pools.html">
                            <span class="menu-icon">🧭</span>
                            <span class="menu-text"><strong>Pools</strong><span>Manage pool categories</span></span>
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
                            <h1>Driver Management</h1>
                            <p>Review, filter, approve, and manage registered drivers.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Admin Drivers</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Driver Search and Filter</h3>
                                <p>Use these fields to narrow down driver records by state, pool, and status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/drivers/driver_filter_submit.php
                        -->
                        <form action="../admin/drivers/driver_filter_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_driver" placeholder="Search by name, email, phone, or serial no" />
                                <select name="filter_state">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Abuja - FCT</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                </select>
                                <select name="filter_pool">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Tipper and Granite</option>
                                    <option>Ajeigboro</option>
                                    <option>Petrol Tanker</option>
                                    <option>Frozen Foods</option>
                                    <option>General</option>
                                </select>
                                <select name="filter_status">
                                    <option value="">All Status</option>
                                    <option>Approved</option>
                                    <option>Pending</option>
                                    <option>Under Review</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Registered Drivers</h3>
                                <p>Sample listing showing how driver management can appear inside the admin dashboard.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Driver</th>
                                        <th>Phone</th>
                                        <th>Pool</th>
                                        <th>State of Operation</th>
                                        <th>City / Town</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kunle Adeyemi</td>
                                        <td>+2348011111111</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos</td>
                                        <td>Agege</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Edit</a>
                                                <a href="#">Suspend</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ibrahim Musa</td>
                                        <td>+2348022222222</td>
                                        <td>Truck</td>
                                        <td>Ogun</td>
                                        <td>Abeokuta</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Approve</a>
                                                <a href="#">Reject</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Emeka Okoro</td>
                                        <td>+2348033333333</td>
                                        <td>Frozen Foods</td>
                                        <td>Rivers</td>
                                        <td>Port Harcourt</td>
                                        <td><span class="status-badge status-review">Under Review</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Documents</a>
                                                <a href="#">Update</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sade Bello</td>
                                        <td>+2348044444444</td>
                                        <td>Dispatch Rider</td>
                                        <td>Lagos</td>
                                        <td>Yaba</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Trips</a>
                                                <a href="#">Payouts</a>
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
                                <h3>Approval Shortcuts</h3>
                                <p>Quick access cards for the next admin steps.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Pending Approvals</h4>
                                <p>Open the list of drivers waiting for admin review and action.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Association Tagging</h4>
                                <p>Link approved drivers to recognized associations and motor garages.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Pool Assignment</h4>
                                <p>Confirm or adjust driver pool classification after document review.</p>
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
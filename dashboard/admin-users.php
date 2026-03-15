<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-users.html
        PURPOSE:
        Admin page for viewing all users across roles.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../admin/users/submit/filter_users_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Users</title>
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

        .role-badge-small {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eefceb;
            color: #2d7a2d;
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
            <strong>User Directory</strong>
            <span>This page is reserved for viewing all users across customer, driver, partner, and company roles.</span>
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
                <div class="menu-group-title">Accounts</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Users</strong><span>All account roles</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Drivers</strong><span>Manage driver accounts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-company-clients.html">
                            <span class="menu-icon">🏬</span>
                            <span class="menu-text"><strong>Company Clients</strong><span>Manage service companies</span></span>
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
                            <h1>User Directory</h1>
                            <p>Search and review all account roles across the platform from one admin page.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">All Users</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Users</h3>
                                <p>Search across account type, status, location, and identity fields.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/users/submit/filter_users_submit.php
                        -->
                        <form action="../admin/users/submit/filter_users_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_user" placeholder="Search by name, email, phone, or code" />
                                <select name="role_filter">
                                    <option value="">All Roles</option>
                                    <option>Customer</option>
                                    <option>Driver</option>
                                    <option>Business Partner</option>
                                    <option>Company Client</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Active</option>
                                    <option>Pending</option>
                                    <option>Suspended</option>
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
                                <h3>User Records</h3>
                                <p>Sample listing showing how multiple account roles may appear together.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name / Company</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Alao Odeleye</td>
                                        <td>user@example.com</td>
                                        <td>+2348012345678</td>
                                        <td><span class="role-badge-small">Customer</span></td>
                                        <td>Lagos</td>
                                        <td><span class="status-badge">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Orders</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kunle Adeyemi</td>
                                        <td>driver@example.com</td>
                                        <td>+2348011111111</td>
                                        <td><span class="role-badge-small">Driver</span></td>
                                        <td>Lagos</td>
                                        <td><span class="status-badge">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Trips</a>
                                                <a href="#">Docs</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>ops@agegeload.com</td>
                                        <td>+2348098765432</td>
                                        <td><span class="role-badge-small">Business Partner</span></td>
                                        <td>Lagos</td>
                                        <td><span class="status-badge">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Profile</a>
                                                <a href="#">Drivers</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>admin@primebuild.com</td>
                                        <td>+2348090000000</td>
                                        <td><span class="role-badge-small">Company Client</span></td>
                                        <td>Lagos</td>
                                        <td><span class="status-badge">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Orders</a>
                                                <a href="#">Billing</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
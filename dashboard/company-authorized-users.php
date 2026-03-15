<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-authorized-users.html
        PURPOSE:
        Company client page for managing authorized users.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../company/users/submit/add_authorized_user_submit.php
        - ../company/users/submit/filter_authorized_user_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Authorized Users</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .dashboard-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .dashboard-form-group input,
        .dashboard-form-group select {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px;
            outline: none;
            font-size: 14px;
            background: #fcfff7;
            color: var(--text-dark);
        }

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

        .role-pill {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
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
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .toolbar-grid {
                grid-template-columns: 2fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Authorized Users</strong>
            <span>This page is reserved for adding and managing company staff allowed to place orders.</span>
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
                        <a href="#">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Company Order</strong><span>Create a company order</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
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
                            <h1>Authorized Users</h1>
                            <p>Add and manage company staff who can place orders under the company account.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Company Users</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add Authorized User</h3>
                                <p>Use this form to add a company staff member with controlled account access.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/users/submit/add_authorized_user_submit.php
                        -->
                        <form action="../company/users/submit/add_authorized_user_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="user_first_name">First Name</label>
                                    <input type="text" id="user_first_name" name="first_name" placeholder="Enter first name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="user_last_name">Last Name</label>
                                    <input type="text" id="user_last_name" name="last_name" placeholder="Enter last name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="user_email">Email Address</label>
                                    <input type="email" id="user_email" name="email" placeholder="Enter email address" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="user_phone">Phone Number</label>
                                    <input type="text" id="user_phone" name="phone_number" placeholder="+2348012345678" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="department">Department</label>
                                    <input type="text" id="department" name="department" placeholder="Enter department" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="access_role">Access Role</label>
                                    <select id="access_role" name="access_role">
                                        <option value="">Select role</option>
                                        <option value="order_creator">Order Creator</option>
                                        <option value="order_approver">Order Approver</option>
                                        <option value="billing_viewer">Billing Viewer</option>
                                        <option value="admin_contact">Admin Contact</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Add Authorized User</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Search Authorized Users</h3>
                                <p>Search and filter authorized company staff below.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/users/submit/filter_authorized_user_submit.php
                        -->
                        <form action="../company/users/submit/filter_authorized_user_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_user" placeholder="Search by name, email, or phone number" />
                                <select name="role_filter">
                                    <option value="">All Roles</option>
                                    <option>Order Creator</option>
                                    <option>Order Approver</option>
                                    <option>Billing Viewer</option>
                                    <option>Admin Contact</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Authorized User List</h3>
                                <p>Sample listing showing staff users operating under the company account.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Department</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>David Johnson</td>
                                        <td>david@company.com</td>
                                        <td>+2348011111111</td>
                                        <td>Logistics</td>
                                        <td><span class="role-pill">Order Creator</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Edit</a>
                                                <a href="#">Disable</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Grace Ahmed</td>
                                        <td>grace@company.com</td>
                                        <td>+2348022222222</td>
                                        <td>Procurement</td>
                                        <td><span class="role-pill">Order Approver</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Update</a>
                                                <a href="#">Permissions</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tunde Bello</td>
                                        <td>tunde@company.com</td>
                                        <td>+2348033333333</td>
                                        <td>Finance</td>
                                        <td><span class="role-pill">Billing Viewer</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Edit</a>
                                                <a href="#">Status</a>
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
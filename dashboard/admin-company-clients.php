<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-company-clients.html
        PURPOSE:
        Admin page for managing company client accounts.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/company-clients/submit/filter_company_clients_submit.php
        - ../admin/company-clients/submit/company_client_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Company Clients</title>
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
                grid-template-columns: 2fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Company Client Management</strong>
            <span>This page is reserved for managing company client accounts, promo status, and approval flow.</span>
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
                        <a href="admin-company-clients.html">
                            <span class="menu-icon">🏬</span>
                            <span class="menu-text"><strong>Company Clients</strong><span>Manage service companies</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-student-promos.html">
                            <span class="menu-icon">🎓</span>
                            <span class="menu-text"><strong>Student Promo Approvals</strong><span>Review student requests</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Drivers</strong><span>Manage driver accounts</span></span>
                        </a>
                    </li>
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
                            <h1>Company Client Management</h1>
                            <p>Review company clients, approval status, order volume, and promo eligibility.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Company Accounts</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Search Company Clients</h3>
                                <p>Search and filter company accounts by status, state, and category.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/company-clients/submit/filter_company_clients_submit.php
                        -->
                        <form action="../admin/company-clients/submit/filter_company_clients_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_company" placeholder="Search by company name, RC number, email, or phone" />
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Approved</option>
                                    <option>Pending</option>
                                    <option>Under Review</option>
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
                                <h3>Company Client List</h3>
                                <p>Sample listing showing how company client records can appear in admin pages.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Contact</th>
                                        <th>State</th>
                                        <th>Order Volume</th>
                                        <th>Promo Status</th>
                                        <th>Approval Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>admin@primebuild.com</td>
                                        <td>Lagos</td>
                                        <td>High</td>
                                        <td>Eligible</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Orders</a>
                                                <a href="#">Promo</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>GreenFoods Distribution</td>
                                        <td>ops@greenfoods.com</td>
                                        <td>Ogun</td>
                                        <td>Medium</td>
                                        <td>Pending Review</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Approve</a>
                                                <a href="#">Reject</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CityParts Industrial</td>
                                        <td>logistics@cityparts.com</td>
                                        <td>Abuja - FCT</td>
                                        <td>Low</td>
                                        <td>Not Assigned</td>
                                        <td><span class="status-badge status-review">Under Review</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Contacts</a>
                                                <a href="#">Billing</a>
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
                                <h3>Admin Company Actions</h3>
                                <p>Common actions that can later connect to backend workflows.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Approve Company</h4>
                                <p>Approve a company client account for full operational use on the platform.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Promo Assignment</h4>
                                <p>Attach promo class or company discount status after internal review.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Authorized Users</h4>
                                <p>Review company-linked users and account access structure.</p>
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
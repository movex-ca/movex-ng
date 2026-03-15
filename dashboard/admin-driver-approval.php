<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-driver-approval.html
        PURPOSE:
        Admin page for reviewing and approving driver accounts and documents.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/driver-approval/submit/filter_driver_approval_submit.php
        - ../admin/driver-approval/submit/driver_approval_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Driver Approval</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .stats-grid-small {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
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
            min-width: 1160px;
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

        .status-pending,
        .status-approved,
        .status-rejected,
        .status-review {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-approved {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-rejected {
            background: #fff0f0;
            color: #b14343;
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

        @media (min-width: 768px) {
            .stats-grid-small {
                grid-template-columns: repeat(4, 1fr);
            }
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
            <strong>Driver Approval Centre</strong>
            <span>This page is reserved for approving drivers, checking documents, and account readiness review.</span>
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
                <div class="menu-group-title">Approvals</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Users</strong><span>All account roles</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-driver-approval.html">
                            <span class="menu-icon">✅</span>
                            <span class="menu-text"><strong>Driver Approval</strong><span>Review driver accounts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders</strong><span>All logistics orders</span></span>
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
                            <h1>Driver Approval Centre</h1>
                            <p>Review driver registration, business-linked submissions, and approval readiness by pool and state.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Driver Review</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">32</div>
                            <div class="stat-note">Waiting for admin action</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Approved</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">356</div>
                            <div class="stat-note">Approved active drivers</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Under Review</span>
                                <span class="stat-icon">🔎</span>
                            </div>
                            <div class="stat-value">14</div>
                            <div class="stat-note">Documents or vehicle checks ongoing</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Rejected</span>
                                <span class="stat-icon">⛔</span>
                            </div>
                            <div class="stat-value">9</div>
                            <div class="stat-note">Rejected or incomplete records</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Driver Approval Queue</h3>
                                <p>Search by name, partner company, pool, state, or approval state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/driver-approval/submit/filter_driver_approval_submit.php
                        -->
                        <form action="../admin/driver-approval/submit/filter_driver_approval_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_driver_approval" placeholder="Search by name, phone, company, or driver ref" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Ajeigboro</option>
                                    <option>Tipper and Granite</option>
                                </select>
                                <select name="state_filter">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                    <option>Abuja - FCT</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Under Review</option>
                                    <option>Rejected</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Driver Approval Records</h3>
                                <p>Sample listing showing how driver review records may appear later.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Driver Ref</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Pool</th>
                                        <th>State</th>
                                        <th>Submitted By</th>
                                        <th>Status</th>
                                        <th>Documents</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DRV-2026-001</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>+2348011111111</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos</td>
                                        <td>Agege Load Movers Ltd</td>
                                        <td><span class="status-pending">Pending</span></td>
                                        <td>Complete</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Approve</a>
                                                <a href="#">Review</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DRV-2026-002</td>
                                        <td>Sade Bello</td>
                                        <td>+2348022222222</td>
                                        <td>Dispatch Rider</td>
                                        <td>Lagos</td>
                                        <td>Self Registered</td>
                                        <td><span class="status-review">Under Review</span></td>
                                        <td>Pending ID</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Inspect</a>
                                                <a href="#">Notify</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DRV-2026-003</td>
                                        <td>Ibrahim Musa</td>
                                        <td>+2348033333333</td>
                                        <td>Truck</td>
                                        <td>Ogun</td>
                                        <td>Granite Fleet Services</td>
                                        <td><span class="status-approved">Approved</span></td>
                                        <td>Complete</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Profile</a>
                                                <a href="#">Trips</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DRV-2026-004</td>
                                        <td>Emeka Okoro</td>
                                        <td>+2348044444444</td>
                                        <td>Frozen Foods</td>
                                        <td>Abuja - FCT</td>
                                        <td>ColdMove Transport</td>
                                        <td><span class="status-rejected">Rejected</span></td>
                                        <td>Vehicle Paper Missing</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Reason</a>
                                                <a href="#">Re-open</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--
                        FUTURE SUBMISSION TARGET:
                        ../admin/driver-approval/submit/driver_approval_action_submit.php
                    -->
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
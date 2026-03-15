<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-business-partners.html
        PURPOSE:
        Admin page for managing business logistics partner accounts.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/business-partners/submit/filter_business_partners_submit.php
        - ../admin/business-partners/submit/business_partner_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Business Partners</title>
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
            <strong>Business Partner Management</strong>
            <span>This page is reserved for reviewing partner companies, approvals, pools, and linked drivers.</span>
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
                        <a href="admin-business-partners.html">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text"><strong>Business Partners</strong><span>Manage partner companies</span></span>
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

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders</strong><span>All logistics orders</span></span>
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
                            <h1>Business Partner Management</h1>
                            <p>Review partner businesses, approval status, pool coverage, and linked drivers.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Partner Accounts</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Search Business Partners</h3>
                                <p>Search by company name, RC number, email, pool coverage, or approval status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/business-partners/submit/filter_business_partners_submit.php
                        -->
                        <form action="../admin/business-partners/submit/filter_business_partners_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_partner" placeholder="Search by company name, RC number, email, or phone" />
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Approved</option>
                                    <option>Pending</option>
                                    <option>Under Review</option>
                                </select>
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Ajeigboro</option>
                                    <option>Truck</option>
                                    <option>Tipper and Granite</option>
                                    <option>Frozen Foods</option>
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
                                <h3>Business Partner List</h3>
                                <p>Sample listing showing how business partner records can appear in admin control.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Business Name</th>
                                        <th>RC Number</th>
                                        <th>Contact</th>
                                        <th>State</th>
                                        <th>Pools</th>
                                        <th>Drivers</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>RC-2093341</td>
                                        <td>ops@agegeload.com</td>
                                        <td>Lagos</td>
                                        <td>Ajeigboro, Truck</td>
                                        <td>28</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Drivers</a>
                                                <a href="#">Commissions</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Granite Fleet Services</td>
                                        <td>RC-1755209</td>
                                        <td>admin@granitefleet.com</td>
                                        <td>Ogun</td>
                                        <td>Tipper and Granite</td>
                                        <td>16</td>
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
                                        <td>ColdMove Transport</td>
                                        <td>RC-1839472</td>
                                        <td>support@coldmove.com</td>
                                        <td>Abuja - FCT</td>
                                        <td>Frozen Foods</td>
                                        <td>9</td>
                                        <td><span class="status-badge status-review">Under Review</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Vehicles</a>
                                                <a href="#">Documents</a>
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
                                <h3>Business Partner Actions</h3>
                                <p>Common admin actions that can later connect to approval and compliance workflows.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Approve Partner</h4>
                                <p>Approve a logistics business to operate on one or more Movex pools.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Review Drivers</h4>
                                <p>Open drivers submitted under a business partner for admin verification.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Check Vehicles</h4>
                                <p>Review company vehicles tied to the business partner account.</p>
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
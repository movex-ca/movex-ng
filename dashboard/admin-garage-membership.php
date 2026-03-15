<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-garage-membership.html
        PURPOSE:
        Admin page for mapping drivers to garage codes and reviewing garage-linked records.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/garage-membership/submit/tag_garage_member_submit.php
        - ../admin/garage-membership/submit/filter_garage_membership_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Garage Membership</title>
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
        .dashboard-form-group select,
        .dashboard-form-group textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fcfff7;
            color: var(--text-dark);
            outline: none;
            font-size: 14px;
        }

        .dashboard-form-group textarea {
            min-height: 90px;
            resize: vertical;
        }

        .toolbar-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .toolbar-grid input,
        .toolbar-grid select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fcfff7;
            color: var(--text-dark);
            outline: none;
            font-size: 14px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 1140px;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #edf2dc;
            font-size: 14px;
            vertical-align: top;
        }

        th {
            background: #fbfff3;
            color: var(--text-dark);
            font-weight: 700;
        }

        td {
            color: #5e6850;
        }

        .status-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            background: #eef7d1;
            color: #5d7600;
            font-size: 12px;
            font-weight: 700;
        }

        .action-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action-links a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
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
            <strong>Garage Membership</strong>
            <span>This page is reserved for mapping drivers to garage codes and tracking garage membership status.</span>
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
                <div class="menu-group-title">Associations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-associations.html">
                            <span class="menu-icon">🤝</span>
                            <span class="menu-text"><strong>Associations</strong><span>Recognized groups and codes</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-association-members.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Association Members</strong><span>Tagged members under associations</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-garages.html">
                            <span class="menu-icon">🏚️</span>
                            <span class="menu-text"><strong>Garages</strong><span>Garage code management</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-garage-membership.html">
                            <span class="menu-icon">🧾</span>
                            <span class="menu-text"><strong>Garage Membership</strong><span>Driver-garage mapping</span></span>
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
                            <h1>Garage Membership</h1>
                            <p>Map drivers to recognized garage codes so admin can track routing, clusters, and local reach.</p>
                        </div>
                    </div>
                    <div class="header-right">
                        <span class="header-chip">Garage Mapping</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Tag Driver to Garage</h3>
                                <p>Assign a driver to a recognized garage code and maintain membership control.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/garage-membership/submit/tag_garage_member_submit.php
                        -->
                        <form action="../admin/garage-membership/submit/tag_garage_member_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="driver_ref">Driver Reference</label>
                                    <input type="text" id="driver_ref" name="driver_ref" placeholder="Enter driver ID or reference" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="driver_name">Driver Name</label>
                                    <input type="text" id="driver_name" name="driver_name" placeholder="Enter driver name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_ref">Garage</label>
                                    <select id="garage_ref" name="garage_ref">
                                        <option value="">Select garage</option>
                                        <option>Agege Main Yard</option>
                                        <option>Ajegunle Load Park</option>
                                        <option>Abeokuta Quarry Base</option>
                                        <option>Ibadan Transit Yard</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_member_status">Membership Status</label>
                                    <select id="garage_member_status" name="garage_member_status">
                                        <option value="">Select status</option>
                                        <option>Active</option>
                                        <option>Pending Confirmation</option>
                                        <option>Suspended</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="garage_membership_note">Membership Note</label>
                                    <textarea id="garage_membership_note" name="garage_membership_note" placeholder="Enter admin note or garage comment"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Tag to Garage</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Garage Membership</h3>
                                <p>Search by driver, garage, state, or membership status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/garage-membership/submit/filter_garage_membership_submit.php
                        -->
                        <form action="../admin/garage-membership/submit/filter_garage_membership_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_garage_member" placeholder="Search by driver, garage, or code" />
                                <select name="garage_filter">
                                    <option value="">All Garages</option>
                                    <option>Agege Main Yard</option>
                                    <option>Ajegunle Load Park</option>
                                    <option>Abeokuta Quarry Base</option>
                                </select>
                                <select name="state_filter">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Active</option>
                                    <option>Pending Confirmation</option>
                                    <option>Suspended</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Garage Membership Records</h3>
                                <p>Sample listing showing how drivers can be mapped to garage codes.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Driver Ref</th>
                                        <th>Driver Name</th>
                                        <th>Garage</th>
                                        <th>Garage Code</th>
                                        <th>Association</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DRV-2026-001</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>Ajegunle Load Park</td>
                                        <td>AJP-LAG-002</td>
                                        <td>Ajeigboro Load Movement Group</td>
                                        <td>Lagos</td>
                                        <td><span class="status-tag">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Move</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DRV-2026-005</td>
                                        <td>Ibrahim Musa</td>
                                        <td>Agege Main Yard</td>
                                        <td>AGY-LAG-001</td>
                                        <td>Agege Truck Owners Union</td>
                                        <td>Lagos</td>
                                        <td><span class="status-tag">Pending Confirmation</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Confirm</a>
                                                <a href="#">Review</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DRV-2026-011</td>
                                        <td>Abdul Kareem</td>
                                        <td>Abeokuta Quarry Base</td>
                                        <td>AQB-OGN-003</td>
                                        <td>Ogun Quarry Transport Union</td>
                                        <td>Ogun</td>
                                        <td><span class="status-tag">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Re-tag</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DRV-2026-018</td>
                                        <td>Emeka Okoro</td>
                                        <td>Ibadan Transit Yard</td>
                                        <td>ITY-OYO-004</td>
                                        <td>Truck Operations</td>
                                        <td>Oyo</td>
                                        <td><span class="status-tag">Suspended</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Reason</a>
                                                <a href="#">Restore</a>
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
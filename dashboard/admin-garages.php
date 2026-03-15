<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-garages.html
        PURPOSE:
        Admin page for managing recognized garages and their unique garage codes.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/garages/submit/save_garage_submit.php
        - ../admin/garages/submit/filter_garages_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Garages</title>
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

        .garage-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .garage-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .garage-card h4 {
            font-size: 17px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .garage-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .garage-tag {
            display: inline-block;
            padding: 6px 10px;
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 999px;
            background: #eef7d1;
            color: #5d7600;
            font-size: 12px;
            font-weight: 700;
        }

        .garage-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .garage-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .garage-grid {
                grid-template-columns: repeat(2, 1fr);
            }
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
            <strong>Garage Management</strong>
            <span>This page is reserved for recognized garages, garage codes, and linked operational areas.</span>
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
                    <li class="menu-item active">
                        <a href="admin-garages.html">
                            <span class="menu-icon">🏚️</span>
                            <span class="menu-text"><strong>Garages</strong><span>Garage code management</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
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
                            <h1>Garage Management</h1>
                            <p>Create garage codes and manage recognized garage points for association and driver mapping.</p>
                        </div>
                    </div>
                    <div class="header-right">
                        <span class="header-chip">Garage Codes</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add / Update Garage</h3>
                                <p>Create a recognized garage and map it to an association and operating state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/garages/submit/save_garage_submit.php
                        -->
                        <form action="../admin/garages/submit/save_garage_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="garage_name">Garage Name</label>
                                    <input type="text" id="garage_name" name="garage_name" placeholder="Enter garage name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_code">Garage Code</label>
                                    <input type="text" id="garage_code" name="garage_code" placeholder="Enter unique garage code" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_state">State</label>
                                    <select id="garage_state" name="garage_state">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_city">City / Town</label>
                                    <input type="text" id="garage_city" name="garage_city" placeholder="Enter city or town" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_association">Association</label>
                                    <select id="garage_association" name="garage_association">
                                        <option value="">Select association</option>
                                        <option>Agege Truck Owners Union</option>
                                        <option>Ajeigboro Load Movement Group</option>
                                        <option>Ogun Quarry Transport Union</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_status">Status</label>
                                    <select id="garage_status" name="garage_status">
                                        <option value="">Select status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="garage_note">Garage Note</label>
                                    <textarea id="garage_note" name="garage_note" placeholder="Enter note or garage description"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Garage</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Garages</h3>
                                <p>Search by garage name, code, association, or state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/garages/submit/filter_garages_submit.php
                        -->
                        <form action="../admin/garages/submit/filter_garages_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_garage" placeholder="Search by garage name or code" />
                                <select name="association_filter">
                                    <option value="">All Associations</option>
                                    <option>Agege Truck Owners Union</option>
                                    <option>Ajeigboro Load Movement Group</option>
                                    <option>Ogun Quarry Transport Union</option>
                                </select>
                                <select name="state_filter">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="garage-grid">
                        <div class="garage-card">
                            <h4>Agege Main Yard</h4>
                            <p>Recognized heavy-load truck garage linked to Lagos association members.</p>
                            <span class="garage-tag">AGY-LAG-001</span>
                            <span class="garage-tag">Lagos</span>
                            <span class="garage-tag">Agege Truck Owners Union</span>
                            <div class="garage-actions">
                                <a href="#">Edit</a>
                                <a href="#">Members</a>
                            </div>
                        </div>

                        <div class="garage-card">
                            <h4>Ajegunle Load Park</h4>
                            <p>Garage point for load-carrying truck members and operational dispatch flow.</p>
                            <span class="garage-tag">AJP-LAG-002</span>
                            <span class="garage-tag">Lagos</span>
                            <span class="garage-tag">Ajeigboro Load Movement Group</span>
                            <div class="garage-actions">
                                <a href="#">Edit</a>
                                <a href="#">Drivers</a>
                            </div>
                        </div>

                        <div class="garage-card">
                            <h4>Abeokuta Quarry Base</h4>
                            <p>Garage used by tipper and quarry transport members in Ogun State.</p>
                            <span class="garage-tag">AQB-OGN-003</span>
                            <span class="garage-tag">Ogun</span>
                            <span class="garage-tag">Ogun Quarry Transport Union</span>
                            <div class="garage-actions">
                                <a href="#">Edit</a>
                                <a href="#">Review</a>
                            </div>
                        </div>

                        <div class="garage-card">
                            <h4>Ibadan Transit Yard</h4>
                            <p>Regional garage point for inter-state truck and goods movement operations.</p>
                            <span class="garage-tag">ITY-OYO-004</span>
                            <span class="garage-tag">Oyo</span>
                            <span class="garage-tag">Truck Operations</span>
                            <div class="garage-actions">
                                <a href="#">Edit</a>
                                <a href="#">Map</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
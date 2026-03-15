<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-associations.html
        PURPOSE:
        Admin page for managing recognized transport / driver associations.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/associations/submit/save_association_submit.php
        - ../admin/associations/submit/filter_associations_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Associations</title>
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
            min-height: 100px;
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

        .association-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .association-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .association-card h4 {
            font-size: 17px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .association-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .association-tag {
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

        .association-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .association-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .association-grid {
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
            <strong>Association Management</strong>
            <span>This page is reserved for recognized associations, association codes, and membership visibility.</span>
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
                    <li class="menu-item active">
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
                            <h1>Association Management</h1>
                            <p>Create and manage recognized associations and assign unique codes for growth and commission structure.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Association Codes</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add / Update Association</h3>
                                <p>Create a recognized association and define its code and area coverage.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/associations/submit/save_association_submit.php
                        -->
                        <form action="../admin/associations/submit/save_association_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="association_name">Association Name</label>
                                    <input type="text" id="association_name" name="association_name" placeholder="Enter association name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="association_code">Association Code</label>
                                    <input type="text" id="association_code" name="association_code" placeholder="Enter unique association code" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="association_type">Association Type</label>
                                    <select id="association_type" name="association_type">
                                        <option value="">Select type</option>
                                        <option>Truck Association</option>
                                        <option>Ajeigboro Association</option>
                                        <option>Dispatch Rider Group</option>
                                        <option>General Transport Group</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="association_state">Operating State</label>
                                    <select id="association_state" name="association_state">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                        <option>Rivers</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="association_note">Association Note</label>
                                    <textarea id="association_note" name="association_note" placeholder="Enter note about the association, reach, or admin remarks"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Association</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Associations</h3>
                                <p>Search by association name, code, state, or group type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/associations/submit/filter_associations_submit.php
                        -->
                        <form action="../admin/associations/submit/filter_associations_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_association" placeholder="Search by name or code" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Truck Association</option>
                                    <option>Ajeigboro Association</option>
                                    <option>Dispatch Rider Group</option>
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

                    <div class="association-grid">
                        <div class="association-card">
                            <h4>Agege Truck Owners Union</h4>
                            <p>Recognized heavy-load transport group operating major Lagos corridors.</p>
                            <span class="association-tag">ATOU-LAG</span>
                            <span class="association-tag">Lagos</span>
                            <span class="association-tag">Truck Association</span>
                            <div class="association-actions">
                                <a href="#">Edit</a>
                                <a href="#">Members</a>
                            </div>
                        </div>

                        <div class="association-card">
                            <h4>Ajeigboro Load Movement Group</h4>
                            <p>Recognized group for load-carrying truck movement and operational referrals.</p>
                            <span class="association-tag">ALMG-9JA</span>
                            <span class="association-tag">Ajeigboro</span>
                            <span class="association-tag">Lagos</span>
                            <div class="association-actions">
                                <a href="#">Edit</a>
                                <a href="#">Garages</a>
                            </div>
                        </div>

                        <div class="association-card">
                            <h4>Ogun Quarry Transport Union</h4>
                            <p>Association covering tipper and granite related movement around Ogun routes.</p>
                            <span class="association-tag">OQTU-OGN</span>
                            <span class="association-tag">Ogun</span>
                            <span class="association-tag">Tipper & Granite</span>
                            <div class="association-actions">
                                <a href="#">Edit</a>
                                <a href="#">Members</a>
                            </div>
                        </div>

                        <div class="association-card">
                            <h4>Metro Dispatch Rider Network</h4>
                            <p>Recognized rider network for urban last-mile movement and city delivery operations.</p>
                            <span class="association-tag">MDRN-LAG</span>
                            <span class="association-tag">Dispatch</span>
                            <span class="association-tag">Lagos</span>
                            <div class="association-actions">
                                <a href="#">Edit</a>
                                <a href="#">Review</a>
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
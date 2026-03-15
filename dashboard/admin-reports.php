<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-reports.html
        PURPOSE:
        Admin page for high-level platform reports and operational summaries.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../admin/reports/submit/filter_admin_reports_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Reports</title>
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

        .report-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .report-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .report-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .report-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .report-pill {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        @media (min-width: 768px) {
            .stats-grid-small {
                grid-template-columns: repeat(4, 1fr);
            }

            .report-grid {
                grid-template-columns: repeat(2, 1fr);
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
            <strong>Admin Reports</strong>
            <span>This page is reserved for platform-wide reports, operational analytics, and management summaries.</span>
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
                    <li class="menu-item active">
                        <a href="admin-reports.html">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text"><strong>Analytics</strong><span>Reports and insights</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>System updates and alerts</span></span>
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
                        <a href="admin-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Users</strong><span>All account roles</span></span>
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
                            <h1>Admin Reports</h1>
                            <p>Track platform performance, pool activity, user growth, and operational summaries.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Platform Reports</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Orders</span>
                                <span class="stat-icon">📦</span>
                            </div>
                            <div class="stat-value">1,842</div>
                            <div class="stat-note">Orders recorded on the platform so far</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Active Drivers</span>
                                <span class="stat-icon">🛵</span>
                            </div>
                            <div class="stat-value">356</div>
                            <div class="stat-note">Drivers currently active across pools</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Business Partners</span>
                                <span class="stat-icon">🏢</span>
                            </div>
                            <div class="stat-value">48</div>
                            <div class="stat-note">Registered partner companies on record</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Revenue Tracked</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦12.4M</div>
                            <div class="stat-note">Illustrative revenue summary for reporting</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Reports</h3>
                                <p>Search by period, report type, pool, or account category.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/reports/submit/filter_admin_reports_submit.php
                        -->
                        <form action="../admin/reports/submit/filter_admin_reports_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_report" placeholder="Search by report title or metric" />
                                <select name="period_filter">
                                    <option value="">All Periods</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>This Quarter</option>
                                </select>
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Ajeigboro</option>
                                    <option>Frozen Foods</option>
                                </select>
                                <select name="report_type_filter">
                                    <option value="">All Types</option>
                                    <option>Orders</option>
                                    <option>Users</option>
                                    <option>Finance</option>
                                    <option>Operations</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="report-grid">
                        <div class="report-card">
                            <h4>Order Performance Report</h4>
                            <p>Measure total orders, completion rates, cancellation trends, and dispatch timing across the platform.</p>
                            <span class="report-pill">Orders</span>
                            <span class="report-pill">Performance</span>
                        </div>

                        <div class="report-card">
                            <h4>Pool Activity Report</h4>
                            <p>Understand which pools are most active and which need more drivers or operations support.</p>
                            <span class="report-pill">Pools</span>
                            <span class="report-pill">Activity</span>
                        </div>

                        <div class="report-card">
                            <h4>User Growth Report</h4>
                            <p>Track customer, driver, partner, and company growth across regions and time periods.</p>
                            <span class="report-pill">Users</span>
                            <span class="report-pill">Growth</span>
                        </div>

                        <div class="report-card">
                            <h4>Finance & Payout Report</h4>
                            <p>Review wallet movements, payouts, billing records, and commission-related summaries.</p>
                            <span class="report-pill">Finance</span>
                            <span class="report-pill">Payouts</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
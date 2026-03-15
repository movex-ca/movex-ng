<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/business-reports.html
        PURPOSE:
        Business partner page for orders, drivers, commissions, and operational reports.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../business/reports/submit/filter_business_reports_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Reports</title>
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
                grid-template-columns: repeat(3, 1fr);
            }

            .report-grid {
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
            <strong>Business Reports</strong>
            <span>This page is reserved for partner order summaries, driver reports, and commission analytics.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Business Partner Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">BP</div>
                    <div class="profile-meta">
                        <h2>Partner Company</h2>
                        <p>Logistics Business Account</p>
                    </div>
                </div>
                <span class="role-badge">Business Partner</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="business-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Business overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders / Jobs</strong><span>Business delivery operations</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>Business updates and alerts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-commissions.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Commissions</strong><span>Commission tracking area</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="business-reports.html">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text"><strong>Reports</strong><span>Operational summaries</span></span>
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
                            <h1>Business Reports</h1>
                            <p>Review orders, drivers, fleet activity, and commission performance inside your partner account.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Partner Reports</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Orders This Period</span>
                                <span class="stat-icon">📦</span>
                            </div>
                            <div class="stat-value">127</div>
                            <div class="stat-note">Jobs handled under the partner account</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Approved Drivers</span>
                                <span class="stat-icon">🛵</span>
                            </div>
                            <div class="stat-value">28</div>
                            <div class="stat-note">Drivers currently active under the company</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Commission Total</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦210,000</div>
                            <div class="stat-note">Illustrative commission figure for the selected period</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Reports</h3>
                                <p>Search by period, pool, or report category.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../business/reports/submit/filter_business_reports_submit.php
                        -->
                        <form action="../business/reports/submit/filter_business_reports_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_report" placeholder="Search by report title or reference" />
                                <select name="period_filter">
                                    <option value="">All Periods</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                </select>
                                <select name="category_filter">
                                    <option value="">All Categories</option>
                                    <option>Orders</option>
                                    <option>Drivers</option>
                                    <option>Vehicles</option>
                                    <option>Commissions</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="report-grid">
                        <div class="report-card">
                            <h4>Order Activity Report</h4>
                            <p>Review created, active, completed, and delayed jobs under your partner company.</p>
                            <span class="report-pill">Orders</span>
                            <span class="report-pill">Operations</span>
                        </div>

                        <div class="report-card">
                            <h4>Driver Performance Report</h4>
                            <p>Understand driver participation, delivery completion, and assigned trip volumes.</p>
                            <span class="report-pill">Drivers</span>
                            <span class="report-pill">Performance</span>
                        </div>

                        <div class="report-card">
                            <h4>Fleet Usage Report</h4>
                            <p>Track how vehicles under your company are being used across pools and routes.</p>
                            <span class="report-pill">Vehicles</span>
                            <span class="report-pill">Fleet</span>
                        </div>

                        <div class="report-card">
                            <h4>Commission Trend Report</h4>
                            <p>See how completed jobs contribute to your company commission periods and payout outlook.</p>
                            <span class="report-pill">Commissions</span>
                            <span class="report-pill">Trend</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
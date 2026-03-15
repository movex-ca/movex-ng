<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-reports.html
        PURPOSE:
        Company client page for reports, usage summaries, and company account analytics.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../company/reports/submit/filter_company_reports_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Reports</title>
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
            <strong>Company Reports</strong>
            <span>This page is reserved for company account summaries, order reports, and usage analytics.</span>
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
                        <a href="company-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Company Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-billing.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Billing / Payments</strong><span>Invoices and payments</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="company-reports.html">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text"><strong>Reports</strong><span>Order and billing reports</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Company</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-profile.html">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text"><strong>Company Profile</strong><span>Corporate details</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
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
                            <h1>Company Reports</h1>
                            <p>Review account usage, order summaries, billing performance, and company activity reports.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Reports</span>
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
                            <div class="stat-value">63</div>
                            <div class="stat-note">Company orders recorded within selected period</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Completed Deliveries</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">51</div>
                            <div class="stat-note">Orders completed successfully this period</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Billing Total</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦540,000</div>
                            <div class="stat-note">Reported company billing within selected period</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Reports</h3>
                                <p>Search by period, department, or report category.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/reports/submit/filter_company_reports_submit.php
                        -->
                        <form action="../company/reports/submit/filter_company_reports_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_report" placeholder="Search by report title or reference" />
                                <select name="period_filter">
                                    <option value="">All Periods</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                </select>
                                <select name="department_filter">
                                    <option value="">All Departments</option>
                                    <option>Logistics</option>
                                    <option>Procurement</option>
                                    <option>Operations</option>
                                    <option>Finance</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="report-grid">
                        <div class="report-card">
                            <h4>Order Performance Summary</h4>
                            <p>See how many orders were created, completed, delayed, or cancelled within the selected period.</p>
                            <span class="report-pill">Orders</span>
                            <span class="report-pill">Performance</span>
                        </div>

                        <div class="report-card">
                            <h4>Department Usage Report</h4>
                            <p>Understand which internal departments are generating the most logistics requests.</p>
                            <span class="report-pill">Department</span>
                            <span class="report-pill">Usage</span>
                        </div>

                        <div class="report-card">
                            <h4>Billing Summary Report</h4>
                            <p>Review invoice totals, open balances, and payment trends across periods.</p>
                            <span class="report-pill">Billing</span>
                            <span class="report-pill">Payments</span>
                        </div>

                        <div class="report-card">
                            <h4>Pool Utilization Report</h4>
                            <p>Track which service pools your company uses most often for logistics operations.</p>
                            <span class="report-pill">Pools</span>
                            <span class="report-pill">Trends</span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
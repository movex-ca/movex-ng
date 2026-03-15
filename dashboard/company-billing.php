<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-billing.html
        PURPOSE:
        Company client page for billing and invoice view.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../company/billing/submit/filter_billing_submit.php
        - ../company/billing/submit/request_invoice_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Billing</title>
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
            min-width: 940px;
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

        .status-paid {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-open {
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

        @media (min-width: 768px) {
            .stats-grid-small {
                grid-template-columns: repeat(3, 1fr);
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
            <strong>Company Billing</strong>
            <span>This page is reserved for invoice records, payment status, and billing summaries.</span>
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
                        <a href="company-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Company Order</strong><span>Create a company logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="company-billing.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Billing / Payments</strong><span>Invoices and payments</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Company</div>
                <ul class="menu-list">
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
                            <h1>Company Billing</h1>
                            <p>Review invoices, payment records, outstanding balances, and billing summaries.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Billing Area</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Open Invoices</span>
                                <span class="stat-icon">💳</span>
                            </div>
                            <div class="stat-value">₦320,000</div>
                            <div class="stat-note">Outstanding company invoice balance</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Paid This Period</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">₦540,000</div>
                            <div class="stat-note">Total settled within the selected period</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Invoices Count</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">12</div>
                            <div class="stat-note">Billing documents on record this period</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Billing Records</h3>
                                <p>Search by invoice reference, payment status, or billing period.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/billing/submit/filter_billing_submit.php
                        -->
                        <form action="../company/billing/submit/filter_billing_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_invoice" placeholder="Search by invoice number or reference" />
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Paid</option>
                                    <option>Open</option>
                                    <option>Under Review</option>
                                </select>
                                <select name="period_filter">
                                    <option value="">All Periods</option>
                                    <option>January 2026</option>
                                    <option>February 2026</option>
                                    <option>March 2026</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Invoice Records</h3>
                                <p>Sample listing showing how company billing records may appear later.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Invoice No.</th>
                                        <th>Period</th>
                                        <th>Orders Covered</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>INV-2026-001</td>
                                        <td>January 2026</td>
                                        <td>24</td>
                                        <td>₦180,000</td>
                                        <td><span class="status-badge status-paid">Paid</span></td>
                                        <td>2026-01-31</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Receipt</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>INV-2026-002</td>
                                        <td>February 2026</td>
                                        <td>31</td>
                                        <td>₦320,000</td>
                                        <td><span class="status-badge status-open">Open</span></td>
                                        <td>2026-02-28</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Pay</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>INV-2026-003</td>
                                        <td>March 2026</td>
                                        <td>12</td>
                                        <td>₦95,000</td>
                                        <td><span class="status-badge status-review">Under Review</span></td>
                                        <td>2026-03-31</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Details</a>
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
                                <h3>Billing Actions</h3>
                                <p>These cards represent common billing tasks for company users.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/billing/submit/request_invoice_submit.php
                        -->
                        <form action="../company/billing/submit/request_invoice_submit.php" method="post">
                            <div class="quick-grid">
                                <a href="#" class="quick-card">
                                    <h4>Request Invoice Copy</h4>
                                    <p>Get a copy of any invoice for internal company processing.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Payment Summary</h4>
                                    <p>Review paid amounts, outstanding balances, and payment history.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Billing Report</h4>
                                    <p>Open billing breakdown by period, department, or order reference.</p>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-wallet.html
        PURPOSE:
        Company client wallet page for credits, deductions, and company wallet history.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../company/wallet/submit/filter_company_wallet_submit.php
        - ../company/wallet/submit/add_company_wallet_fund_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Wallet</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .stats-grid-small {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .toolbar-grid,
        .wallet-action-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .toolbar-grid input,
        .toolbar-grid select,
        .wallet-action-grid input,
        .wallet-action-grid select {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 13px 14px;
            outline: none;
            background: #fcfff7;
            font-size: 14px;
            color: var(--text-dark);
        }

        .wallet-action-grid label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
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

        .credit-badge,
        .debit-badge,
        .pending-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .credit-badge {
            background: #eefceb;
            color: #2d7a2d;
        }

        .debit-badge {
            background: #fff0f0;
            color: #b14343;
        }

        .pending-badge {
            background: #fff8df;
            color: #9b7a00;
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

            .wallet-action-grid {
                grid-template-columns: 1fr 1fr;
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
            <strong>Company Wallet</strong>
            <span>This page is reserved for company wallet credits, deductions, and account funding records.</span>
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
                    <li class="menu-item active">
                        <a href="company-wallet.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Wallet</strong><span>Company credit balance</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-billing.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Billing / Payments</strong><span>Invoices and payments</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-reports.html">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text"><strong>Reports</strong><span>Order and billing reports</span></span>
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
                            <h1>Company Wallet</h1>
                            <p>Review company wallet balance, credit top-up records, and wallet deductions.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Company Credit</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Available Balance</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦320,000</div>
                            <div class="stat-note">Current available company wallet balance</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Reserved Amount</span>
                                <span class="stat-icon">⏳</span>
                            </div>
                            <div class="stat-value">₦40,000</div>
                            <div class="stat-note">Illustrative amount tied to pending order logic</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Funded</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">₦1.2M</div>
                            <div class="stat-note">Illustrative funding total over time</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add Company Wallet Fund</h3>
                                <p>This form is for company wallet funding later when backend is added.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/wallet/submit/add_company_wallet_fund_submit.php
                        -->
                        <form action="../company/wallet/submit/add_company_wallet_fund_submit.php" method="post">
                            <div class="wallet-action-grid">
                                <div>
                                    <label for="company_wallet_amount">Amount</label>
                                    <input type="text" id="company_wallet_amount" name="company_wallet_amount" placeholder="e.g. ₦100,000" />
                                </div>

                                <div>
                                    <label for="company_wallet_payment_method">Payment Method</label>
                                    <select id="company_wallet_payment_method" name="company_wallet_payment_method">
                                        <option value="">Select payment method</option>
                                        <option>Bank Transfer</option>
                                        <option>Card Payment</option>
                                        <option>Corporate Payment Link</option>
                                    </select>
                                </div>

                                <div style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Add Company Fund</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Wallet Records</h3>
                                <p>Search by reference, transaction type, or status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/wallet/submit/filter_company_wallet_submit.php
                        -->
                        <form action="../company/wallet/submit/filter_company_wallet_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_wallet" placeholder="Search by ref or transaction note" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Credit</option>
                                    <option>Debit</option>
                                    <option>Reserve</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                    <option>Reserved</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Wallet Transactions</h3>
                                <p>Sample listing showing how company wallet activity may appear later.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CWAL-2026-001</td>
                                        <td>2026-03-01</td>
                                        <td><span class="credit-badge">Credit</span></td>
                                        <td>Company wallet funded successfully</td>
                                        <td>₦250,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CWAL-2026-002</td>
                                        <td>2026-03-03</td>
                                        <td><span class="debit-badge">Debit</span></td>
                                        <td>Order deduction against company wallet</td>
                                        <td>₦80,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Order</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CWAL-2026-003</td>
                                        <td>2026-03-05</td>
                                        <td><span class="pending-badge">Reserve</span></td>
                                        <td>Reserved amount for active company job</td>
                                        <td>₦40,000</td>
                                        <td><span class="pending-badge">Reserved</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Track</a>
                                                <a href="#">Reference</a>
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
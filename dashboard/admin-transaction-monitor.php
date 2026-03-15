<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-transaction-monitor.html
        PURPOSE:
        Admin page for monitoring transactions across processors, wallets, orders, and funding events.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../admin/transaction-monitor/submit/filter_transaction_monitor_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Transaction Monitor</title>
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
            min-width: 1200px;
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

        .status-success,
        .status-pending,
        .status-failed,
        .status-review {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-success {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-failed {
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
            <strong>Transaction Monitor</strong>
            <span>This page is reserved for watching live and historical transaction states across the platform.</span>
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
                <div class="menu-group-title">Payments</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-virtual-accounts.html">
                            <span class="menu-icon">🏧</span>
                            <span class="menu-text"><strong>Virtual Accounts</strong><span>Generated account control</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-transaction-monitor.html">
                            <span class="menu-icon">📡</span>
                            <span class="menu-text"><strong>Transaction Monitor</strong><span>Payment watch area</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-ledger.html">
                            <span class="menu-icon">📒</span>
                            <span class="menu-text"><strong>Ledger</strong><span>Global financial records</span></span>
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
                            <h1>Transaction Monitor</h1>
                            <p>Monitor incoming and outgoing transaction flow across processors, wallets, and orders.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Monitor</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Successful</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">1,942</div>
                            <div class="stat-note">Illustrative successful transactions</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending</span>
                                <span class="stat-icon">⏳</span>
                            </div>
                            <div class="stat-value">73</div>
                            <div class="stat-note">Awaiting callback or settlement</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Failed</span>
                                <span class="stat-icon">⚠️</span>
                            </div>
                            <div class="stat-value">19</div>
                            <div class="stat-note">Marked failed or incomplete</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Review Queue</span>
                                <span class="stat-icon">🔎</span>
                            </div>
                            <div class="stat-value">11</div>
                            <div class="stat-note">Suspicious or mismatched items</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Transactions</h3>
                                <p>Search by transaction ref, provider, status, or transaction type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/transaction-monitor/submit/filter_transaction_monitor_submit.php
                        -->
                        <form action="../admin/transaction-monitor/submit/filter_transaction_monitor_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_transaction" placeholder="Search by ref, account, order, or narration" />
                                <select name="provider_filter">
                                    <option value="">All Providers</option>
                                    <option>Lotus Bank</option>
                                    <option>Monnify</option>
                                    <option>Paystack</option>
                                    <option>Flutterwave</option>
                                </select>
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Wallet Funding</option>
                                    <option>Order Payment</option>
                                    <option>Payout</option>
                                    <option>Virtual Account Credit</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Successful</option>
                                    <option>Pending</option>
                                    <option>Failed</option>
                                    <option>Review</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Transaction Records</h3>
                                <p>Sample listing showing how monitored transactions may appear in one place.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Transaction Ref</th>
                                        <th>Provider</th>
                                        <th>Account</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Linked Ref</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TRX-2026-001</td>
                                        <td>Lotus Bank</td>
                                        <td>Alao Odeleye</td>
                                        <td>Wallet Funding</td>
                                        <td>₦50,000</td>
                                        <td><span class="status-success">Successful</span></td>
                                        <td>UWAL-2026-001</td>
                                        <td>2026-03-06</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Trace</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRX-2026-002</td>
                                        <td>Monnify</td>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Virtual Account Credit</td>
                                        <td>₦250,000</td>
                                        <td><span class="status-pending">Pending</span></td>
                                        <td>CWAL-2026-001</td>
                                        <td>2026-03-05</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Investigate</a>
                                                <a href="#">Callback</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRX-2026-003</td>
                                        <td>Paystack</td>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>Business Funding</td>
                                        <td>₦95,000</td>
                                        <td><span class="status-failed">Failed</span></td>
                                        <td>BWAL-2026-003</td>
                                        <td>2026-03-04</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Retry</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRX-2026-004</td>
                                        <td>Flutterwave</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>Payout</td>
                                        <td>₦20,000</td>
                                        <td><span class="status-review">Review</span></td>
                                        <td>PAY-2026-001</td>
                                        <td>2026-03-03</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Ledger</a>
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
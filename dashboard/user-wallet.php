<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-wallet.html
        PURPOSE:
        User page for wallet balance, payment credits, and transaction history.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../user/wallet/submit/filter_wallet_submit.php
        - ../user/wallet/submit/add_wallet_fund_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | User Wallet</title>
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
            min-width: 920px;
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
            <strong>User Wallet</strong>
            <span>This page is reserved for wallet balance, account funding, and user wallet history.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Nigeria Logistics Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">AO</div>
                    <div class="profile-meta">
                        <h2>Alao Odeleye</h2>
                        <p>Customer Account</p>
                    </div>
                </div>
                <span class="role-badge">User Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="user-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>My Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="user-wallet.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Wallet</strong><span>Balance and transactions</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="user-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>Updates and alerts</span></span>
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
                            <h1>User Wallet</h1>
                            <p>Review available balance, wallet credits, debits, and funding records.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Wallet Balance</span>
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
                            <div class="stat-value">₦85,000</div>
                            <div class="stat-note">Current balance available for orders</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Held Balance</span>
                                <span class="stat-icon">⏳</span>
                            </div>
                            <div class="stat-value">₦5,000</div>
                            <div class="stat-note">Funds under temporary hold logic</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Added</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">₦220,000</div>
                            <div class="stat-note">Illustrative wallet funding total</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add Wallet Fund</h3>
                                <p>This form is for adding money into the user wallet later with backend integration.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/wallet/submit/add_wallet_fund_submit.php
                        -->
                        <form action="../user/wallet/submit/add_wallet_fund_submit.php" method="post">
                            <div class="wallet-action-grid">
                                <div>
                                    <label for="wallet_amount">Amount</label>
                                    <input type="text" id="wallet_amount" name="wallet_amount" placeholder="e.g. ₦10,000" />
                                </div>

                                <div>
                                    <label for="wallet_payment_method">Payment Method</label>
                                    <select id="wallet_payment_method" name="wallet_payment_method">
                                        <option value="">Select payment method</option>
                                        <option>Wallet Transfer</option>
                                        <option>Card Payment</option>
                                        <option>Bank Transfer</option>
                                        <option>USSD</option>
                                    </select>
                                </div>

                                <div style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Add Fund</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Wallet Records</h3>
                                <p>Search by wallet reference, type, or transaction state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/wallet/submit/filter_wallet_submit.php
                        -->
                        <form action="../user/wallet/submit/filter_wallet_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_wallet" placeholder="Search by ref or description" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Credit</option>
                                    <option>Debit</option>
                                    <option>Hold</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                    <option>Held</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Wallet Transactions</h3>
                                <p>Sample listing showing how wallet funding and deductions may appear.</p>
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
                                        <td>UWAL-2026-001</td>
                                        <td>2026-03-01</td>
                                        <td><span class="credit-badge">Credit</span></td>
                                        <td>Wallet funded successfully</td>
                                        <td>₦50,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UWAL-2026-002</td>
                                        <td>2026-03-03</td>
                                        <td><span class="debit-badge">Debit</span></td>
                                        <td>Order payment deduction</td>
                                        <td>₦12,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Order</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>UWAL-2026-003</td>
                                        <td>2026-03-05</td>
                                        <td><span class="pending-badge">Hold</span></td>
                                        <td>Temporary hold pending order confirmation</td>
                                        <td>₦5,000</td>
                                        <td><span class="pending-badge">Held</span></td>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-wallet.html
        PURPOSE:
        Driver page for wallet balance, payout summary, and transaction records.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../driver/wallet/submit/filter_wallet_submit.php
        - ../driver/wallet/submit/request_wallet_payout_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Wallet</title>
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
            <strong>Driver Wallet</strong>
            <span>This page is reserved for wallet balance, payout requests, and wallet transaction history.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Driver Operations Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">DR</div>
                    <div class="profile-meta">
                        <h2>Driver Account</h2>
                        <p>Ajeigboro Pool</p>
                    </div>
                </div>
                <span class="role-badge">Driver Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="driver-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and trip activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-available-jobs.html">
                            <span class="menu-icon">📥</span>
                            <span class="menu-text"><strong>Available Jobs</strong><span>Jobs ready for pickup</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-trips.html">
                            <span class="menu-icon">🚚</span>
                            <span class="menu-text"><strong>My Trips</strong><span>Assigned and completed trips</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-earnings.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Earnings</strong><span>Trip income and summary</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="driver-wallet.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Wallet / Payouts</strong><span>Payout and balance area</span></span>
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
                            <h1>Driver Wallet</h1>
                            <p>View available balance, payout requests, and wallet transaction movements.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Wallet</span>
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
                            <div class="stat-value">₦65,000</div>
                            <div class="stat-note">Wallet balance available for payout request</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending Payout</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">₦20,000</div>
                            <div class="stat-note">Awaiting payout review or settlement</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Paid</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">₦240,000</div>
                            <div class="stat-note">Historical payout already settled</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Wallet Transactions</h3>
                                <p>Search wallet activity by reference, type, or payout status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/wallet/submit/filter_wallet_submit.php
                        -->
                        <form action="../driver/wallet/submit/filter_wallet_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_wallet" placeholder="Search by reference or note" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Credit</option>
                                    <option>Debit</option>
                                    <option>Payout</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Wallet Transactions</h3>
                                <p>Sample listing showing wallet credits, payouts, and deductions.</p>
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
                                        <td>WAL-2026-001</td>
                                        <td>2026-03-01</td>
                                        <td><span class="credit-badge">Credit</span></td>
                                        <td>Trip earning from completed delivery</td>
                                        <td>₦38,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Receipt</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WAL-2026-002</td>
                                        <td>2026-03-03</td>
                                        <td><span class="debit-badge">Debit</span></td>
                                        <td>Payout sent to driver account</td>
                                        <td>₦20,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>WAL-2026-003</td>
                                        <td>2026-03-05</td>
                                        <td><span class="debit-badge">Payout</span></td>
                                        <td>Requested payout under review</td>
                                        <td>₦20,000</td>
                                        <td><span class="pending-badge">Pending</span></td>
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

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Wallet Actions</h3>
                                <p>These cards represent the main payout and wallet actions for drivers.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/wallet/submit/request_wallet_payout_submit.php
                        -->
                        <form action="../driver/wallet/submit/request_wallet_payout_submit.php" method="post">
                            <div class="quick-grid">
                                <a href="#" class="quick-card">
                                    <h4>Request Payout</h4>
                                    <p>Request transfer of available wallet balance after payout rules are met.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Payout History</h4>
                                    <p>Review all previous payout requests and settlement records.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Wallet Statement</h4>
                                    <p>See a grouped summary of credits, payouts, and deductions.</p>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/business-wallet.html
        PURPOSE:
        Business partner wallet page for balance, commission credits, and wallet transactions.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../business/wallet/submit/filter_business_wallet_submit.php
        - ../business/wallet/submit/request_business_wallet_payout_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Wallet</title>
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
            min-width: 960px;
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
            <strong>Business Wallet</strong>
            <span>This page is reserved for partner wallet balance, commission credits, and payout activity.</span>
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
                        <a href="business-commissions.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Commissions</strong><span>Commission tracking area</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="business-wallet.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Wallet</strong><span>Partner wallet and payouts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
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
                            <h1>Business Wallet</h1>
                            <p>Review commission wallet balance, partner payouts, and wallet movement records.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Partner Wallet</span>
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
                            <div class="stat-value">₦210,000</div>
                            <div class="stat-note">Wallet balance available for partner payout</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending Release</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">₦95,000</div>
                            <div class="stat-note">Commission or wallet value awaiting release</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Settled</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">₦450,000</div>
                            <div class="stat-note">Illustrative settled wallet or payout total</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Wallet Records</h3>
                                <p>Search by reference, type, or payout status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../business/wallet/submit/filter_business_wallet_submit.php
                        -->
                        <form action="../business/wallet/submit/filter_business_wallet_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_wallet" placeholder="Search by wallet ref or description" />
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
                                    <option>Held</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Wallet Transactions</h3>
                                <p>Sample listing showing how partner wallet records may appear.</p>
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
                                        <td>BWAL-2026-001</td>
                                        <td>2026-03-01</td>
                                        <td><span class="credit-badge">Credit</span></td>
                                        <td>Commission credit from completed jobs</td>
                                        <td>₦145,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Statement</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BWAL-2026-002</td>
                                        <td>2026-03-03</td>
                                        <td><span class="debit-badge">Debit</span></td>
                                        <td>Payout sent to business account</td>
                                        <td>₦120,000</td>
                                        <td><span class="credit-badge">Completed</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BWAL-2026-003</td>
                                        <td>2026-03-05</td>
                                        <td><span class="pending-badge">Payout</span></td>
                                        <td>Partner payout request awaiting review</td>
                                        <td>₦95,000</td>
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
                                <p>These cards represent common partner wallet actions.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../business/wallet/submit/request_business_wallet_payout_submit.php
                        -->
                        <form action="../business/wallet/submit/request_business_wallet_payout_submit.php" method="post">
                            <div class="quick-grid">
                                <a href="#" class="quick-card">
                                    <h4>Request Payout</h4>
                                    <p>Request payout for approved available partner wallet balance.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Wallet Statement</h4>
                                    <p>Review grouped credit, debit, and payout summary by period.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Commission Link</h4>
                                    <p>Open commission pages tied directly to wallet growth and payout flow.</p>
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
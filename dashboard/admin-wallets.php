<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-wallets.html
        PURPOSE:
        Admin page for monitoring wallets across users, drivers, partners, and company accounts.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../admin/wallets/submit/filter_wallets_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Wallets</title>
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
            min-width: 1120px;
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

        .wallet-badge,
        .credit-badge,
        .hold-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .wallet-badge {
            background: #eefceb;
            color: #2d7a2d;
        }

        .credit-badge {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .hold-badge {
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
            <strong>Wallet Monitoring</strong>
            <span>This page is reserved for reviewing wallet balances, held funds, credits, and account wallet summaries.</span>
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
                <div class="menu-group-title">Finance</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-wallets.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Wallets</strong><span>Account wallet monitoring</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-payouts.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Payouts</strong><span>Payout review and release</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-reports.html">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text"><strong>Reports</strong><span>Finance and analytics</span></span>
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
                            <h1>Wallet Monitoring</h1>
                            <p>Review balances, holds, credits, and wallet activity across all major account categories.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Finance Control</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Wallet Balance</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦8.6M</div>
                            <div class="stat-note">Illustrative combined wallet balance</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Held Funds</span>
                                <span class="stat-icon">⏳</span>
                            </div>
                            <div class="stat-value">₦1.2M</div>
                            <div class="stat-note">Funds under pending release logic</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Driver Wallets</span>
                                <span class="stat-icon">🛵</span>
                            </div>
                            <div class="stat-value">356</div>
                            <div class="stat-note">Driver accounts with wallet records</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Company Wallet Credits</span>
                                <span class="stat-icon">🏬</span>
                            </div>
                            <div class="stat-value">₦920K</div>
                            <div class="stat-note">Illustrative corporate credit balance</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Wallet Records</h3>
                                <p>Search by name, account type, wallet state, or reference.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/wallets/submit/filter_wallets_submit.php
                        -->
                        <form action="../admin/wallets/submit/filter_wallets_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_wallet" placeholder="Search by user, company, email, phone, or wallet ref" />
                                <select name="role_filter">
                                    <option value="">All Account Types</option>
                                    <option>Customer</option>
                                    <option>Driver</option>
                                    <option>Business Partner</option>
                                    <option>Company Client</option>
                                </select>
                                <select name="wallet_state_filter">
                                    <option value="">All Wallet States</option>
                                    <option>Active</option>
                                    <option>Held</option>
                                    <option>Pending Review</option>
                                </select>
                                <select name="balance_filter">
                                    <option value="">All Balances</option>
                                    <option>Positive Balance</option>
                                    <option>Zero Balance</option>
                                    <option>High Balance</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Wallet Summary Records</h3>
                                <p>Sample listing showing how wallet summaries may appear in admin finance control.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name / Company</th>
                                        <th>Role</th>
                                        <th>Wallet Ref</th>
                                        <th>Available Balance</th>
                                        <th>Held Funds</th>
                                        <th>Last Activity</th>
                                        <th>State</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Kunle Adeyemi</td>
                                        <td>Driver</td>
                                        <td>WLT-DR-001</td>
                                        <td>₦65,000</td>
                                        <td>₦20,000</td>
                                        <td>2026-03-05</td>
                                        <td><span class="wallet-badge">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Ledger</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>Business Partner</td>
                                        <td>WLT-BP-004</td>
                                        <td>₦210,000</td>
                                        <td>₦0</td>
                                        <td>2026-03-04</td>
                                        <td><span class="credit-badge">Credited</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Commissions</a>
                                                <a href="#">History</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Company Client</td>
                                        <td>WLT-CC-007</td>
                                        <td>₦320,000</td>
                                        <td>₦0</td>
                                        <td>2026-03-03</td>
                                        <td><span class="wallet-badge">Active</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Billing</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alao Odeleye</td>
                                        <td>Customer</td>
                                        <td>WLT-CU-012</td>
                                        <td>₦85,000</td>
                                        <td>₦5,000</td>
                                        <td>2026-03-02</td>
                                        <td><span class="hold-badge">Held</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Orders</a>
                                                <a href="#">Wallet</a>
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
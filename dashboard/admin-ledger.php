<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-ledger.html
        PURPOSE:
        Admin page for global financial ledger, credits, debits, and transaction references.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../admin/ledger/submit/filter_ledger_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Ledger</title>
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

        .credit-badge,
        .debit-badge,
        .pending-badge,
        .settled-badge {
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

        .settled-badge {
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
            <strong>Admin Ledger</strong>
            <span>This page is reserved for the global ledger of wallet, payout, billing, and transaction references.</span>
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
                    <li class="menu-item active">
                        <a href="admin-ledger.html">
                            <span class="menu-icon">📒</span>
                            <span class="menu-text"><strong>Ledger</strong><span>Global financial records</span></span>
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
                            <h1>Admin Ledger</h1>
                            <p>Review the platform-wide financial ledger across wallets, payouts, billings, and transaction references.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Global Ledger</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Credits</span>
                                <span class="stat-icon">➕</span>
                            </div>
                            <div class="stat-value">₦18.2M</div>
                            <div class="stat-note">Illustrative total credits recorded</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Debits</span>
                                <span class="stat-icon">➖</span>
                            </div>
                            <div class="stat-value">₦13.9M</div>
                            <div class="stat-note">Illustrative total debits recorded</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending Items</span>
                                <span class="stat-icon">⏳</span>
                            </div>
                            <div class="stat-value">128</div>
                            <div class="stat-note">Ledger items awaiting final settlement</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Settled Items</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">2,406</div>
                            <div class="stat-note">Ledger items marked as settled</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Ledger</h3>
                                <p>Search by reference, account type, transaction type, or settlement state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/ledger/submit/filter_ledger_submit.php
                        -->
                        <form action="../admin/ledger/submit/filter_ledger_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_ledger" placeholder="Search by ref, account, note, or transaction id" />
                                <select name="account_filter">
                                    <option value="">All Accounts</option>
                                    <option>Customer</option>
                                    <option>Driver</option>
                                    <option>Business Partner</option>
                                    <option>Company Client</option>
                                </select>
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Credit</option>
                                    <option>Debit</option>
                                    <option>Payout</option>
                                    <option>Billing</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Pending</option>
                                    <option>Settled</option>
                                    <option>Held</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Ledger Records</h3>
                                <p>Sample listing showing how platform-wide ledger entries may appear.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Account</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>LED-2026-001</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>Driver Wallet</td>
                                        <td><span class="credit-badge">Credit</span></td>
                                        <td>Trip earning added to wallet</td>
                                        <td>₦38,000</td>
                                        <td><span class="settled-badge">Settled</span></td>
                                        <td>2026-03-01</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Trace</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LED-2026-002</td>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Company Wallet</td>
                                        <td><span class="debit-badge">Debit</span></td>
                                        <td>Order payment deduction</td>
                                        <td>₦80,000</td>
                                        <td><span class="settled-badge">Settled</span></td>
                                        <td>2026-03-03</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Order</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LED-2026-003</td>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>Partner Payout</td>
                                        <td><span class="pending-badge">Payout</span></td>
                                        <td>Payout request awaiting release</td>
                                        <td>₦95,000</td>
                                        <td><span class="pending-badge">Pending</span></td>
                                        <td>2026-03-05</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Release</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LED-2026-004</td>
                                        <td>Alao Odeleye</td>
                                        <td>User Wallet</td>
                                        <td><span class="pending-badge">Hold</span></td>
                                        <td>Temporary wallet reserve for active order</td>
                                        <td>₦5,000</td>
                                        <td><span class="pending-badge">Held</span></td>
                                        <td>2026-03-05</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Track</a>
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
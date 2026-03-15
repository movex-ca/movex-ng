<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-virtual-accounts.html
        PURPOSE:
        Admin page for managing generated virtual accounts, providers, and account usage tracking.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/virtual-accounts/submit/save_virtual_account_rule_submit.php
        - ../admin/virtual-accounts/submit/filter_virtual_accounts_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Virtual Accounts</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .dashboard-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .dashboard-form-group input,
        .dashboard-form-group select,
        .dashboard-form-group textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px;
            outline: none;
            font-size: 14px;
            background: #fcfff7;
            color: var(--text-dark);
        }

        .dashboard-form-group textarea {
            min-height: 90px;
            resize: vertical;
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

        .status-active,
        .status-pending,
        .status-disabled,
        .status-used {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-active {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-disabled {
            background: #fff0f0;
            color: #b14343;
        }

        .status-used {
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
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
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
            <strong>Virtual Account Management</strong>
            <span>This page is reserved for provider mapping, generated account tracking, and usage control.</span>
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
                        <a href="admin-payment-processors.html">
                            <span class="menu-icon">🏦</span>
                            <span class="menu-text"><strong>Payment Processors</strong><span>Main processor control</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-virtual-accounts.html">
                            <span class="menu-icon">🏧</span>
                            <span class="menu-text"><strong>Virtual Accounts</strong><span>Generated account control</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-transaction-monitor.html">
                            <span class="menu-icon">📡</span>
                            <span class="menu-text"><strong>Transaction Monitor</strong><span>Payment watch area</span></span>
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
                            <h1>Virtual Account Management</h1>
                            <p>Manage providers, generated accounts, account life cycle, and payment collection visibility.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Virtual Accounts</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Create / Update Virtual Account Rule</h3>
                                <p>Set provider, account type, and account usage controls for generated accounts.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/virtual-accounts/submit/save_virtual_account_rule_submit.php
                        -->
                        <form action="../admin/virtual-accounts/submit/save_virtual_account_rule_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="va_provider">Provider</label>
                                    <select id="va_provider" name="va_provider">
                                        <option value="">Select provider</option>
                                        <option>Lotus Bank</option>
                                        <option>Monnify</option>
                                        <option>Paystack</option>
                                        <option>Flutterwave</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="va_type">Virtual Account Type</label>
                                    <select id="va_type" name="va_type">
                                        <option value="">Select account type</option>
                                        <option>Static</option>
                                        <option>Reserved</option>
                                        <option>Temporary</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="va_scope">Usage Scope</label>
                                    <select id="va_scope" name="va_scope">
                                        <option value="">Select scope</option>
                                        <option>User Wallet Funding</option>
                                        <option>Company Funding</option>
                                        <option>Business Funding</option>
                                        <option>Order Payment</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="va_status">Status</label>
                                    <select id="va_status" name="va_status">
                                        <option value="">Select status</option>
                                        <option>Active</option>
                                        <option>Pending</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="va_note">Note</label>
                                    <textarea id="va_note" name="va_note" placeholder="Enter note, provider config hint, or admin usage rule"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Virtual Account Rule</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Virtual Accounts</h3>
                                <p>Search by provider, account number, status, or usage type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/virtual-accounts/submit/filter_virtual_accounts_submit.php
                        -->
                        <form action="../admin/virtual-accounts/submit/filter_virtual_accounts_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_virtual_account" placeholder="Search by account no, provider, or account name" />
                                <select name="provider_filter">
                                    <option value="">All Providers</option>
                                    <option>Lotus Bank</option>
                                    <option>Monnify</option>
                                    <option>Paystack</option>
                                </select>
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Static</option>
                                    <option>Reserved</option>
                                    <option>Temporary</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Active</option>
                                    <option>Pending</option>
                                    <option>Disabled</option>
                                    <option>Used</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Virtual Account Records</h3>
                                <p>Sample listing showing how generated virtual accounts may appear later.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Provider</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Type</th>
                                        <th>Usage Scope</th>
                                        <th>Status</th>
                                        <th>Last Activity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lotus Bank</td>
                                        <td>Movex User Wallet Funding</td>
                                        <td>3012456789</td>
                                        <td>Reserved</td>
                                        <td>User Wallet Funding</td>
                                        <td><span class="status-active">Active</span></td>
                                        <td>2026-03-06</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Provider</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Monnify</td>
                                        <td>PrimeBuild Funding</td>
                                        <td>9876543210</td>
                                        <td>Static</td>
                                        <td>Company Funding</td>
                                        <td><span class="status-used">Used</span></td>
                                        <td>2026-03-05</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">History</a>
                                                <a href="#">Trace</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Paystack</td>
                                        <td>Business Top-up Account</td>
                                        <td>1122334455</td>
                                        <td>Temporary</td>
                                        <td>Business Funding</td>
                                        <td><span class="status-pending">Pending</span></td>
                                        <td>2026-03-04</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Activate</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Flutterwave</td>
                                        <td>Legacy Collection Account</td>
                                        <td>5566778899</td>
                                        <td>Static</td>
                                        <td>Order Payment</td>
                                        <td><span class="status-disabled">Disabled</span></td>
                                        <td>2026-02-28</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Edit</a>
                                                <a href="#">Enable</a>
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
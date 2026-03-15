<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-payouts.html
        PURPOSE:
        Admin page for reviewing payout requests and payout release flow.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/payouts/submit/filter_payouts_submit.php
        - ../admin/payouts/submit/payout_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Payouts</title>
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

        .status-approved,
        .status-pending,
        .status-paid,
        .status-hold {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-approved {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .status-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-paid {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-hold {
            background: #fff0f0;
            color: #b14343;
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
            <strong>Payout Review</strong>
            <span>This page is reserved for reviewing payout requests, approvals, holds, and payout release tracking.</span>
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
                    <li class="menu-item active">
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
                            <h1>Payout Review</h1>
                            <p>Review driver and partner payout requests before release, hold, or settlement marking.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Payout Control</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending Requests</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">43</div>
                            <div class="stat-note">Awaiting review or release</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Approved</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">18</div>
                            <div class="stat-note">Approved but not fully settled yet</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Paid Out</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦2.4M</div>
                            <div class="stat-note">Illustrative payout total</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">On Hold</span>
                                <span class="stat-icon">⏸</span>
                            </div>
                            <div class="stat-value">7</div>
                            <div class="stat-note">Requests paused for review</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Payout Requests</h3>
                                <p>Search by account, payout reference, request state, or payout class.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/payouts/submit/filter_payouts_submit.php
                        -->
                        <form action="../admin/payouts/submit/filter_payouts_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_payout" placeholder="Search by name, ref, phone, or payout ID" />
                                <select name="role_filter">
                                    <option value="">All Roles</option>
                                    <option>Driver</option>
                                    <option>Business Partner</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Paid</option>
                                    <option>On Hold</option>
                                </select>
                                <select name="amount_filter">
                                    <option value="">All Amounts</option>
                                    <option>Small Amount</option>
                                    <option>Medium Amount</option>
                                    <option>Large Amount</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Payout Request Records</h3>
                                <p>Sample listing showing payout request review workflow.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Payout Ref</th>
                                        <th>Name / Company</th>
                                        <th>Role</th>
                                        <th>Requested Amount</th>
                                        <th>Requested Date</th>
                                        <th>Status</th>
                                        <th>Destination</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PAY-2026-001</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>Driver</td>
                                        <td>₦20,000</td>
                                        <td>2026-03-05</td>
                                        <td><span class="status-pending">Pending</span></td>
                                        <td>Driver Account</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Approve</a>
                                                <a href="#">Hold</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PAY-2026-002</td>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>Business Partner</td>
                                        <td>₦145,000</td>
                                        <td>2026-03-04</td>
                                        <td><span class="status-approved">Approved</span></td>
                                        <td>Partner Account</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Mark Paid</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PAY-2026-003</td>
                                        <td>Ibrahim Musa</td>
                                        <td>Driver</td>
                                        <td>₦12,500</td>
                                        <td>2026-03-03</td>
                                        <td><span class="status-paid">Paid</span></td>
                                        <td>Driver Account</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Receipt</a>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PAY-2026-004</td>
                                        <td>Sade Bello</td>
                                        <td>Driver</td>
                                        <td>₦17,000</td>
                                        <td>2026-03-02</td>
                                        <td><span class="status-hold">On Hold</span></td>
                                        <td>Driver Account</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Release</a>
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
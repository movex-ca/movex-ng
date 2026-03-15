<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-disputes.html
        PURPOSE:
        Admin page for financial, delivery, payout, and payment disputes.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/disputes/submit/filter_disputes_submit.php
        - ../admin/disputes/submit/dispute_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Disputes</title>
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
            min-width: 1140px;
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

        .status-open,
        .status-review,
        .status-resolved,
        .status-escalated {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-open {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-review {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .status-resolved {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-escalated {
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
            <strong>Dispute Management</strong>
            <span>This page is reserved for payment issues, payout disputes, delivery complaints, and escalations.</span>
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
                <div class="menu-group-title">Resolution Centre</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-disputes.html">
                            <span class="menu-icon">⚖️</span>
                            <span class="menu-text"><strong>Disputes</strong><span>Payment and order issues</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders</strong><span>All logistics orders</span></span>
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
                            <h1>Dispute Management</h1>
                            <p>Track order, payout, wallet, and payment disputes from a single admin resolution page.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Disputes</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Open Cases</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">26</div>
                            <div class="stat-note">Cases awaiting action</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Under Review</span>
                                <span class="stat-icon">🔎</span>
                            </div>
                            <div class="stat-value">11</div>
                            <div class="stat-note">Currently being investigated</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Resolved</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">83</div>
                            <div class="stat-note">Resolved successfully</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Escalated</span>
                                <span class="stat-icon">⚠️</span>
                            </div>
                            <div class="stat-value">4</div>
                            <div class="stat-note">Cases requiring higher review</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Disputes</h3>
                                <p>Search by dispute ref, account type, dispute type, or status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/disputes/submit/filter_disputes_submit.php
                        -->
                        <form action="../admin/disputes/submit/filter_disputes_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_dispute" placeholder="Search by dispute ref, order no, payout ref, or name" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Payment Issue</option>
                                    <option>Payout Issue</option>
                                    <option>Delivery Complaint</option>
                                    <option>Wallet Dispute</option>
                                </select>
                                <select name="role_filter">
                                    <option value="">All Roles</option>
                                    <option>Customer</option>
                                    <option>Driver</option>
                                    <option>Business Partner</option>
                                    <option>Company Client</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Open</option>
                                    <option>Under Review</option>
                                    <option>Resolved</option>
                                    <option>Escalated</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Dispute Records</h3>
                                <p>Sample listing showing how dispute management may appear in admin control.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Dispute Ref</th>
                                        <th>Account</th>
                                        <th>Type</th>
                                        <th>Linked Ref</th>
                                        <th>Summary</th>
                                        <th>Status</th>
                                        <th>Date Opened</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>DSP-2026-001</td>
                                        <td>Alao Odeleye</td>
                                        <td>Wallet Dispute</td>
                                        <td>UWAL-2026-003</td>
                                        <td>Customer queried held balance on active order</td>
                                        <td><span class="status-open">Open</span></td>
                                        <td>2026-03-05</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Review</a>
                                                <a href="#">Resolve</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DSP-2026-002</td>
                                        <td>Kunle Adeyemi</td>
                                        <td>Payout Issue</td>
                                        <td>PAY-2026-001</td>
                                        <td>Driver payout delay complaint</td>
                                        <td><span class="status-review">Under Review</span></td>
                                        <td>2026-03-04</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Inspect</a>
                                                <a href="#">Update</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DSP-2026-003</td>
                                        <td>PrimeBuild Nigeria Ltd</td>
                                        <td>Payment Issue</td>
                                        <td>INV-2026-002</td>
                                        <td>Company invoice payment confirmation mismatch</td>
                                        <td><span class="status-resolved">Resolved</span></td>
                                        <td>2026-03-02</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">History</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DSP-2026-004</td>
                                        <td>Agege Load Movers Ltd</td>
                                        <td>Delivery Complaint</td>
                                        <td>BIZ-ORD-004</td>
                                        <td>Partner requested escalation over delivery timing issue</td>
                                        <td><span class="status-escalated">Escalated</span></td>
                                        <td>2026-03-01</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Escalation</a>
                                                <a href="#">Assign</a>
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
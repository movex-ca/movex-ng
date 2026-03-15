<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-earnings.html
        PURPOSE:
        Driver page for viewing earnings and payout summaries.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../driver/earnings/submit/filter_earnings_submit.php
        - ../driver/earnings/submit/request_payout_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Earnings</title>
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

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-paid {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-pending {
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
            <strong>Driver Earnings</strong>
            <span>This page is reserved for trip earnings, payout records, and earnings filters.</span>
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
                        <a href="#">
                            <span class="menu-icon">🚚</span>
                            <span class="menu-text"><strong>My Trips</strong><span>Assigned and completed trips</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="driver-earnings.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Earnings</strong><span>Trip income and summary</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="driver-vehicle-details.html">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text"><strong>Vehicle Details</strong><span>Manage vehicle information</span></span>
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
                            <h1>Driver Earnings</h1>
                            <p>Review trip income, payment status, and payout request summaries.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Earnings</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="stats-grid-small">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Today</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦42,500</div>
                            <div class="stat-note">Estimated daily trip earnings</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">This Period</span>
                                <span class="stat-icon">📄</span>
                            </div>
                            <div class="stat-value">₦180,000</div>
                            <div class="stat-note">Total earned within selected period</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Pending Payout</span>
                                <span class="stat-icon">💳</span>
                            </div>
                            <div class="stat-value">₦65,000</div>
                            <div class="stat-note">Awaiting payout settlement</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Earnings</h3>
                                <p>Search trip earnings by date range, payout status, or trip reference.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/earnings/submit/filter_earnings_submit.php
                        -->
                        <form action="../driver/earnings/submit/filter_earnings_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_reference" placeholder="Search by trip or payout reference" />
                                <select name="period_filter">
                                    <option value="">All Periods</option>
                                    <option>This Week</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Paid</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Earnings Records</h3>
                                <p>Sample listing showing how completed trips and payout records may appear.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Trip Date</th>
                                        <th>Pool</th>
                                        <th>Route</th>
                                        <th>Amount</th>
                                        <th>Payout Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>TRP-2026-001</td>
                                        <td>2026-03-01</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos → Oyo</td>
                                        <td>₦38,000</td>
                                        <td><span class="status-badge status-paid">Paid</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Receipt</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRP-2026-002</td>
                                        <td>2026-03-03</td>
                                        <td>Ajeigboro</td>
                                        <td>Lagos → Ogun</td>
                                        <td>₦27,000</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Details</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TRP-2026-003</td>
                                        <td>2026-03-05</td>
                                        <td>Truck</td>
                                        <td>Ogun → Lagos</td>
                                        <td>₦45,000</td>
                                        <td><span class="status-badge status-paid">Paid</span></td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Statement</a>
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
                                <h3>Payout Actions</h3>
                                <p>These cards represent common driver payout actions.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/earnings/submit/request_payout_submit.php
                        -->
                        <form action="../driver/earnings/submit/request_payout_submit.php" method="post">
                            <div class="quick-grid">
                                <a href="#" class="quick-card">
                                    <h4>Request Payout</h4>
                                    <p>Send a payout request for approved earnings after required checks.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Payout History</h4>
                                    <p>Open a list of all settled and pending payout transactions.</p>
                                </a>
                                <a href="#" class="quick-card">
                                    <h4>Earnings Statement</h4>
                                    <p>View grouped earnings by trip, date, and payout status.</p>
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
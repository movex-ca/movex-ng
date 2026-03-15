<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/business-notifications.html
        PURPOSE:
        Business partner page for notifications and operational messages.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../business/notifications/submit/filter_business_notifications_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Notifications</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
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

        .notice-list {
            display: grid;
            gap: 14px;
        }

        .notice-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .notice-top {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .notice-top h4 {
            font-size: 16px;
            color: var(--text-dark);
        }

        .notice-top span {
            font-size: 12px;
            color: var(--text-mid);
        }

        .notice-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .notice-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        .notice-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .notice-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
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
            <strong>Business Notifications</strong>
            <span>This page is reserved for partner company alerts, approvals, job notices, and commission messages.</span>
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
                    <li class="menu-item active">
                        <a href="business-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>Business updates and alerts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="business-commissions.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Commissions</strong><span>Commission tracking area</span></span>
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
                            <h1>Business Notifications</h1>
                            <p>Review company alerts, driver notices, order updates, and commission-related messages.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Partner Alerts</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Notifications</h3>
                                <p>Search by subject, category, or message state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../business/notifications/submit/filter_business_notifications_submit.php
                        -->
                        <form action="../business/notifications/submit/filter_business_notifications_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_notice" placeholder="Search by alert title, order ref, or driver name" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Orders</option>
                                    <option>Drivers</option>
                                    <option>Commissions</option>
                                    <option>System</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All States</option>
                                    <option>Unread</option>
                                    <option>Read</option>
                                    <option>Archived</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="notice-list">
                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Driver Submission Pending Review</h4>
                                <span>Today, 8:40 AM</span>
                            </div>
                            <p>
                                Two newly submitted drivers under your business account are pending admin approval.
                                One record is awaiting document completion.
                            </p>
                            <span class="notice-tag">Drivers</span>
                            <span class="notice-tag">Unread</span>
                            <div class="notice-actions">
                                <a href="#">Review</a>
                                <a href="#">Mark as Read</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Commission Period Updated</h4>
                                <span>Yesterday, 2:10 PM</span>
                            </div>
                            <p>
                                Your latest commission summary for the current period has been updated with newly completed jobs.
                            </p>
                            <span class="notice-tag">Commissions</span>
                            <span class="notice-tag">Read</span>
                            <div class="notice-actions">
                                <a href="#">Open Summary</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Order Needs Vehicle Assignment</h4>
                                <span>Monday, 11:30 AM</span>
                            </div>
                            <p>
                                An Ajeigboro pool order linked to your account still requires final driver and vehicle allocation.
                            </p>
                            <span class="notice-tag">Orders</span>
                            <span class="notice-tag">Unread</span>
                            <div class="notice-actions">
                                <a href="#">Assign</a>
                                <a href="#">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
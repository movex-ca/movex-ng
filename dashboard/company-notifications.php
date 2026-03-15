<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-notifications.html
        PURPOSE:
        Company client page for alerts, billing notices, and order-related messages.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../company/notifications/submit/filter_company_notifications_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Notifications</title>
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
            <strong>Company Notifications</strong>
            <span>This page is reserved for company order alerts, billing notices, and authorized-user messages.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Company Client Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">CC</div>
                    <div class="profile-meta">
                        <h2>Company Account</h2>
                        <p>Corporate Service User</p>
                    </div>
                </div>
                <span class="role-badge">Company Client</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Company overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Company Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-billing.html">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text"><strong>Billing / Payments</strong><span>Invoices and payments</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="company-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>Company account updates</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Company</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-profile.html">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text"><strong>Company Profile</strong><span>Corporate details</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-authorized-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Authorized Users</strong><span>Manage staff access</span></span>
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
                            <h1>Company Notifications</h1>
                            <p>Review order updates, invoice alerts, promo notices, and account activity messages.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Company Alerts</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Notifications</h3>
                                <p>Search by message title, type, or state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/notifications/submit/filter_company_notifications_submit.php
                        -->
                        <form action="../company/notifications/submit/filter_company_notifications_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_notice" placeholder="Search by invoice ref, order no, or alert title" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Orders</option>
                                    <option>Billing</option>
                                    <option>Promotions</option>
                                    <option>Users</option>
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
                                <h4>Invoice INV-2026-002 is Due</h4>
                                <span>Today, 9:10 AM</span>
                            </div>
                            <p>
                                Your company invoice for the current billing period is still open and awaiting settlement.
                            </p>
                            <span class="notice-tag">Billing</span>
                            <span class="notice-tag">Unread</span>
                            <div class="notice-actions">
                                <a href="#">Open Invoice</a>
                                <a href="#">Mark as Read</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Order CORD-2026-001 is In Progress</h4>
                                <span>Yesterday, 1:45 PM</span>
                            </div>
                            <p>
                                Your company order from Lagos to Ogun is currently in transit with an assigned driver.
                            </p>
                            <span class="notice-tag">Orders</span>
                            <span class="notice-tag">Read</span>
                            <div class="notice-actions">
                                <a href="#">Track</a>
                                <a href="#">Details</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Authorized User Added</h4>
                                <span>Monday, 10:05 AM</span>
                            </div>
                            <p>
                                A new staff account has been added under your company profile with order-creation access.
                            </p>
                            <span class="notice-tag">Users</span>
                            <span class="notice-tag">Unread</span>
                            <div class="notice-actions">
                                <a href="#">View User</a>
                                <a href="#">Permissions</a>
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
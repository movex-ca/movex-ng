<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-notifications.html
        PURPOSE:
        Admin page for system notifications, alerts, and review messages.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/notifications/submit/filter_notifications_submit.php
        - ../admin/notifications/submit/notification_action_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Notifications</title>
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
            margin-bottom: 12px;
        }

        .notice-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .notice-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
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
            font-weight: 700;
            font-size: 13px;
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
            <strong>Admin Notifications</strong>
            <span>This page is reserved for system alerts, approvals, warnings, and admin broadcast notices.</span>
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
                <div class="menu-group-title">Overview</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>System updates and alerts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-settings.html">
                            <span class="menu-icon">⚙</span>
                            <span class="menu-text"><strong>Settings</strong><span>Global platform controls</span></span>
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
                            <h1>Admin Notifications</h1>
                            <p>Review operational alerts, approvals, notices, and platform system messages.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">System Alerts</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Notifications</h3>
                                <p>Search by keyword, category, or notification status.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/notifications/submit/filter_notifications_submit.php
                        -->
                        <form action="../admin/notifications/submit/filter_notifications_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_notification" placeholder="Search by message, user, pool, or reference" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Approval</option>
                                    <option>Warning</option>
                                    <option>Payment</option>
                                    <option>System</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
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
                                <h4>Pending Driver Approval Alert</h4>
                                <span>Today, 10:24 AM</span>
                            </div>
                            <p>
                                A new batch of drivers submitted under Agege Load Movers Ltd is awaiting admin review.
                                Some records include pending vehicle papers and incomplete ID documents.
                            </p>
                            <div class="notice-tags">
                                <span class="notice-tag">Approval</span>
                                <span class="notice-tag">Drivers</span>
                                <span class="notice-tag">Unread</span>
                            </div>
                            <div class="notice-actions">
                                <a href="#">Open</a>
                                <a href="#">Mark as Read</a>
                                <a href="#">Archive</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Insurance Rule Reminder</h4>
                                <span>Yesterday, 4:18 PM</span>
                            </div>
                            <p>
                                Petrol Tanker and Frozen Foods pools currently require insurance review updates
                                before the next production release stage.
                            </p>
                            <div class="notice-tags">
                                <span class="notice-tag">System</span>
                                <span class="notice-tag">Insurance</span>
                                <span class="notice-tag">Read</span>
                            </div>
                            <div class="notice-actions">
                                <a href="#">View Rule</a>
                                <a href="#">Flag</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Company Promo Request Notice</h4>
                                <span>Monday, 11:05 AM</span>
                            </div>
                            <p>
                                GreenFoods Distribution has requested promo eligibility review based on projected
                                delivery volume and company account activity.
                            </p>
                            <div class="notice-tags">
                                <span class="notice-tag">Company Client</span>
                                <span class="notice-tag">Promo</span>
                                <span class="notice-tag">Unread</span>
                            </div>
                            <div class="notice-actions">
                                <a href="#">Review</a>
                                <a href="#">Mark as Read</a>
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
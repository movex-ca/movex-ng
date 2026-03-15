<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-notifications.html
        PURPOSE:
        Driver page for job notices, document alerts, payout updates, and account messages.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../driver/notifications/submit/filter_driver_notifications_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Notifications</title>
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
            <strong>Driver Notifications</strong>
            <span>This page is reserved for job alerts, document reminders, and payout notifications.</span>
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
                        <a href="driver-available-jobs.html">
                            <span class="menu-icon">📥</span>
                            <span class="menu-text"><strong>Available Jobs</strong><span>Jobs ready for pickup</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-trips.html">
                            <span class="menu-icon">🚚</span>
                            <span class="menu-text"><strong>My Trips</strong><span>Assigned and completed trips</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="driver-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>Trip and account alerts</span></span>
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
                            <h1>Driver Notifications</h1>
                            <p>Review available job alerts, approval messages, payout updates, and document reminders.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Driver Alerts</span>
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
                            ../driver/notifications/submit/filter_driver_notifications_submit.php
                        -->
                        <form action="../driver/notifications/submit/filter_driver_notifications_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_notice" placeholder="Search by trip no, job ref, or title" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Jobs</option>
                                    <option>Trips</option>
                                    <option>Payouts</option>
                                    <option>Documents</option>
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
                                <h4>New Job Available in Your Pool</h4>
                                <span>Today, 9:05 AM</span>
                            </div>
                            <p>
                                A new Ajeigboro pool job from Lagos to Oyo is available for approved drivers in your area.
                            </p>
                            <span class="notice-tag">Jobs</span>
                            <span class="notice-tag">Unread</span>
                            <div class="notice-actions">
                                <a href="#">Open Job</a>
                                <a href="#">Mark as Read</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Payout Request Still Pending</h4>
                                <span>Yesterday, 3:20 PM</span>
                            </div>
                            <p>
                                Your most recent payout request is still under admin review and has not been settled yet.
                            </p>
                            <span class="notice-tag">Payouts</span>
                            <span class="notice-tag">Read</span>
                            <div class="notice-actions">
                                <a href="#">Open Wallet</a>
                            </div>
                        </div>

                        <div class="notice-card">
                            <div class="notice-top">
                                <h4>Vehicle Papers Reminder</h4>
                                <span>Monday, 12:10 PM</span>
                            </div>
                            <p>
                                Please update your vehicle papers to keep your account in good standing for job assignment.
                            </p>
                            <span class="notice-tag">Documents</span>
                            <span class="notice-tag">Unread</span>
                            <div class="notice-actions">
                                <a href="#">Upload Documents</a>
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
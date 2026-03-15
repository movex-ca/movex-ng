<?php
require_once __DIR__ . '/../config/base.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-dashboard.html
        PURPOSE:
        User dashboard shell layout for Movex Nigeria.

        HTML ONLY:
        This is the dashboard framework where internal user pages
        will later open inside the main content area.

        NO FORM SUBMISSION HERE:
        This is a navigation and layout shell.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | User Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />

    <!-- Shared dashboard stylesheet -->
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>
<body>
    <!-- Global toast/message placeholder area -->
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Welcome to Movex</strong>
            <span>This is the global message/toast area reserved for platform-wide notifications.</span>
        </div>
    </div>

    <!-- Mobile overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <!-- =====================================================
             LEFT SIDEBAR MENU
             User dashboard left navigation
             ===================================================== -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Nigeria Logistics Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">AO</div>
                    <div class="profile-meta">
                        <h2>Alao Odeleye</h2>
                        <p>Customer Account</p>
                    </div>
                </div>
                <span class="role-badge">User Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item active">
                        <a href="user-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text">
                                <strong>Dashboard</strong>
                                <span>Overview and activity</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text">
                                <strong>New Order</strong>
                                <span>Create logistics request</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text">
                                <strong>My Orders</strong>
                                <span>Track and manage orders</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📍</span>
                            <span class="menu-text">
                                <strong>Track Delivery</strong>
                                <span>View order status</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text">
                                <strong>Wallet / Payments</strong>
                                <span>Payment and balance area</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Account</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">👤</span>
                            <span class="menu-text">
                                <strong>Profile</strong>
                                <span>Manage account details</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text">
                                <strong>Addresses</strong>
                                <span>Saved pickup and drop-off</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🎁</span>
                            <span class="menu-text">
                                <strong>Promotions</strong>
                                <span>Discounts and special offers</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🎓</span>
                            <span class="menu-text">
                                <strong>Student Verification</strong>
                                <span>Upload ID for review</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Support</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text">
                                <strong>Notifications</strong>
                                <span>Updates and alerts</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="../terms.html">
                            <span class="menu-icon">📄</span>
                            <span class="menu-text">
                                <strong>Terms</strong>
                                <span>Platform terms</span>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="../privacy.html">
                            <span class="menu-icon">🔒</span>
                            <span class="menu-text">
                                <strong>Privacy</strong>
                                <span>Privacy information</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="../forms/auth/login.html">
                            <span class="menu-icon">↩</span>
                            <span class="menu-text">
                                <strong>Logout</strong>
                                <span>Return to login</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- =====================================================
             RIGHT MAIN DASHBOARD AREA
             ===================================================== -->
        <main class="dashboard-main">
            <!-- Top header -->
            <header class="dashboard-header">
                <div class="header-row">
                    <div class="header-left">
                        <button class="menu-toggle" data-menu-open aria-label="Open menu">☰</button>
                        <div class="page-heading">
                            <h1>User Dashboard</h1>
                            <p>Manage your orders, payments, and account activity.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">NG / +234</span>
                        <a href="#" class="header-button">Quick Action</a>
                    </div>
                </div>
            </header>

            <!-- Main content area where user pages will open -->
            <section class="dashboard-content">
                <div class="content-stack">
                    <!-- Hero welcome banner -->
                    <div class="hero-card">
                        <h2>Welcome back to Movex Nigeria</h2>
                        <p>
                            This dashboard is the main workspace for your account. All customer-related pages,
                            orders, promotions, notifications, and future forms can open inside this dashboard shell.
                        </p>
                        <div class="hero-actions">
                            <a href="#" class="btn-primary">Create New Order</a>
                            <a href="#" class="btn-secondary">Complete Profile</a>
                        </div>
                    </div>

                    <!-- Dashboard summary cards -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Total Orders</span>
                                <span class="stat-icon">📦</span>
                            </div>
                            <div class="stat-value">24</div>
                            <div class="stat-note">Orders created on your account</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Active Deliveries</span>
                                <span class="stat-icon">🚚</span>
                            </div>
                            <div class="stat-value">3</div>
                            <div class="stat-note">Deliveries currently in progress</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Wallet Balance</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦85,000</div>
                            <div class="stat-note">Available account balance</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Notifications</span>
                                <span class="stat-icon">🔔</span>
                            </div>
                            <div class="stat-value">7</div>
                            <div class="stat-note">Unread updates on your account</div>
                        </div>
                    </div>

                    <!-- Quick links -->
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Quick Actions</h3>
                                <p>Shortcuts to the pages most users open frequently.</p>
                            </div>
                            <a href="#" class="panel-link">View all</a>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Create Order</h4>
                                <p>Open the order request form and start a new logistics booking.</p>
                            </a>

                            <a href="#" class="quick-card">
                                <h4>Track an Order</h4>
                                <p>Check updates on dispatch, delivery movement, and completion status.</p>
                            </a>

                            <a href="#" class="quick-card">
                                <h4>Upload Student ID</h4>
                                <p>Submit your student verification request for admin promo review.</p>
                            </a>

                            <a href="#" class="quick-card">
                                <h4>Manage Addresses</h4>
                                <p>Save and update your common pickup and drop-off locations.</p>
                            </a>

                            <a href="#" class="quick-card">
                                <h4>View Promotions</h4>
                                <p>See discounts, offers, and account-based campaign opportunities.</p>
                            </a>

                            <a href="#" class="quick-card">
                                <h4>Contact Support</h4>
                                <p>Open help and support pages when you need assistance.</p>
                            </a>
                        </div>
                    </div>

                    <!-- Recent activity -->
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Recent Activity</h3>
                                <p>Recent actions and updates that can later be replaced with live data.</p>
                            </div>
                            <a href="#" class="panel-link">See more</a>
                        </div>

                        <div class="activity-list">
                            <div class="activity-item">
                                <div class="activity-badge">📦</div>
                                <div class="activity-text">
                                    <h4>Order Created</h4>
                                    <p>Your recent delivery request was created successfully and is awaiting assignment.</p>
                                    <div class="activity-time">Today, 10:20 AM</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-badge">🎓</div>
                                <div class="activity-text">
                                    <h4>Student Verification Pending</h4>
                                    <p>Your student promo request has been submitted and is pending admin review.</p>
                                    <div class="activity-time">Yesterday, 4:15 PM</div>
                                </div>
                            </div>

                            <div class="activity-item">
                                <div class="activity-badge">💳</div>
                                <div class="activity-text">
                                    <h4>Wallet Credit Added</h4>
                                    <p>A recent payment has been added to your wallet and is available for use.</p>
                                    <div class="activity-time">Monday, 9:05 AM</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content placeholder -->
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Content Display Area</h3>
                                <p>This section represents where other internal pages will later load inside the dashboard.</p>
                            </div>
                        </div>

                        <p style="font-size: 14px; line-height: 1.8; color: #667085;">
                            Examples of pages that can open here later include profile forms, new order pages,
                            order details, tracking pages, wallet pages, notifications, and other user modules.
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-dashboard.html
        PURPOSE:
        Company Client dashboard shell layout.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company Client Dashboard</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Company Notice</strong>
            <span>This area is reserved for company order alerts, billing notices, and promo updates.</span>
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
                    <li class="menu-item active">
                        <a href="company-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text">
                                <strong>Dashboard</strong>
                                <span>Company overview</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text">
                                <strong>New Company Order</strong>
                                <span>Create a company logistics request</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text">
                                <strong>Company Orders</strong>
                                <span>Track and manage orders</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text">
                                <strong>Authorized Users</strong>
                                <span>Manage staff access</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text">
                                <strong>Billing / Payments</strong>
                                <span>Invoices and payments</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Company</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text">
                                <strong>Company Profile</strong>
                                <span>Corporate details and address</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🎁</span>
                            <span class="menu-text">
                                <strong>Promotions</strong>
                                <span>Promos and discount status</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📊</span>
                            <span class="menu-text">
                                <strong>Reports</strong>
                                <span>Order and billing reports</span>
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
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text">
                                <strong>Notifications</strong>
                                <span>Company account updates</span>
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

        <main class="dashboard-main">
            <header class="dashboard-header">
                <div class="header-row">
                    <div class="header-left">
                        <button class="menu-toggle" data-menu-open aria-label="Open menu">☰</button>
                        <div class="page-heading">
                            <h1>Company Client Dashboard</h1>
                            <p>Manage company orders, staff access, billing, and corporate requests.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Corporate Account</span>
                        <a href="#" class="header-button">New Order</a>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="hero-card">
                        <h2>Company logistics workspace</h2>
                        <p>
                            This dashboard is the main shell for company client pages. New company orders,
                            authorized users, billing, reports, and company profile pages will later open here.
                        </p>
                        <div class="hero-actions">
                            <a href="#" class="btn-primary">Create Company Order</a>
                            <a href="#" class="btn-secondary">Manage Users</a>
                        </div>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Monthly Orders</span>
                                <span class="stat-icon">📦</span>
                            </div>
                            <div class="stat-value">63</div>
                            <div class="stat-note">Orders created this month</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Active Users</span>
                                <span class="stat-icon">👥</span>
                            </div>
                            <div class="stat-value">9</div>
                            <div class="stat-note">Authorized staff on account</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Open Invoices</span>
                                <span class="stat-icon">💳</span>
                            </div>
                            <div class="stat-value">₦320,000</div>
                            <div class="stat-note">Pending company payment total</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Promo Status</span>
                                <span class="stat-icon">🎁</span>
                            </div>
                            <div class="stat-value">Eligible</div>
                            <div class="stat-note">Company discount class status</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Company Quick Actions</h3>
                                <p>Open the most used company pages quickly.</p>
                            </div>
                            <a href="#" class="panel-link">Open more</a>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>New Company Order</h4>
                                <p>Create a logistics request under the company account.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Authorized Users</h4>
                                <p>Add and manage staff allowed to place company orders.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Company Orders</h4>
                                <p>Review all past and active company requests.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Billing</h4>
                                <p>Open invoices, payment records, and billing summaries.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Promotions</h4>
                                <p>Check available corporate pricing and promo eligibility.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Reports</h4>
                                <p>View operational and usage reports for your company account.</p>
                            </a>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Company Content Display Area</h3>
                                <p>Future company client pages will be shown inside this dashboard structure.</p>
                            </div>
                        </div>

                        <p style="font-size: 14px; line-height: 1.8; color: #667085;">
                            Future pages include company order forms, authorized user setup, corporate reports,
                            invoice pages, billing records, profile management, and promo pages.
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
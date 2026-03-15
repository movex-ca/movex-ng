<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/business-dashboard.html
        PURPOSE:
        Business Logistics Partner dashboard shell layout.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Business Partner Dashboard</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Business Notice</strong>
            <span>This area is reserved for partner approvals, driver notices, and commission messages.</span>
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
                    <li class="menu-item active">
                        <a href="business-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text">
                                <strong>Dashboard</strong>
                                <span>Business overview</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🏢</span>
                            <span class="menu-text">
                                <strong>Company Profile</strong>
                                <span>Business details and records</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text">
                                <strong>Registered Drivers</strong>
                                <span>Drivers under your company</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text">
                                <strong>Vehicles</strong>
                                <span>Manage company vehicles</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🧭</span>
                            <span class="menu-text">
                                <strong>Pools</strong>
                                <span>Service pool participation</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text">
                                <strong>Orders / Jobs</strong>
                                <span>Business delivery operations</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">✅</span>
                            <span class="menu-text">
                                <strong>Driver Approvals</strong>
                                <span>Submitted drivers and status</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🛡</span>
                            <span class="menu-text">
                                <strong>Insurance</strong>
                                <span>Coverage setup and options</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text">
                                <strong>Commissions</strong>
                                <span>Commission tracking area</span>
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
                                <span>Business updates and alerts</span>
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
                            <h1>Business Partner Dashboard</h1>
                            <p>Manage drivers, vehicles, pools, operations, and commissions.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Partner Active</span>
                        <a href="#" class="header-button">Register Driver</a>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="hero-card">
                        <h2>Partner operations control area</h2>
                        <p>
                            This dashboard is the main workspace for partner businesses. All driver registration,
                            vehicle management, company records, jobs, and commission pages will later open here.
                        </p>
                        <div class="hero-actions">
                            <a href="#" class="btn-primary">Add Driver</a>
                            <a href="#" class="btn-secondary">Manage Vehicles</a>
                        </div>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Registered Drivers</span>
                                <span class="stat-icon">🛵</span>
                            </div>
                            <div class="stat-value">48</div>
                            <div class="stat-note">Drivers onboarded under company</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Vehicles</span>
                                <span class="stat-icon">🚘</span>
                            </div>
                            <div class="stat-value">31</div>
                            <div class="stat-note">Company vehicles on record</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Active Jobs</span>
                                <span class="stat-icon">📦</span>
                            </div>
                            <div class="stat-value">15</div>
                            <div class="stat-note">Jobs currently ongoing</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Commission</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦210,000</div>
                            <div class="stat-note">Estimated period commission</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Business Quick Actions</h3>
                                <p>Open your main partner pages faster.</p>
                            </div>
                            <a href="#" class="panel-link">Open more</a>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Register Driver</h4>
                                <p>Add a new driver under your company account for admin review.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Manage Vehicles</h4>
                                <p>Update vehicle records and service readiness information.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Driver Status</h4>
                                <p>Track approved, pending, and rejected company drivers.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Pools</h4>
                                <p>See which pools your business is currently approved to operate in.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Insurance</h4>
                                <p>Review company insurance setup and vehicle requirements.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Commission Report</h4>
                                <p>See how your business earns commission through Movex operations.</p>
                            </a>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Business Content Display Area</h3>
                                <p>Future partner business pages will be shown inside this dashboard structure.</p>
                            </div>
                        </div>

                        <p style="font-size: 14px; line-height: 1.8; color: #667085;">
                            Future pages include driver onboarding forms, vehicle records, approvals,
                            pool participation, insurance setup, payout and commission pages, and company profile editing.
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
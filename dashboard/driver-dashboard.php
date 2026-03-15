<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-dashboard.html
        PURPOSE:
        Driver dashboard shell layout for Movex Nigeria.

        HTML ONLY:
        This is the dashboard framework where driver pages
        will later open inside the main content area.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Dashboard</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Driver Notice</strong>
            <span>This reserved area will later show trip alerts, approvals, and payout notifications.</span>
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
                    <li class="menu-item active">
                        <a href="driver-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text">
                                <strong>Dashboard</strong>
                                <span>Overview and trip activity</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📥</span>
                            <span class="menu-text">
                                <strong>Available Jobs</strong>
                                <span>Jobs ready for pickup</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🚚</span>
                            <span class="menu-text">
                                <strong>My Trips</strong>
                                <span>Assigned and completed trips</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text">
                                <strong>Earnings</strong>
                                <span>Trip income and summary</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">💳</span>
                            <span class="menu-text">
                                <strong>Wallet / Payouts</strong>
                                <span>Payout and balance area</span>
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
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text">
                                <strong>Vehicle Details</strong>
                                <span>Manage vehicle information</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🧭</span>
                            <span class="menu-text">
                                <strong>Pool Assignment</strong>
                                <span>View current pool placement</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📄</span>
                            <span class="menu-text">
                                <strong>Documents</strong>
                                <span>Licence and verification docs</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🛡</span>
                            <span class="menu-text">
                                <strong>Insurance</strong>
                                <span>Coverage and requirements</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🤝</span>
                            <span class="menu-text">
                                <strong>Association Status</strong>
                                <span>Garage and association info</span>
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
                                <span>Driver profile details</span>
                            </span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text">
                                <strong>Notifications</strong>
                                <span>Trip and account alerts</span>
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
                            <h1>Driver Dashboard</h1>
                            <p>Manage jobs, vehicle details, earnings, and approval status.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">State: Lagos</span>
                        <a href="#" class="header-button">Go Online</a>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="hero-card">
                        <h2>Welcome to your driver workspace</h2>
                        <p>
                            This dashboard is the main area for all driver pages. Jobs, documents,
                            payouts, vehicle details, pool assignment, and profile pages will later open here.
                        </p>
                        <div class="hero-actions">
                            <a href="#" class="btn-primary">View Available Jobs</a>
                            <a href="#" class="btn-secondary">Upload Documents</a>
                        </div>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Available Jobs</span>
                                <span class="stat-icon">📥</span>
                            </div>
                            <div class="stat-value">12</div>
                            <div class="stat-note">Jobs currently open in your area</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Active Trips</span>
                                <span class="stat-icon">🚚</span>
                            </div>
                            <div class="stat-value">2</div>
                            <div class="stat-note">Trips currently assigned to you</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Today Earnings</span>
                                <span class="stat-icon">₦</span>
                            </div>
                            <div class="stat-value">₦42,500</div>
                            <div class="stat-note">Estimated daily earnings</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-label">Approval Status</span>
                                <span class="stat-icon">✅</span>
                            </div>
                            <div class="stat-value">Active</div>
                            <div class="stat-note">Driver account currently approved</div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Quick Driver Actions</h3>
                                <p>Open the most used driver pages quickly.</p>
                            </div>
                            <a href="#" class="panel-link">Open more</a>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Available Jobs</h4>
                                <p>Check new jobs in your operating state and city.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>My Trips</h4>
                                <p>View trip history, current jobs, and completed deliveries.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Vehicle Details</h4>
                                <p>Update truck, van, bike, or rider vehicle information.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Upload Licence</h4>
                                <p>Manage documents needed for admin review and compliance.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Wallet / Payout</h4>
                                <p>Review balance, payout history, and earnings details.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Association Info</h4>
                                <p>See tagged garage or association details where applicable.</p>
                            </a>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Driver Content Display Area</h3>
                                <p>Future driver pages will load inside this dashboard structure.</p>
                            </div>
                        </div>

                        <p style="font-size: 14px; line-height: 1.8; color: #667085;">
                            Future pages include trip details, job acceptance, proof of delivery,
                            wallet records, document uploads, vehicle forms, insurance pages, and profile completion.
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
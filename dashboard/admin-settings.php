<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-settings.html
        PURPOSE:
        Admin page for global platform configuration.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../admin/settings/submit/save_settings_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Settings</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .dashboard-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .dashboard-form-group input,
        .dashboard-form-group select,
        .dashboard-form-group textarea {
            width: 100%;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 14px;
            outline: none;
            font-size: 14px;
            background: #fcfff7;
            color: var(--text-dark);
        }

        .dashboard-form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .setting-block {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .setting-block h4 {
            font-size: 16px;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .setting-block p {
            font-size: 13px;
            line-height: 1.6;
            color: var(--text-mid);
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Admin Settings</strong>
            <span>This page is reserved for global platform settings, branding, and default system controls.</span>
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
                    <li class="menu-item">
                        <a href="admin-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>System updates and alerts</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
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
                            <h1>Admin Settings</h1>
                            <p>Configure default platform rules, branding behavior, and operational preferences.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">System Settings</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="quick-grid">
                        <div class="setting-block">
                            <h4>Branding</h4>
                            <p>Default logo, favicon, platform display name, and demo/live environment labels.</p>
                        </div>
                        <div class="setting-block">
                            <h4>Operational Defaults</h4>
                            <p>Global defaults for orders, approvals, insurance prompts, and pricing behavior.</p>
                        </div>
                        <div class="setting-block">
                            <h4>Notifications</h4>
                            <p>Control alert visibility, admin notice categories, and message priorities.</p>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Global Settings Form</h3>
                                <p>This form can later save configurable system-wide settings.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/settings/submit/save_settings_submit.php
                        -->
                        <form action="../admin/settings/submit/save_settings_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="platform_name">Platform Name</label>
                                    <input type="text" id="platform_name" name="platform_name" value="MOVEX Nigeria" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="default_country_code">Default Country Code</label>
                                    <input type="text" id="default_country_code" name="default_country_code" value="+234" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="default_currency">Default Currency</label>
                                    <input type="text" id="default_currency" name="default_currency" value="NGN" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="default_timezone">Default Timezone</label>
                                    <input type="text" id="default_timezone" name="default_timezone" value="Africa/Lagos" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="order_approval_mode">Order Approval Mode</label>
                                    <select id="order_approval_mode" name="order_approval_mode">
                                        <option>Admin Controlled</option>
                                        <option>Auto Assign</option>
                                        <option>Hybrid</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="student_promo_mode">Student Promo Mode</label>
                                    <select id="student_promo_mode" name="student_promo_mode">
                                        <option>Admin Review Required</option>
                                        <option>Disabled</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="global_note">Global Note</label>
                                    <textarea id="global_note" name="global_note" placeholder="Enter internal system note or default platform message"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Settings</button>
                                </div>
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
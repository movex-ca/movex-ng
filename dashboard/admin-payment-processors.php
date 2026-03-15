<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-payment-processors.html
        PURPOSE:
        Admin page for managing payment processors and master processor settings.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/payment-processors/submit/save_processor_submit.php
        - ../admin/payment-processors/submit/filter_processors_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Payment Processors</title>
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
            min-height: 90px;
            resize: vertical;
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

        .processor-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .processor-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .processor-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .processor-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .processor-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-right: 8px;
            margin-bottom: 8px;
        }

        .tag-active {
            background: #eefceb;
            color: #2d7a2d;
        }

        .tag-backup {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .tag-down {
            background: #fff0f0;
            color: #b14343;
        }

        .processor-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .processor-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .processor-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 900px) {
            .toolbar-grid {
                grid-template-columns: 2fr 1fr 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Payment Processor Management</strong>
            <span>This page is reserved for master processors, backups, and processor activation control.</span>
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
                <div class="menu-group-title">Payments</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-payment-processors.html">
                            <span class="menu-icon">🏦</span>
                            <span class="menu-text"><strong>Payment Processors</strong><span>Main processor control</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-processor-states.html">
                            <span class="menu-icon">🗺️</span>
                            <span class="menu-text"><strong>Processor States</strong><span>Regional processor map</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-backup-processors.html">
                            <span class="menu-icon">🔁</span>
                            <span class="menu-text"><strong>Backup Processors</strong><span>Fallback routing</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-disputes.html">
                            <span class="menu-icon">⚖️</span>
                            <span class="menu-text"><strong>Disputes</strong><span>Payment and order issues</span></span>
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
                            <h1>Payment Processor Management</h1>
                            <p>Manage active processors, backup processors, and processor readiness for Nigeria operations.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Processors</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add / Update Processor</h3>
                                <p>Create a main or backup processor record and define status settings.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/payment-processors/submit/save_processor_submit.php
                        -->
                        <form action="../admin/payment-processors/submit/save_processor_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="processor_name">Processor Name</label>
                                    <input type="text" id="processor_name" name="processor_name" placeholder="Enter processor name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="processor_code">Processor Code</label>
                                    <input type="text" id="processor_code" name="processor_code" placeholder="Enter processor code" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="processor_type">Processor Type</label>
                                    <select id="processor_type" name="processor_type">
                                        <option value="">Select type</option>
                                        <option>Main Processor</option>
                                        <option>Backup Processor</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="processor_channel">Payment Channel</label>
                                    <select id="processor_channel" name="processor_channel">
                                        <option value="">Select channel</option>
                                        <option>Card</option>
                                        <option>Bank Transfer</option>
                                        <option>USSD</option>
                                        <option>Virtual Account</option>
                                        <option>Mixed Channels</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="is_active">is_active</label>
                                    <select id="is_active" name="is_active">
                                        <option value="">Select state</option>
                                        <option>1</option>
                                        <option>0</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="down_time">down_time</label>
                                    <select id="down_time" name="down_time">
                                        <option value="">Select state</option>
                                        <option>0</option>
                                        <option>1</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="processor_note">Note</label>
                                    <textarea id="processor_note" name="processor_note" placeholder="Enter processor note, credentials reference, or admin note"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Processor</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Processors</h3>
                                <p>Search by name, type, active state, or downtime state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/payment-processors/submit/filter_processors_submit.php
                        -->
                        <form action="../admin/payment-processors/submit/filter_processors_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_processor" placeholder="Search by processor name or code" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>Main Processor</option>
                                    <option>Backup Processor</option>
                                </select>
                                <select name="active_filter">
                                    <option value="">All Active States</option>
                                    <option>is_active = 1</option>
                                    <option>is_active = 0</option>
                                </select>
                                <select name="down_filter">
                                    <option value="">All Down States</option>
                                    <option>down_time = 1</option>
                                    <option>down_time = 0</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="processor-grid">
                        <div class="processor-card">
                            <h4>Paystack Main NG</h4>
                            <p>Main live processor for Nigerian payments across company and user wallet funding.</p>
                            <span class="processor-tag tag-active">is_active = 1</span>
                            <span class="processor-tag tag-active">down_time = 0</span>
                            <span class="processor-tag tag-backup">Main</span>
                            <div class="processor-actions">
                                <a href="#">Edit</a>
                                <a href="#">Credentials</a>
                            </div>
                        </div>

                        <div class="processor-card">
                            <h4>Flutterwave Backup 1</h4>
                            <p>Fallback processor to switch into use when the main processor is down.</p>
                            <span class="processor-tag tag-active">is_active = 1</span>
                            <span class="processor-tag tag-down">down_time = 1</span>
                            <span class="processor-tag tag-backup">Backup</span>
                            <div class="processor-actions">
                                <a href="#">Edit</a>
                                <a href="#">Activate</a>
                            </div>
                        </div>

                        <div class="processor-card">
                            <h4>Monnify Backup 2</h4>
                            <p>Available backup processor for transfer and virtual account collections.</p>
                            <span class="processor-tag tag-active">is_active = 1</span>
                            <span class="processor-tag tag-active">down_time = 0</span>
                            <span class="processor-tag tag-backup">Backup</span>
                            <div class="processor-actions">
                                <a href="#">Edit</a>
                                <a href="#">Prioritize</a>
                            </div>
                        </div>

                        <div class="processor-card">
                            <h4>Legacy Processor</h4>
                            <p>Older processor currently disabled and not in active use.</p>
                            <span class="processor-tag tag-down">is_active = 0</span>
                            <span class="processor-tag tag-active">down_time = 0</span>
                            <span class="processor-tag tag-backup">Inactive</span>
                            <div class="processor-actions">
                                <a href="#">Review</a>
                                <a href="#">Enable</a>
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
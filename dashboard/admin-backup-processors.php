<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-backup-processors.html
        PURPOSE:
        Admin page for backup processor sequencing and failover control.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/backup-processors/submit/save_backup_processor_submit.php
        - ../admin/backup-processors/submit/filter_backup_processor_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Backup Processors</title>
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

        .backup-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .backup-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .backup-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .backup-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .backup-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            margin-right: 8px;
            margin-bottom: 8px;
            background: #eef7d1;
            color: #5d7600;
        }

        .backup-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .backup-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .backup-grid {
                grid-template-columns: repeat(2, 1fr);
            }
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
            <strong>Backup Processor Control</strong>
            <span>This page is reserved for backup sequence, fallback order, and failover routing setup.</span>
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
                    <li class="menu-item active">
                        <a href="admin-backup-processors.html">
                            <span class="menu-icon">🔁</span>
                            <span class="menu-text"><strong>Backup Processors</strong><span>Fallback routing</span></span>
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
                            <h1>Backup Processor Control</h1>
                            <p>Manage failover order and control which processor takes over after downtime.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Failover</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Save Backup Processor Rule</h3>
                                <p>Create or update backup priority sequence for fallback routing.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/backup-processors/submit/save_backup_processor_submit.php
                        -->
                        <form action="../admin/backup-processors/submit/save_backup_processor_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="main_processor_name">Main Processor</label>
                                    <select id="main_processor_name" name="main_processor_name">
                                        <option value="">Select main processor</option>
                                        <option>Paystack Main NG</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="backup_processor_name">Backup Processor</label>
                                    <select id="backup_processor_name" name="backup_processor_name">
                                        <option value="">Select backup processor</option>
                                        <option>Flutterwave Backup 1</option>
                                        <option>Monnify Backup 2</option>
                                        <option>Legacy Processor</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="backup_order">Backup Order</label>
                                    <input type="number" id="backup_order" name="backup_order" placeholder="e.g. 1" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="switch_trigger">Switch Trigger</label>
                                    <select id="switch_trigger" name="switch_trigger">
                                        <option value="">Select trigger</option>
                                        <option>Main down_time = 1</option>
                                        <option>Manual Admin Switch</option>
                                        <option>Channel Failure</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="backup_rule_note">Note</label>
                                    <textarea id="backup_rule_note" name="backup_rule_note" placeholder="Enter note about this backup sequence"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Backup Rule</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Backup Rules</h3>
                                <p>Search backup order by processor, trigger, or sequence.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/backup-processors/submit/filter_backup_processor_submit.php
                        -->
                        <form action="../admin/backup-processors/submit/filter_backup_processor_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_backup_rule" placeholder="Search by processor or rule" />
                                <select name="trigger_filter">
                                    <option value="">All Triggers</option>
                                    <option>Main down_time = 1</option>
                                    <option>Manual Admin Switch</option>
                                    <option>Channel Failure</option>
                                </select>
                                <select name="order_filter">
                                    <option value="">All Orders</option>
                                    <option>Backup Order 1</option>
                                    <option>Backup Order 2</option>
                                    <option>Backup Order 3</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="backup-grid">
                        <div class="backup-card">
                            <h4>Backup Order 1</h4>
                            <p>First fallback when main processor becomes unavailable.</p>
                            <span class="backup-tag">Paystack → Flutterwave</span>
                            <span class="backup-tag">Auto Switch</span>
                            <div class="backup-actions">
                                <a href="#">Edit</a>
                                <a href="#">Test</a>
                            </div>
                        </div>

                        <div class="backup-card">
                            <h4>Backup Order 2</h4>
                            <p>Second fallback routing option for transfer-heavy collections.</p>
                            <span class="backup-tag">Flutterwave → Monnify</span>
                            <span class="backup-tag">Priority 2</span>
                            <div class="backup-actions">
                                <a href="#">Edit</a>
                                <a href="#">Promote</a>
                            </div>
                        </div>

                        <div class="backup-card">
                            <h4>Backup Order 3</h4>
                            <p>Last line fallback route for controlled emergency switchover.</p>
                            <span class="backup-tag">Monnify → Legacy</span>
                            <span class="backup-tag">Manual Review</span>
                            <div class="backup-actions">
                                <a href="#">Review</a>
                                <a href="#">Replace</a>
                            </div>
                        </div>

                        <div class="backup-card">
                            <h4>Transfer Channel Backup</h4>
                            <p>Dedicated fallback path for bank transfer related collections.</p>
                            <span class="backup-tag">Transfer</span>
                            <span class="backup-tag">Channel Specific</span>
                            <div class="backup-actions">
                                <a href="#">Edit</a>
                                <a href="#">Inspect</a>
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
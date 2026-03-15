<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-processor-states.html
        PURPOSE:
        Admin page for assigning processors by state categories and regional grouping.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/processor-states/submit/save_processor_state_submit.php
        - ../admin/processor-states/submit/filter_processor_state_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Processor States</title>
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

        .state-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .state-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .state-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .state-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .state-tag {
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

        .state-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .state-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .state-grid {
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
            <strong>Processor State Mapping</strong>
            <span>This page is reserved for mapping processors to first, second, third, and fourth state categories.</span>
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
                    <li class="menu-item active">
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
                            <h1>Processor State Mapping</h1>
                            <p>Assign processors by state groups and preference categories for routing logic.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">State Mapping</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Create / Update State Category Rule</h3>
                                <p>Use this form to map processors to state categories and preference order.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/processor-states/submit/save_processor_state_submit.php
                        -->
                        <form action="../admin/processor-states/submit/save_processor_state_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="state_name">State</label>
                                    <select id="state_name" name="state_name">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Rivers</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="state_category">State Category</label>
                                    <select id="state_category" name="state_category">
                                        <option value="">Select category</option>
                                        <option>1st Choice</option>
                                        <option>2nd Choice</option>
                                        <option>3rd Choice</option>
                                        <option>4th Choice</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="assigned_processor">Assigned Processor</label>
                                    <select id="assigned_processor" name="assigned_processor">
                                        <option value="">Select processor</option>
                                        <option>Paystack Main NG</option>
                                        <option>Flutterwave Backup 1</option>
                                        <option>Monnify Backup 2</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="priority_order">Priority Order</label>
                                    <input type="number" id="priority_order" name="priority_order" placeholder="e.g. 1" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="state_rule_note">Note</label>
                                    <textarea id="state_rule_note" name="state_rule_note" placeholder="Enter note about the state processor rule"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save State Rule</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter State Processor Rules</h3>
                                <p>Search by state, category, or assigned processor.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/processor-states/submit/filter_processor_state_submit.php
                        -->
                        <form action="../admin/processor-states/submit/filter_processor_state_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_state_rule" placeholder="Search by state or processor" />
                                <select name="category_filter">
                                    <option value="">All Categories</option>
                                    <option>1st Choice</option>
                                    <option>2nd Choice</option>
                                    <option>3rd Choice</option>
                                    <option>4th Choice</option>
                                </select>
                                <select name="processor_filter">
                                    <option value="">All Processors</option>
                                    <option>Paystack Main NG</option>
                                    <option>Flutterwave Backup 1</option>
                                    <option>Monnify Backup 2</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="state-grid">
                        <div class="state-card">
                            <h4>Lagos - 1st Choice</h4>
                            <p>Main processor routing for Lagos collections and wallet funding.</p>
                            <span class="state-tag">Paystack Main NG</span>
                            <span class="state-tag">Priority 1</span>
                            <div class="state-actions">
                                <a href="#">Edit</a>
                                <a href="#">Move</a>
                            </div>
                        </div>

                        <div class="state-card">
                            <h4>Ogun - 2nd Choice</h4>
                            <p>Backup-first mixed routing option when the primary category is unstable.</p>
                            <span class="state-tag">Flutterwave Backup 1</span>
                            <span class="state-tag">Priority 2</span>
                            <div class="state-actions">
                                <a href="#">Edit</a>
                                <a href="#">Reassign</a>
                            </div>
                        </div>

                        <div class="state-card">
                            <h4>Oyo - 3rd Choice</h4>
                            <p>Third preference mapping for fallback transfer and virtual account collections.</p>
                            <span class="state-tag">Monnify Backup 2</span>
                            <span class="state-tag">Priority 3</span>
                            <div class="state-actions">
                                <a href="#">Edit</a>
                                <a href="#">Promote</a>
                            </div>
                        </div>

                        <div class="state-card">
                            <h4>Abuja - 4th Choice</h4>
                            <p>Last choice mapping for isolated routing or planned backup handling.</p>
                            <span class="state-tag">Legacy Processor</span>
                            <span class="state-tag">Priority 4</span>
                            <div class="state-actions">
                                <a href="#">Review</a>
                                <a href="#">Replace</a>
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
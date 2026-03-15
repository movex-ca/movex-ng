<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-insurance.html
        PURPOSE:
        Admin page for managing insurance settings by pool and order type.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/insurance/submit/filter_insurance_submit.php
        - ../admin/insurance/submit/save_insurance_rule_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Insurance</title>
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

        .rule-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .rule-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .rule-card h4 {
            font-size: 16px;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .rule-card p {
            font-size: 13px;
            line-height: 1.6;
            color: var(--text-mid);
            margin-bottom: 10px;
        }

        .rule-pill {
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

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .rule-grid {
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
            <strong>Insurance Management</strong>
            <span>This page is reserved for insurance rules, coverage settings, and pool-based insurance control.</span>
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
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders</strong><span>All logistics orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-insurance.html">
                            <span class="menu-icon">🛡</span>
                            <span class="menu-text"><strong>Insurance</strong><span>Coverage setup</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-pricing.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Pricing</strong><span>Rate and fee rules</span></span>
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
                            <h1>Insurance Management</h1>
                            <p>Control where insurance is optional, required, or restricted across pools and order types.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Insurance Rules</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Search Insurance Rules</h3>
                                <p>Search insurance records by pool, status, or rule type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/insurance/submit/filter_insurance_submit.php
                        -->
                        <form action="../admin/insurance/submit/filter_insurance_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_insurance_rule" placeholder="Search by pool, insurer, or note" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Ajeigboro</option>
                                    <option>Petrol Tanker</option>
                                    <option>Frozen Foods</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Required</option>
                                    <option>Optional</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Pool Insurance Rules</h3>
                                <p>Sample cards showing how insurance rules may be grouped by service pool.</p>
                            </div>
                        </div>

                        <div class="rule-grid">
                            <div class="rule-card">
                                <h4>Dispatch Rider Pool</h4>
                                <p>Insurance may remain optional for lightweight urban delivery under approved thresholds.</p>
                                <span class="rule-pill">Optional</span>
                                <span class="rule-pill">Urban Delivery</span>
                            </div>

                            <div class="rule-card">
                                <h4>Truck Pool</h4>
                                <p>Insurance may depend on goods class, route type, and cargo value.</p>
                                <span class="rule-pill">Conditional</span>
                                <span class="rule-pill">Cargo Value Based</span>
                            </div>

                            <div class="rule-card">
                                <h4>Ajeigboro Pool</h4>
                                <p>Load-carrying truck services may require insurance for higher-value goods or longer routes.</p>
                                <span class="rule-pill">Conditional</span>
                                <span class="rule-pill">Load Truck</span>
                            </div>

                            <div class="rule-card">
                                <h4>Petrol Tanker Pool</h4>
                                <p>Insurance should normally be mandatory due to regulated and high-risk movement.</p>
                                <span class="rule-pill">Required</span>
                                <span class="rule-pill">Regulated</span>
                            </div>

                            <div class="rule-card">
                                <h4>Frozen Foods Pool</h4>
                                <p>Coverage may be required for temperature-sensitive goods depending on contract terms.</p>
                                <span class="rule-pill">Required</span>
                                <span class="rule-pill">Cold Chain</span>
                            </div>

                            <div class="rule-card">
                                <h4>Tipper and Granite Pool</h4>
                                <p>Coverage rules may depend on quarry goods type, project scope, and vehicle classification.</p>
                                <span class="rule-pill">Conditional</span>
                                <span class="rule-pill">Heavy Material</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Create / Update Insurance Rule</h3>
                                <p>Use this form to save a new insurance rule or modify an existing one later.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/insurance/submit/save_insurance_rule_submit.php
                        -->
                        <form action="../admin/insurance/submit/save_insurance_rule_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="insurance_pool">Pool</label>
                                    <select id="insurance_pool" name="insurance_pool">
                                        <option value="">Select pool</option>
                                        <option>Dispatch Rider</option>
                                        <option>Truck</option>
                                        <option>Tipper and Granite</option>
                                        <option>Ajeigboro</option>
                                        <option>Petrol Tanker</option>
                                        <option>Frozen Foods</option>
                                        <option>General</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurance_status">Insurance Status</label>
                                    <select id="insurance_status" name="insurance_status">
                                        <option value="">Select status</option>
                                        <option>Required</option>
                                        <option>Optional</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="minimum_goods_value">Minimum Goods Value</label>
                                    <input type="text" id="minimum_goods_value" name="minimum_goods_value" placeholder="e.g. ₦500,000" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurer_name">Insurer / Provider</label>
                                    <input type="text" id="insurer_name" name="insurer_name" placeholder="Enter insurer or partner name" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="insurance_note">Rule Note</label>
                                    <textarea id="insurance_note" name="insurance_note" placeholder="Enter policy note, requirement, or admin explanation"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Insurance Rule</button>
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
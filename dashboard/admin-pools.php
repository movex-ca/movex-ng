<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-pools.html
        PURPOSE:
        Admin pool management page.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE TARGET:
        Pool listing, add/edit pool form, pricing and insurance rules.
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Pools</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
        .pool-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .pool-box {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .pool-box h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .pool-box p {
            font-size: 13px;
            color: var(--text-mid);
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .pool-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .pool-pill {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
        }

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

        @media (min-width: 768px) {
            .pool-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Pool Management</strong>
            <span>This page is reserved for creating, editing, and controlling Movex service pools.</span>
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
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Accounts</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Drivers</strong><span>Manage driver accounts</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item active">
                        <a href="admin-pools.html">
                            <span class="menu-icon">🧭</span>
                            <span class="menu-text"><strong>Pools</strong><span>Manage pool categories</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">🛡</span>
                            <span class="menu-text"><strong>Insurance</strong><span>Coverage setup</span></span>
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
                            <h1>Pool Management</h1>
                            <p>Create, review, and manage service pools for matching and pricing.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Admin Pools</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Current Pools</h3>
                                <p>These are the main service pools currently planned for Movex Nigeria.</p>
                            </div>
                        </div>

                        <div class="pool-grid">
                            <div class="pool-box">
                                <h4>Dispatch Rider Pool</h4>
                                <p>Urban and short-range delivery services mainly for small package movement.</p>
                                <div class="pool-meta">
                                    <span class="pool-pill">Active</span>
                                    <span class="pool-pill">Bike / Rider</span>
                                </div>
                            </div>

                            <div class="pool-box">
                                <h4>Truck Pool</h4>
                                <p>General truck movement for medium and large delivery requests.</p>
                                <div class="pool-meta">
                                    <span class="pool-pill">Active</span>
                                    <span class="pool-pill">Truck</span>
                                </div>
                            </div>

                            <div class="pool-box">
                                <h4>Tipper and Granite Pool</h4>
                                <p>Special handling category for construction, quarry, and related materials.</p>
                                <div class="pool-meta">
                                    <span class="pool-pill">Active</span>
                                    <span class="pool-pill">Heavy Load</span>
                                </div>
                            </div>

                            <div class="pool-box">
                                <h4>Ajeigboro Pool</h4>
                                <p>Nigeria-specific load-carrying truck category for goods and haulage operations.</p>
                                <div class="pool-meta">
                                    <span class="pool-pill">Active</span>
                                    <span class="pool-pill">Load Truck</span>
                                </div>
                            </div>

                            <div class="pool-box">
                                <h4>Petrol Tanker Pool</h4>
                                <p>Specialized tanker movement with stricter compliance and insurance requirements.</p>
                                <div class="pool-meta">
                                    <span class="pool-pill">Active</span>
                                    <span class="pool-pill">Regulated</span>
                                </div>
                            </div>

                            <div class="pool-box">
                                <h4>Frozen Foods Pool</h4>
                                <p>Temperature-sensitive movement for frozen and cold-chain logistics services.</p>
                                <div class="pool-meta">
                                    <span class="pool-pill">Active</span>
                                    <span class="pool-pill">Cold Chain</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add or Update Pool</h3>
                                <p>This form can later be used to create new pools or edit existing ones.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/pools/pool_save_submit.php
                        -->
                        <form action="../admin/pools/pool_save_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="pool_name">Pool Name</label>
                                    <input type="text" id="pool_name" name="pool_name" placeholder="Enter pool name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="pool_code">Pool Code</label>
                                    <input type="text" id="pool_code" name="pool_code" placeholder="e.g. ajeigboro_pool" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <input type="text" id="vehicle_type" name="vehicle_type" placeholder="e.g. Truck, Bike, Tipper" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="pool_status">Status</label>
                                    <select id="pool_status" name="pool_status">
                                        <option value="">Select status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurance_required">Insurance Required</label>
                                    <select id="insurance_required" name="insurance_required">
                                        <option value="">Select option</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="approval_required">Approval Required</label>
                                    <select id="approval_required" name="approval_required">
                                        <option value="">Select option</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="pool_description">Description</label>
                                    <textarea id="pool_description" name="pool_description" placeholder="Enter pool description"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Pool Settings</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Pool Management Notes</h3>
                                <p>These notes reflect the current direction for the platform.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Pricing Rules</h4>
                                <p>Each pool can later carry its own pricing logic and distance rules.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Insurance Logic</h4>
                                <p>Some pools may require mandatory insurance while others remain optional.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Driver Matching</h4>
                                <p>Orders can be internally mapped to pools for cleaner dispatch and reporting.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html>
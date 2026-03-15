<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-pricing.html
        PURPOSE:
        Admin page for managing pricing rules, fees, and pool-based rate setup.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/pricing/submit/filter_pricing_submit.php
        - ../admin/pricing/submit/save_pricing_rule_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Pricing</title>
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

        .pricing-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .pricing-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .pricing-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .pricing-card p {
            font-size: 13px;
            color: var(--text-mid);
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .price-pill {
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

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .pricing-grid {
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
            <strong>Pricing Management</strong>
            <span>This page is reserved for base rates, pool pricing, distance rules, and service charges.</span>
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
                        <a href="admin-insurance.html">
                            <span class="menu-icon">🛡</span>
                            <span class="menu-text"><strong>Insurance</strong><span>Coverage setup</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-pricing.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Pricing</strong><span>Rate and fee rules</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-pools.html">
                            <span class="menu-icon">🧭</span>
                            <span class="menu-text"><strong>Pools</strong><span>Manage pool categories</span></span>
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
                            <h1>Pricing Management</h1>
                            <p>Set base prices, distance logic, service charges, and pool-specific pricing rules.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Pricing Rules</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Search Pricing Rules</h3>
                                <p>Search by pool, pricing type, or active rule group.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/pricing/submit/filter_pricing_submit.php
                        -->
                        <form action="../admin/pricing/submit/filter_pricing_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_pricing_rule" placeholder="Search by pool, pricing name, or rule note" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Ajeigboro</option>
                                    <option>Tipper and Granite</option>
                                    <option>Frozen Foods</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Current Pricing Rules</h3>
                                <p>Sample cards showing how pricing summaries may appear by pool.</p>
                            </div>
                        </div>

                        <div class="pricing-grid">
                            <div class="pricing-card">
                                <h4>Dispatch Rider Pool</h4>
                                <p>Base rate plus short-distance urban pricing and convenience charges.</p>
                                <span class="price-pill">Base Fare</span>
                                <span class="price-pill">Distance Fee</span>
                            </div>

                            <div class="pricing-card">
                                <h4>Truck Pool</h4>
                                <p>Distance-based and load-based rate setup for standard truck services.</p>
                                <span class="price-pill">Distance Rule</span>
                                <span class="price-pill">Load Rule</span>
                            </div>

                            <div class="pricing-card">
                                <h4>Ajeigboro Pool</h4>
                                <p>Load-carrying truck pricing with route and cargo-value sensitivity.</p>
                                <span class="price-pill">Load Truck</span>
                                <span class="price-pill">Route Fee</span>
                            </div>

                            <div class="pricing-card">
                                <h4>Tipper and Granite Pool</h4>
                                <p>Construction and quarry category pricing based on capacity and material type.</p>
                                <span class="price-pill">Material Fee</span>
                                <span class="price-pill">Capacity Rule</span>
                            </div>

                            <div class="pricing-card">
                                <h4>Frozen Foods Pool</h4>
                                <p>Temperature-sensitive pricing may include cold-chain handling charges.</p>
                                <span class="price-pill">Cold Chain</span>
                                <span class="price-pill">Handling Fee</span>
                            </div>

                            <div class="pricing-card">
                                <h4>Petrol Tanker Pool</h4>
                                <p>Specialized regulated pricing structure with compliance-sensitive surcharges.</p>
                                <span class="price-pill">Regulated</span>
                                <span class="price-pill">Special Rate</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Create / Update Pricing Rule</h3>
                                <p>Use this form to define a new pricing rule or update an existing one later.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/pricing/submit/save_pricing_rule_submit.php
                        -->
                        <form action="../admin/pricing/submit/save_pricing_rule_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="pricing_pool">Pool</label>
                                    <select id="pricing_pool" name="pricing_pool">
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
                                    <label for="pricing_name">Pricing Rule Name</label>
                                    <input type="text" id="pricing_name" name="pricing_name" placeholder="Enter pricing rule name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="base_fare">Base Fare</label>
                                    <input type="text" id="base_fare" name="base_fare" placeholder="e.g. ₦5,000" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="distance_rate">Distance Rate</label>
                                    <input type="text" id="distance_rate" name="distance_rate" placeholder="e.g. ₦300/km" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="minimum_charge">Minimum Charge</label>
                                    <input type="text" id="minimum_charge" name="minimum_charge" placeholder="e.g. ₦2,500" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status">
                                        <option value="">Select status</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="pricing_note">Rule Note</label>
                                    <textarea id="pricing_note" name="pricing_note" placeholder="Enter pricing explanation, surcharge note, or internal rule detail"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Pricing Rule</button>
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
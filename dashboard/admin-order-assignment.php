<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-order-assignment.html
        PURPOSE:
        Admin page for assigning orders to drivers, vehicles, and pools.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/order-assignment/submit/assign_order_submit.php
        - ../admin/order-assignment/submit/filter_assignable_orders_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Order Assignment</title>
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

        .assign-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .assign-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .assign-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .assign-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .assign-tag {
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

        .assign-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .assign-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 700;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .assign-grid {
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
            <strong>Order Assignment Centre</strong>
            <span>This page is reserved for assigning orders to drivers, vehicles, and operational pools.</span>
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
                        <a href="admin-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>Orders</strong><span>All logistics orders</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-order-assignment.html">
                            <span class="menu-icon">🧩</span>
                            <span class="menu-text"><strong>Order Assignment</strong><span>Match orders to drivers</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-driver-approval.html">
                            <span class="menu-icon">✅</span>
                            <span class="menu-text"><strong>Driver Approval</strong><span>Approve driver accounts</span></span>
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
                            <h1>Order Assignment Centre</h1>
                            <p>Assign qualified drivers and vehicles to orders based on pool, state, and readiness.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Assignment</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Assign Order</h3>
                                <p>Select the order, then map it to the appropriate driver, vehicle, and pool.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/order-assignment/submit/assign_order_submit.php
                        -->
                        <form action="../admin/order-assignment/submit/assign_order_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="order_ref">Order Reference</label>
                                    <input type="text" id="order_ref" name="order_ref" placeholder="Enter order reference" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="pool_name">Pool</label>
                                    <select id="pool_name" name="pool_name">
                                        <option value="">Select pool</option>
                                        <option>Dispatch Rider</option>
                                        <option>Truck</option>
                                        <option>Ajeigboro</option>
                                        <option>Tipper and Granite</option>
                                        <option>Frozen Foods</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="driver_name">Driver</label>
                                    <input type="text" id="driver_name" name="driver_name" placeholder="Search or enter driver name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_ref">Vehicle</label>
                                    <input type="text" id="vehicle_ref" name="vehicle_ref" placeholder="Enter vehicle reference or plate number" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="operating_state">Operating State</label>
                                    <select id="operating_state" name="operating_state">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurance_check">Insurance Check</label>
                                    <select id="insurance_check" name="insurance_check">
                                        <option value="">Select option</option>
                                        <option>Confirmed</option>
                                        <option>Not Required</option>
                                        <option>Pending</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="assignment_note">Assignment Note</label>
                                    <textarea id="assignment_note" name="assignment_note" placeholder="Enter assignment note, internal reminder, or dispatch comment"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Assign Order</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Assignable Orders</h3>
                                <p>Search by order, pool, state, or assignment readiness.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/order-assignment/submit/filter_assignable_orders_submit.php
                        -->
                        <form action="../admin/order-assignment/submit/filter_assignable_orders_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_assignable_order" placeholder="Search by order ref, customer, or route" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Dispatch Rider</option>
                                    <option>Truck</option>
                                    <option>Ajeigboro</option>
                                </select>
                                <select name="state_filter">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                </select>
                                <select name="ready_filter">
                                    <option value="">All Assignment States</option>
                                    <option>Ready</option>
                                    <option>Pending Review</option>
                                    <option>Awaiting Driver</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="assign-grid">
                        <div class="assign-card">
                            <h4>ORD-2026-021</h4>
                            <p>Lagos to Oyo movement for construction materials under Ajeigboro pool.</p>
                            <span class="assign-tag">Ajeigboro</span>
                            <span class="assign-tag">Ready</span>
                            <div class="assign-actions">
                                <a href="#">Assign</a>
                                <a href="#">Open</a>
                            </div>
                        </div>

                        <div class="assign-card">
                            <h4>ORD-2026-022</h4>
                            <p>Dispatch rider order inside Lagos with fast delivery timeline.</p>
                            <span class="assign-tag">Dispatch Rider</span>
                            <span class="assign-tag">Awaiting Driver</span>
                            <div class="assign-actions">
                                <a href="#">Match Driver</a>
                                <a href="#">Route</a>
                            </div>
                        </div>

                        <div class="assign-card">
                            <h4>ORD-2026-023</h4>
                            <p>Frozen foods route requiring approved cold-chain vehicle and insurance check.</p>
                            <span class="assign-tag">Frozen Foods</span>
                            <span class="assign-tag">Pending Review</span>
                            <div class="assign-actions">
                                <a href="#">Review</a>
                                <a href="#">Insurance</a>
                            </div>
                        </div>

                        <div class="assign-card">
                            <h4>ORD-2026-024</h4>
                            <p>Truck movement from Ogun to Lagos ready for driver and vehicle matching.</p>
                            <span class="assign-tag">Truck</span>
                            <span class="assign-tag">Ready</span>
                            <div class="assign-actions">
                                <a href="#">Assign</a>
                                <a href="#">Driver Pool</a>
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
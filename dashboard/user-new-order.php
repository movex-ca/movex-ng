<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-new-order.html
        PURPOSE:
        New order page for customer users.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM SUBMISSION TARGET:
        ../orders/submit/create_order_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | New Order</title>
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
            min-height: 110px;
            resize: vertical;
        }

        .dashboard-form-group input:focus,
        .dashboard-form-group select:focus,
        .dashboard-form-group textarea:focus {
            border-color: var(--accent-strong);
            box-shadow: 0 0 0 4px rgba(184, 222, 40, 0.14);
        }

        .order-note {
            background: #fcfff2;
            border: 1px solid #e6efc7;
            border-radius: 16px;
            padding: 14px;
            font-size: 13px;
            color: var(--text-mid);
            line-height: 1.7;
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
            <strong>New Order Page</strong>
            <span>This page is reserved for customer order creation and pool-based service requests.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Nigeria Logistics Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">AO</div>
                    <div class="profile-meta">
                        <h2>Alao Odeleye</h2>
                        <p>Customer Account</p>
                    </div>
                </div>
                <span class="role-badge">User Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="user-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Order</strong><span>Create logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>My Orders</strong><span>Track and manage orders</span></span>
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
                            <h1>Create New Order</h1>
                            <p>Request dispatch, truck, frozen food, tanker, or other logistics services.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Order Request</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="order-note">
                        Customer-facing ordering should remain simple, while the system can still map each service
                        into the correct internal pool for pricing, dispatch, and reporting.
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Order Details</h3>
                                <p>This form is for creating a new logistics request from the user dashboard.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../orders/submit/create_order_submit.php
                        -->
                        <form action="../orders/submit/create_order_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="service_category">Service Category</label>
                                    <select id="service_category" name="service_category" required>
                                        <option value="">Select service category</option>
                                        <option value="dispatch_rider">Dispatch Rider Service</option>
                                        <option value="truck">Truck Delivery</option>
                                        <option value="tipper_granite">Tipper and Granite Haulage</option>
                                        <option value="ajeigboro">Ajeigboro Load Service</option>
                                        <option value="petrol_tanker">Petrol Tanker Service</option>
                                        <option value="frozen_foods">Frozen Foods Delivery</option>
                                        <option value="general">General Delivery</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="goods_type">Goods Type</label>
                                    <input type="text" id="goods_type" name="goods_type" placeholder="e.g. Documents, Food items, Granite" required />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="pickup_state">Pickup State</label>
                                    <select id="pickup_state" name="pickup_state" required>
                                        <option value="">Select state</option>
                                        <option selected>Lagos</option>
                                        <option>Abuja - FCT</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Rivers</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="dropoff_state">Drop-off State</label>
                                    <select id="dropoff_state" name="dropoff_state" required>
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option selected>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                        <option>Rivers</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="pickup_address">Pickup Address</label>
                                    <textarea id="pickup_address" name="pickup_address" placeholder="Enter pickup address" required></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="dropoff_address">Drop-off Address</label>
                                    <textarea id="dropoff_address" name="dropoff_address" placeholder="Enter drop-off address" required></textarea>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="goods_weight">Estimated Weight / Size</label>
                                    <input type="text" id="goods_weight" name="goods_weight" placeholder="e.g. 250kg, 4 pallets, 2 cartons" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="pickup_date">Preferred Pickup Date</label>
                                    <input type="date" id="pickup_date" name="pickup_date" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurance_needed">Insurance Option</label>
                                    <select id="insurance_needed" name="insurance_needed">
                                        <option value="">Select option</option>
                                        <option value="yes">Yes, include insurance</option>
                                        <option value="no">No insurance for now</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="promo_code">Promo Code</label>
                                    <input type="text" id="promo_code" name="promo_code" placeholder="Enter promo code if any" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="order_note">Order Note</label>
                                    <textarea id="order_note" name="order_note" placeholder="Add special notes, handling instructions, or delivery details"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Submit Order Request</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Helpful Shortcuts</h3>
                                <p>Later this can link to saved addresses, frequent routes, and prior orders.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Saved Addresses</h4>
                                <p>Use previously saved pickup and drop-off addresses for faster ordering.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Recent Orders</h4>
                                <p>Repeat a previous logistics request without starting from scratch.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Track Existing Order</h4>
                                <p>Move to your current orders and follow their progress.</p>
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
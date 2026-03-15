<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/company-new-order.html
        PURPOSE:
        Company client page for creating a company order.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../company/orders/submit/create_company_order_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Company New Order</title>
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
            <strong>Company Order Page</strong>
            <span>This page is reserved for company-based order creation under authorized corporate use.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Company Client Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">CC</div>
                    <div class="profile-meta">
                        <h2>Company Account</h2>
                        <p>Corporate Service User</p>
                    </div>
                </div>
                <span class="role-badge">Company Client</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="company-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Company overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="company-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Company Order</strong><span>Create a company logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="company-authorized-users.html">
                            <span class="menu-icon">👥</span>
                            <span class="menu-text"><strong>Authorized Users</strong><span>Manage staff access</span></span>
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
                            <h1>Create Company Order</h1>
                            <p>Create logistics requests under the company account, not as an individual order.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Corporate Order</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="order-note">
                        This page is for company-authorized orders. Later, the backend can tie this order to the
                        staff member creating it, while keeping billing and reporting under the main company account.
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Company Order Form</h3>
                                <p>Use this form to create a new company logistics request.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../company/orders/submit/create_company_order_submit.php
                        -->
                        <form action="../company/orders/submit/create_company_order_submit.php" method="post">
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
                                    <label for="requesting_department">Requesting Department</label>
                                    <input type="text" id="requesting_department" name="requesting_department" placeholder="Enter department" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="contact_person">Company Contact Person</label>
                                    <input type="text" id="contact_person" name="contact_person" placeholder="Enter staff contact name" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="contact_phone">Contact Phone</label>
                                    <input type="text" id="contact_phone" name="contact_phone" placeholder="+2348012345678" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="pickup_state">Pickup State</label>
                                    <select id="pickup_state" name="pickup_state">
                                        <option value="">Select state</option>
                                        <option selected>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="dropoff_state">Drop-off State</label>
                                    <select id="dropoff_state" name="dropoff_state">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option selected>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="pickup_address">Pickup Address</label>
                                    <textarea id="pickup_address" name="pickup_address" placeholder="Enter pickup address"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="dropoff_address">Drop-off Address</label>
                                    <textarea id="dropoff_address" name="dropoff_address" placeholder="Enter drop-off address"></textarea>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="goods_type">Goods Type</label>
                                    <input type="text" id="goods_type" name="goods_type" placeholder="e.g. documents, goods, equipment" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="estimated_weight">Estimated Weight / Volume</label>
                                    <input type="text" id="estimated_weight" name="estimated_weight" placeholder="e.g. 500kg, 10 cartons" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurance_needed">Insurance Option</label>
                                    <select id="insurance_needed" name="insurance_needed">
                                        <option value="">Select option</option>
                                        <option>Yes, include insurance</option>
                                        <option>No insurance for now</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="promo_code">Promo Code</label>
                                    <input type="text" id="promo_code" name="promo_code" placeholder="Enter promo code if any" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="order_note">Order Note</label>
                                    <textarea id="order_note" name="order_note" placeholder="Add handling note, delivery instruction, or internal order reference"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Submit Company Order</button>
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
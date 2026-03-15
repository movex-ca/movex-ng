<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-addresses.html
        PURPOSE:
        User page for saving and managing common pickup and drop-off addresses.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../user/addresses/submit/save_address_submit.php
        - ../user/addresses/submit/filter_addresses_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Saved Addresses</title>
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

        .address-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .address-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .address-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .address-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .address-tag {
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

        .address-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .address-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-weight: 700;
            font-size: 13px;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .address-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 900px) {
            .toolbar-grid {
                grid-template-columns: 2fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Saved Addresses</strong>
            <span>This page is reserved for managing frequent pickup and drop-off locations.</span>
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
                    <li class="menu-item">
                        <a href="user-new-order.html">
                            <span class="menu-icon">➕</span>
                            <span class="menu-text"><strong>New Order</strong><span>Create logistics request</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="user-orders.html">
                            <span class="menu-icon">📦</span>
                            <span class="menu-text"><strong>My Orders</strong><span>Track and manage orders</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Account</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="user-profile.html">
                            <span class="menu-icon">👤</span>
                            <span class="menu-text"><strong>Profile</strong><span>Manage account details</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="user-addresses.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Addresses</strong><span>Saved pickup and drop-off</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="user-student-verification.html">
                            <span class="menu-icon">🎓</span>
                            <span class="menu-text"><strong>Student Verification</strong><span>Upload ID for review</span></span>
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
                            <h1>Saved Addresses</h1>
                            <p>Manage your common pickup and delivery addresses for faster order creation.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Address Book</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Add New Address</h3>
                                <p>Save a common address for future logistics requests.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/addresses/submit/save_address_submit.php
                        -->
                        <form action="../user/addresses/submit/save_address_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="address_label">Address Label</label>
                                    <input type="text" id="address_label" name="address_label" placeholder="e.g. Home, Office, Warehouse" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="address_type">Address Type</label>
                                    <select id="address_type" name="address_type">
                                        <option value="">Select type</option>
                                        <option>Pickup</option>
                                        <option>Drop-off</option>
                                        <option>Both</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="address_state">State</label>
                                    <select id="address_state" name="address_state">
                                        <option value="">Select state</option>
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="address_city">City / Town</label>
                                    <input type="text" id="address_city" name="address_city" placeholder="Enter city or town" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="full_address">Full Address</label>
                                    <textarea id="full_address" name="full_address" placeholder="Enter full address"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Address</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Search Saved Addresses</h3>
                                <p>Search your saved address book by label or type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/addresses/submit/filter_addresses_submit.php
                        -->
                        <form action="../user/addresses/submit/filter_addresses_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_address" placeholder="Search by label, address, or city" />
                                <select name="address_type_filter">
                                    <option value="">All Types</option>
                                    <option>Pickup</option>
                                    <option>Drop-off</option>
                                    <option>Both</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="address-grid">
                        <div class="address-card">
                            <h4>Home Address</h4>
                            <p>No. 10 Example Street, Yaba, Lagos</p>
                            <span class="address-tag">Pickup</span>
                            <span class="address-tag">Lagos</span>
                            <div class="address-actions">
                                <a href="#">Edit</a>
                                <a href="#">Use for Order</a>
                                <a href="#">Delete</a>
                            </div>
                        </div>

                        <div class="address-card">
                            <h4>Main Office</h4>
                            <p>Industrial Estate Road, Ikeja, Lagos</p>
                            <span class="address-tag">Both</span>
                            <span class="address-tag">Office</span>
                            <div class="address-actions">
                                <a href="#">Edit</a>
                                <a href="#">Use for Order</a>
                                <a href="#">Delete</a>
                            </div>
                        </div>

                        <div class="address-card">
                            <h4>Warehouse</h4>
                            <p>Along Abeokuta Expressway, Ogun State</p>
                            <span class="address-tag">Drop-off</span>
                            <span class="address-tag">Ogun</span>
                            <div class="address-actions">
                                <a href="#">Edit</a>
                                <a href="#">Use for Order</a>
                                <a href="#">Delete</a>
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
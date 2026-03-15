<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-vehicle-details.html
        PURPOSE:
        Driver page for vehicle identity, pool fit, and vehicle operating information.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../driver/vehicle/submit/driver_vehicle_update_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Vehicle Details</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />

    <style>
        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .vehicle-top-card {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .vehicle-avatar {
            width: 88px;
            height: 88px;
            border-radius: 20px;
            background: linear-gradient(135deg, #ebfac0, #faffdd);
            border: 1px solid #dbe8ab;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            font-weight: 700;
            color: #5f7900;
            flex-shrink: 0;
        }

        .vehicle-meta h3 {
            font-size: 20px;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .vehicle-meta p {
            font-size: 14px;
            color: var(--text-mid);
            line-height: 1.6;
        }

        .top-pill {
            display: inline-block;
            padding: 7px 12px;
            margin-right: 8px;
            margin-top: 8px;
            border-radius: 999px;
            background: #eef7d1;
            color: #5d7600;
            font-size: 12px;
            font-weight: 700;
        }

        .dashboard-form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 700;
        }

        .dashboard-form-group input,
        .dashboard-form-group select,
        .dashboard-form-group textarea {
            width: 100%;
            padding: 14px;
            background: #fcfff7;
            border: 1px solid var(--border);
            border-radius: 14px;
            color: var(--text-dark);
            outline: none;
            font-size: 14px;
        }

        .dashboard-form-group textarea {
            min-height: 100px;
            resize: vertical;
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
            <strong>Vehicle Details</strong>
            <span>This page is reserved for driver vehicle information and assignment readiness.</span>
        </div>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="dashboard-layout">
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <img src="../assets/images/movex-logo.jpg" alt="Movex Logo" />
                <div class="brand-text">
                    <h1>MOVEX</h1>
                    <p>Driver Operations Dashboard</p>
                    <span class="env-badge">9ja Demo</span>
                </div>
            </div>

            <div class="sidebar-profile">
                <div class="sidebar-profile-top">
                    <div class="profile-avatar">DR</div>
                    <div class="profile-meta">
                        <h2>Driver Account</h2>
                        <p>Ajeigboro Pool</p>
                    </div>
                </div>
                <span class="role-badge">Driver Dashboard</span>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Driver Account</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="driver-profile.html">
                            <span class="menu-icon">👤</span>
                            <span class="menu-text"><strong>Profile</strong><span>Driver details and location</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-documents.html">
                            <span class="menu-icon">📄</span>
                            <span class="menu-text"><strong>Documents</strong><span>Licence and ID uploads</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="driver-vehicle-details.html">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text"><strong>Vehicle Details</strong><span>Vehicle information</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-payout-account.html">
                            <span class="menu-icon">🏦</span>
                            <span class="menu-text"><strong>Payout Account</strong><span>Bank and settlement details</span></span>
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
                            <h1>Vehicle Details</h1>
                            <p>Update your vehicle information so your account stays assignment-ready.</p>
                        </div>
                    </div>
                    <div class="header-right">
                        <span class="header-chip">Vehicle Record</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="vehicle-top-card">
                            <div class="vehicle-avatar">🚚</div>
                            <div class="vehicle-meta">
                                <h3>LAG-123-TR</h3>
                                <p>Keep your vehicle data current for pool match, insurance checks, and dispatch assignment.</p>
                                <span class="top-pill">Truck</span>
                                <span class="top-pill">Ajeigboro</span>
                                <span class="top-pill">Approved</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Update Vehicle Details</h3>
                                <p>This form is for updating vehicle record and assignment-related data.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/vehicle/submit/driver_vehicle_update_submit.php
                        -->
                        <form action="../driver/vehicle/submit/driver_vehicle_update_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="vehicle_type">Vehicle Type</label>
                                    <select id="vehicle_type" name="vehicle_type">
                                        <option>Truck</option>
                                        <option>Ajeigboro Truck</option>
                                        <option>Dispatch Bike</option>
                                        <option>Tipper</option>
                                        <option>Cold Van</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_pool">Vehicle Pool</label>
                                    <select id="vehicle_pool" name="vehicle_pool">
                                        <option>Ajeigboro</option>
                                        <option>Truck</option>
                                        <option>Dispatch Rider</option>
                                        <option>Tipper and Granite</option>
                                        <option>Frozen Foods</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="plate_number">Plate Number</label>
                                    <input type="text" id="plate_number" name="plate_number" value="LAG-123-TR" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_brand">Vehicle Brand</label>
                                    <input type="text" id="vehicle_brand" name="vehicle_brand" value="MAN Diesel" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_model">Vehicle Model</label>
                                    <input type="text" id="vehicle_model" name="vehicle_model" value="TGX" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_year">Vehicle Year</label>
                                    <input type="number" id="vehicle_year" name="vehicle_year" value="2018" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="capacity">Load Capacity</label>
                                    <input type="text" id="capacity" name="capacity" placeholder="e.g. 20 tons" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="vehicle_color">Vehicle Color</label>
                                    <input type="text" id="vehicle_color" name="vehicle_color" value="White" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="insurance_status">Insurance Status</label>
                                    <select id="insurance_status" name="insurance_status">
                                        <option>Insured</option>
                                        <option>Pending</option>
                                        <option>Expired</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="operating_state_vehicle">Operating State</label>
                                    <select id="operating_state_vehicle" name="operating_state_vehicle">
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="vehicle_note">Vehicle Note</label>
                                    <textarea id="vehicle_note" name="vehicle_note" placeholder="Enter any vehicle note, body type, or special operational detail"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Vehicle Details</button>
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
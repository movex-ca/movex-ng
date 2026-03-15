<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-profile.html
        PURPOSE:
        Driver page for personal profile, operating state, city, and account details.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../driver/profile/submit/driver_profile_update_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Profile</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />

    <style>
        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .driver-top-card {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .driver-avatar-large {
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

        .driver-meta h3 {
            font-size: 20px;
            margin-bottom: 5px;
            color: var(--text-dark);
        }

        .driver-meta p {
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
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .dashboard-form-group input,
        .dashboard-form-group select,
        .dashboard-form-group textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fcfff7;
            outline: none;
            font-size: 14px;
            color: var(--text-dark);
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
            <strong>Driver Profile</strong>
            <span>This page is reserved for driver account details, location, and operating information.</span>
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
                        <a href="driver-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
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
                    <li class="menu-item">
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
                            <h1>Driver Profile</h1>
                            <p>Update your personal details, operating state, city, and contact information.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Driver Identity</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="driver-top-card">
                            <div class="driver-avatar-large">DR</div>
                            <div class="driver-meta">
                                <h3>Kunle Adeyemi</h3>
                                <p>Keep your account details correct so admin approval, assignment, payout, and tracking remain accurate.</p>
                                <span class="top-pill">Approved</span>
                                <span class="top-pill">Ajeigboro</span>
                                <span class="top-pill">Lagos</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Update Driver Profile</h3>
                                <p>This form is for updating driver bio-data and operating location.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/profile/submit/driver_profile_update_submit.php
                        -->
                        <form action="../driver/profile/submit/driver_profile_update_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="Kunle" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="Adeyemi" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" value="driver@example.com" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="phone">Telephone</label>
                                    <input type="text" id="phone" name="phone" value="+2348011111111" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="sex">Sex</label>
                                    <select id="sex" name="sex">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="date_of_birth">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="operating_state">Operating State</label>
                                    <select id="operating_state" name="operating_state">
                                        <option>Lagos</option>
                                        <option>Ogun</option>
                                        <option>Oyo</option>
                                        <option>Abuja - FCT</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="operating_city">City / Town</label>
                                    <input type="text" id="operating_city" name="operating_city" value="Agege" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="driver_pool">Driver Pool</label>
                                    <select id="driver_pool" name="driver_pool">
                                        <option>Ajeigboro</option>
                                        <option>Truck</option>
                                        <option>Dispatch Rider</option>
                                        <option>Tipper and Granite</option>
                                        <option>Frozen Foods</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="association_code">Association Code</label>
                                    <input type="text" id="association_code" name="association_code" value="ALMG-9JA" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="garage_code">Garage Code</label>
                                    <input type="text" id="garage_code" name="garage_code" value="AJP-LAG-002" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="referral_code">Referral Code</label>
                                    <input type="text" id="referral_code" name="referral_code" value="MOVEX-DRV-101" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="home_address">Home Address</label>
                                    <textarea id="home_address" name="home_address">No. 24 Example Road, Agege, Lagos</textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="profile_note">Profile Note</label>
                                    <textarea id="profile_note" name="profile_note" placeholder="Enter optional driver note or admin-facing details"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Driver Profile</button>
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
</html
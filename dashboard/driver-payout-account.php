<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-payout-account.html
        PURPOSE:
        Driver page for bank account and payout settlement details.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../driver/payout-account/submit/save_driver_payout_account_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Payout Account</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />

    <style>
        .dashboard-form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .account-top-card {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .account-icon {
            width: 88px;
            height: 88px;
            border-radius: 20px;
            background: linear-gradient(135deg, #ebfac0, #faffdd);
            border: 1px solid #dbe8ab;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: #5f7900;
            flex-shrink: 0;
        }

        .account-meta h3 {
            font-size: 20px;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .account-meta p {
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
            <strong>Driver Payout Account</strong>
            <span>This page is reserved for bank details and settlement destination for driver payouts.</span>
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
                    <li class="menu-item">
                        <a href="driver-vehicle-details.html">
                            <span class="menu-icon">🚘</span>
                            <span class="menu-text"><strong>Vehicle Details</strong><span>Vehicle information</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
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
                            <h1>Driver Payout Account</h1>
                            <p>Save the bank details where your approved payouts will be settled later.</p>
                        </div>
                    </div>
                    <div class="header-right">
                        <span class="header-chip">Settlement Account</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="account-top-card">
                            <div class="account-icon">🏦</div>
                            <div class="account-meta">
                                <h3>Primary Payout Account</h3>
                                <p>Keep your account information correct so approved payouts can be routed properly when settlement is processed.</p>
                                <span class="top-pill">Nigeria</span>
                                <span class="top-pill">Bank Transfer</span>
                                <span class="top-pill">Primary Account</span>
                            </div>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Save Payout Account</h3>
                                <p>This form is for saving payout destination details for later backend settlement flow.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/payout-account/submit/save_driver_payout_account_submit.php
                        -->
                        <form action="../driver/payout-account/submit/save_driver_payout_account_submit.php" method="post">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <select id="bank_name" name="bank_name">
                                        <option value="">Select bank</option>
                                        <option>Access Bank</option>
                                        <option>GTBank</option>
                                        <option>First Bank</option>
                                        <option>UBA</option>
                                        <option>Zenith Bank</option>
                                        <option>Lotus Bank</option>
                                        <option>Moniepoint</option>
                                        <option>Opay</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="account_name">Account Name</label>
                                    <input type="text" id="account_name" name="account_name" value="KUNLE ADEYEMI" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" id="account_number" name="account_number" placeholder="Enter 10-digit account number" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="payout_type">Payout Type</label>
                                    <select id="payout_type" name="payout_type">
                                        <option>Primary Account</option>
                                        <option>Secondary Account</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="bank_verification_status">Verification Status</label>
                                    <select id="bank_verification_status" name="bank_verification_status">
                                        <option>Pending</option>
                                        <option>Verified</option>
                                        <option>Needs Review</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="settlement_note_short">Short Note</label>
                                    <input type="text" id="settlement_note_short" name="settlement_note_short" placeholder="Optional short note" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="settlement_note">Settlement Note</label>
                                    <textarea id="settlement_note" name="settlement_note" placeholder="Enter any settlement instruction or admin note"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Save Payout Account</button>
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
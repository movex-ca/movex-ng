<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/user-promotions.html
        PURPOSE:
        User page for promotions, promo codes, and special discount messages.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../user/promotions/submit/filter_promotions_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | User Promotions</title>
    <link rel="icon" type="image/jpeg" href="../assets/images/movex-logo.jpg" />
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
    <style>
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

        .promo-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .promo-card {
            background: linear-gradient(135deg, #fcfff2, #fffde8, #f4ffd9);
            border: 1px solid #e7efca;
            border-radius: 20px;
            padding: 18px;
            box-shadow: 0 10px 18px rgba(122, 158, 0, 0.05);
        }

        .promo-card h4 {
            font-size: 18px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .promo-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 12px;
        }

        .promo-code {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 700;
            background: #ffffff;
            border: 1px dashed #cfe08b;
            color: #627d00;
            margin-bottom: 10px;
        }

        .promo-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
        }

        .promo-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
        }

        .promo-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .promo-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-weight: 700;
            font-size: 13px;
        }

        @media (min-width: 900px) {
            .toolbar-grid {
                grid-template-columns: 2fr 1fr;
            }

            .promo-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>User Promotions</strong>
            <span>This page is reserved for personal promo codes, campaign offers, and discount eligibility.</span>
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
                        <a href="user-notifications.html">
                            <span class="menu-icon">🔔</span>
                            <span class="menu-text"><strong>Notifications</strong><span>Updates and alerts</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="user-promotions.html">
                            <span class="menu-icon">🎁</span>
                            <span class="menu-text"><strong>Promotions</strong><span>Discounts and offers</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Account</div>
                <ul class="menu-list">
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
                            <h1>User Promotions</h1>
                            <p>View discount offers, personal promo codes, and student promo eligibility updates.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Offers</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Promotions</h3>
                                <p>Search by promo title, promo code, or campaign type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../user/promotions/submit/filter_promotions_submit.php
                        -->
                        <form action="../user/promotions/submit/filter_promotions_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_promo" placeholder="Search by promo title or code" />
                                <select name="promo_type_filter">
                                    <option value="">All Promo Types</option>
                                    <option>General Discount</option>
                                    <option>Student Promo</option>
                                    <option>Referral Promo</option>
                                    <option>Seasonal Campaign</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="promo-grid">
                        <div class="promo-card">
                            <h4>Welcome Discount</h4>
                            <p>Use this promo on your next eligible order to enjoy a discount on service charges.</p>
                            <div class="promo-code">MOVEX-WELCOME-10</div>
                            <div class="promo-tags">
                                <span class="promo-tag">General Discount</span>
                                <span class="promo-tag">Active</span>
                            </div>
                            <div class="promo-actions">
                                <a href="#">Use on Order</a>
                                <a href="#">View Details</a>
                            </div>
                        </div>

                        <div class="promo-card">
                            <h4>Student Promo Review</h4>
                            <p>Your student verification request is pending. Promo will reflect here after admin approval.</p>
                            <div class="promo-code">PENDING REVIEW</div>
                            <div class="promo-tags">
                                <span class="promo-tag">Student Promo</span>
                                <span class="promo-tag">Pending</span>
                            </div>
                            <div class="promo-actions">
                                <a href="#">Open Verification</a>
                            </div>
                        </div>

                        <div class="promo-card">
                            <h4>Referral Reward</h4>
                            <p>Invite others to Movex and receive referral rewards after valid order completion.</p>
                            <div class="promo-code">MOVEX-REF-01</div>
                            <div class="promo-tags">
                                <span class="promo-tag">Referral Promo</span>
                                <span class="promo-tag">Active</span>
                            </div>
                            <div class="promo-actions">
                                <a href="#">Share Code</a>
                                <a href="#">View Terms</a>
                            </div>
                        </div>

                        <div class="promo-card">
                            <h4>Weekend Campaign</h4>
                            <p>Eligible weekend deliveries may enjoy selected campaign discounts based on route and pool.</p>
                            <div class="promo-code">WKND-9JA-SAVE</div>
                            <div class="promo-tags">
                                <span class="promo-tag">Seasonal Campaign</span>
                                <span class="promo-tag">Limited</span>
                            </div>
                            <div class="promo-actions">
                                <a href="#">Use on Order</a>
                                <a href="#">Campaign Info</a>
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
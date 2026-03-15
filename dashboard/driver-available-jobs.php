<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-available-jobs.html
        PURPOSE:
        Driver page for viewing and filtering available jobs.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGET:
        ../driver/jobs/submit/filter_available_jobs_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Available Jobs</title>
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

        .job-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .job-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .job-top {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .job-top h4 {
            font-size: 16px;
            color: var(--text-dark);
        }

        .job-top span {
            font-size: 12px;
            color: var(--text-mid);
        }

        .job-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .job-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
        }

        .job-tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            background: #eef7d1;
            color: #5d7600;
        }

        .job-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .job-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-weight: 700;
            font-size: 13px;
        }

        @media (min-width: 900px) {
            .toolbar-grid {
                grid-template-columns: 2fr 1fr 1fr;
            }

            .job-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="global-toast-area">
        <div class="toast-demo">
            <strong>Available Jobs</strong>
            <span>This page is reserved for job matching, job review, and driver job acceptance flow.</span>
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
                <div class="menu-group-title">Main</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="driver-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Overview and trip activity</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="driver-available-jobs.html">
                            <span class="menu-icon">📥</span>
                            <span class="menu-text"><strong>Available Jobs</strong><span>Jobs ready for pickup</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-trips.html">
                            <span class="menu-icon">🚚</span>
                            <span class="menu-text"><strong>My Trips</strong><span>Assigned and completed trips</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="driver-earnings.html">
                            <span class="menu-icon">₦</span>
                            <span class="menu-text"><strong>Earnings</strong><span>Trip income and summary</span></span>
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
                            <h1>Available Jobs</h1>
                            <p>Review jobs that match your pool, state of operation, and account approval status.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Jobs Queue</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Available Jobs</h3>
                                <p>Search by route, pool, state, or goods type.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/jobs/submit/filter_available_jobs_submit.php
                        -->
                        <form action="../driver/jobs/submit/filter_available_jobs_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_job" placeholder="Search by route, goods type, or job reference" />
                                <select name="pool_filter">
                                    <option value="">All Pools</option>
                                    <option>Ajeigboro</option>
                                    <option>Truck</option>
                                    <option>Dispatch Rider</option>
                                </select>
                                <select name="state_filter">
                                    <option value="">All States</option>
                                    <option>Lagos</option>
                                    <option>Ogun</option>
                                    <option>Oyo</option>
                                    <option>Abuja - FCT</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="job-grid">
                        <div class="job-card">
                            <div class="job-top">
                                <h4>JOB-2026-001</h4>
                                <span>Today, 9:15 AM</span>
                            </div>
                            <p>
                                Load movement from Lagos to Oyo for construction materials. Suitable for
                                Ajeigboro or Truck pool drivers with approved heavy-load vehicles.
                            </p>
                            <div class="job-tags">
                                <span class="job-tag">Ajeigboro</span>
                                <span class="job-tag">Lagos → Oyo</span>
                                <span class="job-tag">₦38,000</span>
                            </div>
                            <div class="job-actions">
                                <a href="#">Open</a>
                                <a href="#">Accept</a>
                                <a href="#">Route</a>
                            </div>
                        </div>

                        <div class="job-card">
                            <div class="job-top">
                                <h4>JOB-2026-002</h4>
                                <span>Today, 11:40 AM</span>
                            </div>
                            <p>
                                General truck delivery from Ogun to Lagos. Suitable for approved truck drivers
                                operating within the Ogun-Lagos corridor.
                            </p>
                            <div class="job-tags">
                                <span class="job-tag">Truck</span>
                                <span class="job-tag">Ogun → Lagos</span>
                                <span class="job-tag">₦27,000</span>
                            </div>
                            <div class="job-actions">
                                <a href="#">Open</a>
                                <a href="#">Accept</a>
                                <a href="#">Details</a>
                            </div>
                        </div>

                        <div class="job-card">
                            <div class="job-top">
                                <h4>JOB-2026-003</h4>
                                <span>Yesterday, 4:05 PM</span>
                            </div>
                            <p>
                                Frozen goods movement within Lagos. Requires cold-chain compliance and an approved
                                frozen foods vehicle setup.
                            </p>
                            <div class="job-tags">
                                <span class="job-tag">Frozen Foods</span>
                                <span class="job-tag">Lagos</span>
                                <span class="job-tag">₦22,000</span>
                            </div>
                            <div class="job-actions">
                                <a href="#">Open</a>
                                <a href="#">Details</a>
                            </div>
                        </div>

                        <div class="job-card">
                            <div class="job-top">
                                <h4>JOB-2026-004</h4>
                                <span>Yesterday, 5:30 PM</span>
                            </div>
                            <p>
                                Short-distance dispatch package movement inside Abuja. Best fit for dispatch rider
                                accounts approved for the FCT route cluster.
                            </p>
                            <div class="job-tags">
                                <span class="job-tag">Dispatch Rider</span>
                                <span class="job-tag">Abuja - FCT</span>
                                <span class="job-tag">₦9,500</span>
                            </div>
                            <div class="job-actions">
                                <a href="#">Open</a>
                                <a href="#">Details</a>
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
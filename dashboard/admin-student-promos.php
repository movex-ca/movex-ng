<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/admin-student-promos.html
        PURPOSE:
        Admin page for reviewing student promo requests.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../admin/student-promos/submit/filter_student_promos_submit.php
        - ../admin/student-promos/submit/review_student_promo_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Admin Student Promos</title>
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

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 980px;
        }

        th, td {
            text-align: left;
            padding: 14px 12px;
            border-bottom: 1px solid #edf2dc;
            font-size: 14px;
            vertical-align: top;
        }

        th {
            color: var(--text-dark);
            background: #fbfff3;
            font-weight: 700;
        }

        td {
            color: #5e6850;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .status-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .status-approved {
            background: #eefceb;
            color: #2d7a2d;
        }

        .status-rejected {
            background: #fff0f0;
            color: #b14343;
        }

        .action-links {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .action-links a {
            text-decoration: none;
            color: var(--accent-deep);
            font-weight: 700;
            font-size: 13px;
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
            <strong>Student Promo Review</strong>
            <span>This page is reserved for reviewing uploaded student IDs and promo eligibility.</span>
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
                <div class="menu-group-title">Approval Centre</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-dashboard.html">
                            <span class="menu-icon">🏠</span>
                            <span class="menu-text"><strong>Dashboard</strong><span>Admin overview</span></span>
                        </a>
                    </li>
                    <li class="menu-item active">
                        <a href="admin-student-promos.html">
                            <span class="menu-icon">🎓</span>
                            <span class="menu-text"><strong>Student Promo Approvals</strong><span>Review student requests</span></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="menu-group">
                <div class="menu-group-title">Operations</div>
                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="admin-drivers.html">
                            <span class="menu-icon">🛵</span>
                            <span class="menu-text"><strong>Drivers</strong><span>Manage driver accounts</span></span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="admin-company-clients.html">
                            <span class="menu-icon">🏬</span>
                            <span class="menu-text"><strong>Company Clients</strong><span>Manage service companies</span></span>
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
                            <h1>Student Promo Review</h1>
                            <p>Review student ID submissions and approve or reject promo eligibility.</p>
                        </div>
                    </div>

                    <div class="header-right">
                        <span class="header-chip">Promo Review</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Student Requests</h3>
                                <p>Search and filter student verification and promo requests.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../admin/student-promos/submit/filter_student_promos_submit.php
                        -->
                        <form action="../admin/student-promos/submit/filter_student_promos_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_student" placeholder="Search by name, email, phone, or request number" />
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Pending</option>
                                    <option>Approved</option>
                                    <option>Rejected</option>
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

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Student Promo Requests</h3>
                                <p>Sample listing showing how student promo reviews can appear.</p>
                            </div>
                        </div>

                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Phone</th>
                                        <th>Institution</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>ID File</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>David Aina</td>
                                        <td>+2348011111111</td>
                                        <td>University of Lagos</td>
                                        <td>Lagos</td>
                                        <td><span class="status-badge status-pending">Pending</span></td>
                                        <td>ID Card Front</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Approve</a>
                                                <a href="#">Reject</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Grace Bello</td>
                                        <td>+2348022222222</td>
                                        <td>Yaba College of Technology</td>
                                        <td>Lagos</td>
                                        <td><span class="status-badge status-approved">Approved</span></td>
                                        <td>ID Card</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">Open</a>
                                                <a href="#">Update</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tosin James</td>
                                        <td>+2348033333333</td>
                                        <td>University of Ibadan</td>
                                        <td>Oyo</td>
                                        <td><span class="status-badge status-rejected">Rejected</span></td>
                                        <td>Student Letter</td>
                                        <td>
                                            <div class="action-links">
                                                <a href="#">View</a>
                                                <a href="#">Reason</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Review Actions</h3>
                                <p>These cards represent the common admin actions for student promo review.</p>
                            </div>
                        </div>

                        <div class="quick-grid">
                            <a href="#" class="quick-card">
                                <h4>Approve Promo</h4>
                                <p>Mark a verified student request as approved and attach promo status to the user account.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Reject Request</h4>
                                <p>Reject invalid, incomplete, or expired student verification submissions.</p>
                            </a>
                            <a href="#" class="quick-card">
                                <h4>Request More Information</h4>
                                <p>Ask the user for clearer ID proof or updated supporting information.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="../assets/js/dashboard.js"></script>
</body>
</html
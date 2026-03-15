<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        FILE: dashboard/driver-documents.html
        PURPOSE:
        Driver page for uploading and reviewing personal and vehicle-related documents.

        HTML ONLY:
        Layout only. Backend will be added later with PHP.

        FUTURE FORM TARGETS:
        - ../driver/documents/submit/upload_driver_document_submit.php
        - ../driver/documents/submit/filter_driver_documents_submit.php
    -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movex 9ja | Driver Documents</title>
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
            font-size: 14px;
            outline: none;
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
            padding: 13px 14px;
            background: #fcfff7;
            border: 1px solid var(--border);
            border-radius: 14px;
            font-size: 14px;
            outline: none;
            color: var(--text-dark);
        }

        .doc-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .doc-card {
            background: #fcfff6;
            border: 1px solid #e7efca;
            border-radius: 18px;
            padding: 16px;
        }

        .doc-card h4 {
            font-size: 16px;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .doc-card p {
            font-size: 14px;
            color: #5e6850;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .doc-tag {
            display: inline-block;
            padding: 6px 10px;
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
        }

        .tag-approved {
            background: #eefceb;
            color: #2d7a2d;
        }

        .tag-pending {
            background: #fff8df;
            color: #9b7a00;
        }

        .tag-review {
            background: #eef7ff;
            color: #1e6aa8;
        }

        .doc-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 12px;
        }

        .doc-actions a {
            text-decoration: none;
            color: var(--accent-deep);
            font-weight: 700;
            font-size: 13px;
        }

        @media (min-width: 768px) {
            .dashboard-form-grid.two-col {
                grid-template-columns: 1fr 1fr;
            }

            .doc-grid {
                grid-template-columns: repeat(2, 1fr);
            }
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
            <strong>Driver Documents</strong>
            <span>This page is reserved for licence, ID, and supporting driver document uploads.</span>
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
                    <li class="menu-item active">
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
                            <h1>Driver Documents</h1>
                            <p>Upload and review all required driver documents for approval and job eligibility.</p>
                        </div>
                    </div>
                    <div class="header-right">
                        <span class="header-chip">Documents</span>
                    </div>
                </div>
            </header>

            <section class="dashboard-content">
                <div class="content-stack">
                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Upload Driver Document</h3>
                                <p>Use this form to upload a required document for admin review.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/documents/submit/upload_driver_document_submit.php
                        -->
                        <form action="../driver/documents/submit/upload_driver_document_submit.php" method="post" enctype="multipart/form-data">
                            <div class="dashboard-form-grid two-col">
                                <div class="dashboard-form-group">
                                    <label for="document_type">Document Type</label>
                                    <select id="document_type" name="document_type">
                                        <option value="">Select document type</option>
                                        <option>National ID</option>
                                        <option>Driver Licence</option>
                                        <option>Passport Photograph</option>
                                        <option>Proof of Address</option>
                                        <option>Guarantor Form</option>
                                    </select>
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="document_expiry">Expiry Date</label>
                                    <input type="date" id="document_expiry" name="document_expiry" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="document_file">Document File</label>
                                    <input type="file" id="document_file" name="document_file" />
                                </div>

                                <div class="dashboard-form-group">
                                    <label for="document_status_note">Status Note</label>
                                    <input type="text" id="document_status_note" name="document_status_note" placeholder="Optional note" />
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <label for="document_note">Document Remark</label>
                                    <textarea id="document_note" name="document_note" placeholder="Enter any note related to this upload"></textarea>
                                </div>

                                <div class="dashboard-form-group" style="grid-column: 1 / -1;">
                                    <button type="submit" class="btn-primary">Upload Document</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="panel-card">
                        <div class="panel-header">
                            <div>
                                <h3>Filter Driver Documents</h3>
                                <p>Search by document type, review status, or expiry state.</p>
                            </div>
                        </div>

                        <!--
                            FUTURE SUBMISSION TARGET:
                            ../driver/documents/submit/filter_driver_documents_submit.php
                        -->
                        <form action="../driver/documents/submit/filter_driver_documents_submit.php" method="get">
                            <div class="toolbar-grid">
                                <input type="text" name="search_document" placeholder="Search by document type or note" />
                                <select name="type_filter">
                                    <option value="">All Types</option>
                                    <option>National ID</option>
                                    <option>Driver Licence</option>
                                    <option>Proof of Address</option>
                                </select>
                                <select name="status_filter">
                                    <option value="">All Status</option>
                                    <option>Approved</option>
                                    <option>Pending</option>
                                    <option>Under Review</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="doc-grid">
                        <div class="doc-card">
                            <h4>Driver Licence</h4>
                            <p>Primary licence record used for driver verification and assignment checks.</p>
                            <span class="doc-tag tag-approved">Approved</span>
                            <span class="doc-tag tag-approved">Valid</span>
                            <div class="doc-actions">
                                <a href="#">View</a>
                                <a href="#">Replace</a>
                            </div>
                        </div>

                        <div class="doc-card">
                            <h4>National ID</h4>
                            <p>Identity record submitted for account validation and onboarding approval.</p>
                            <span class="doc-tag tag-review">Under Review</span>
                            <div class="doc-actions">
                                <a href="#">Open</a>
                                <a href="#">Update</a>
                            </div>
                        </div>

                        <div class="doc-card">
                            <h4>Proof of Address</h4>
                            <p>Residential location proof used for account traceability and compliance.</p>
                            <span class="doc-tag tag-pending">Pending</span>
                            <div class="doc-actions">
                                <a href="#">Upload</a>
                                <a href="#">Guide</a>
                            </div>
                        </div>

                        <div class="doc-card">
                            <h4>Passport Photograph</h4>
                            <p>Profile photograph for account identity and dashboard display use.</p>
                            <span class="doc-tag tag-approved">Approved</span>
                            <div class="doc-actions">
                                <a href="#">View</a>
                                <a href="#">Replace</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Abstack - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Vendor css -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- Menu -->

        <!-- Sidenav -->
        <?php include 'sidebar.php'; ?>

        <!-- Topbar -->
        <?php include 'topbar.php'; ?>

        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content bg-transparent">
                    <form>
                        <div class="card mb-1">
                            <div class="px-3 py-2 d-flex flex-row align-items-center" id="top-search">
                                <i class="ri-search-line fs-22"></i>
                                <input type="search" class="form-control border-0" id="search-modal-input"
                                    placeholder="Search for actions, people,">
                                <button type="submit" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">[esc]</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            
            <div class="page-title-head d-flex align-items-center gap-2">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-bold mb-0">Dashboard</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0 fs-13">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            

            

            <div class="page-container">

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Revenue">
                                            Test</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">$1.25M</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-1"><i class="ri-arrow-up-line"></i>
                                                15.34%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded fs-28">
                                            <iconify-icon icon="solar:wallet-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-revenue"></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Products Sold">
                                            Products Sold</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">48.7k</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-1"><i class="ri-arrow-up-line"></i>
                                                10.12%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded fs-28">
                                            <iconify-icon icon="solar:cart-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-products"></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="New Customers">
                                            New Customers</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">1.2k</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-danger me-1"><i class="ri-arrow-down-line"></i>
                                                5.47%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded fs-28">
                                            <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-customers"></div>
                        </div>
                    </div><!-- end col -->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start gap-2 justify-content-between">
                                    <div>
                                        <h5 class="text-muted fs-13 fw-bold text-uppercase" title="Profit Margin">
                                            Profit Margin</h5>
                                        <h3 class="mt-2 mb-1 fw-bold">38.5%</h3>
                                        <p class="mb-0 text-muted">
                                            <span class="text-success me-1"><i class="ri-arrow-up-line"></i>
                                                8.21%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                    <div class="avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded fs-28">
                                            <iconify-icon icon="solar:graph-up-bold-duotone"></iconify-icon>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="apex-charts" id="chart-profit"></div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-xl-7">
                        <div class="card">
                            <div class="d-flex card-header justify-content-between align-items-center">
                                <div>
                                    <h4 class="header-title">Statistics</h4>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle drop-arrow-none card-drop"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill fs-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-0 pt-0">
                                <div class="bg-light bg-opacity-50">
                                    <div class="row text-center">
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Monthly Income</p>
                                            <h4 class="mb-3">
                                                <span data-lucide="arrow-down-left" class="text-success me-1"></span>
                                                <span>$35,200</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Monthly Expenses</p>
                                            <h4 class="mb-3">
                                                <span data-lucide="arrow-up-right" class="text-danger me-1"></span>
                                                <span>$18,900</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Invested Capital</p>
                                            <h4 class="mb-3">
                                                <span data-lucide="bar-chart" class="me-1"></span>
                                                <span>$5,200</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <p class="text-muted mt-3 mb-1">Available Savings</p>
                                            <h4 class="mb-3">
                                                <span data-lucide="landmark" class="me-1"></span>
                                                <span>$8,100</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div dir="ltr" class="px-1 mt-2">
                                    <div id="revenue-chart" class="apex-charts" data-colors="#02c0ce,#777edd"></div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-5">
                        <div class="card">
                            <div class="d-flex card-header justify-content-between align-items-center">
                                <div>
                                    <h4 class="header-title">Total Revenue</h4>
                                </div>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle drop-arrow-none card-drop"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-2-fill fs-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body px-0 pt-0">
                                <div class="border-top border-bottom border-light border-dashed">
                                    <div class="row text-center align-items-center">
                                        <div class="col-md-4">
                                            <p class="text-muted mt-3 mb-1">Revenue</p>
                                            <h4 class="mb-3">
                                                <span class="ri-arrow-left-down-box-line text-success me-1"></span>
                                                <span>$29.5k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-4 border-start border-light border-dashed">
                                            <p class="text-muted mt-3 mb-1">Expenses</p>
                                            <h4 class="mb-3">
                                                <span class="ri-arrow-left-up-box-line text-danger me-1"></span>
                                                <span>$15.07k</span>
                                            </h4>
                                        </div>
                                        <div class="col-md-4 border-start border-end border-light border-dashed">
                                            <p class="text-muted mt-3 mb-1">Investment</p>
                                            <h4 class="mb-3">
                                                <span class="ri-bar-chart-line me-1"></span>
                                                <span>$3.6k</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div dir="ltr" class="px-2">
                                    <div id="statistics-chart" class="apex-charts" data-colors="#0acf97,#45bbe0"></div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xxl-4">
                        <div class="card">
                            <div class="card-header d-flex flex-wrap align-items-center gap-2">
                                <h4 class="header-title me-auto">Recent New Users</h4>

                                <div class="d-flex gap-2 justify-content-end text-end">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Import <i
                                            class="ri-download-line ms-1"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Export <i
                                            class="ri-reset-right-line ms-1"></i></a>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="bg-light bg-opacity-50 py-1 text-center">
                                    <p class="m-0"><b>895k</b> Active users out of <span class="fw-medium">965k</span>
                                    </p>
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table table-custom table-centered table-sm table-nowrap table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-primary-subtle rounded-circle">
                                                                <img src="assets/images/users/avatar-1.jpg" alt=""
                                                                    height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">John Doe</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Administrator</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i
                                                            class="ri-circle-fill fs-12 text-success"></i> Active</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-info-subtle rounded-circle">
                                                                <img src="assets/images/users/avatar-2.jpg" alt=""
                                                                    height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Jane Smith</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Editor</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i
                                                            class="ri-circle-fill fs-12 text-warning"></i> Pending</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item">Activate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span
                                                                class="avatar-title bg-secondary-subtle rounded-circle">
                                                                <img src="assets/images/users/avatar-3.jpg" alt=""
                                                                    height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Michael Brown</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Viewer</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i
                                                            class="ri-circle-fill fs-12 text-danger"></i> Inactive</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item">Activate</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-warning-subtle rounded-circle">
                                                                <img src="assets/images/users/avatar-4.jpg" alt=""
                                                                    height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Emily Davis</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Manager</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i
                                                            class="ri-circle-fill fs-12 text-success"></i> Active</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item">Deactivate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-md flex-shrink-0 me-2">
                                                            <span class="avatar-title bg-danger-subtle rounded-circle">
                                                                <img src="assets/images/users/avatar-5.jpg" alt=""
                                                                    height="26" class="rounded-circle">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <h5 class="fs-14 mt-1">Robert Taylor</h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal">Support</h5>
                                                </td>
                                                <td>
                                                    <h5 class="fs-14 mt-1 fw-normal"><i
                                                            class="ri-circle-fill fs-12 text-warning"></i> Pending</h5>
                                                </td>
                                                <td style="width: 30px;">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="dropdown-toggle text-muted drop-arrow-none card-drop p-0"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="javascript:void(0);" class="dropdown-item">View
                                                                Profile</a>
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item">Activate</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->

                            </div> <!-- end card-body-->

                            <div class="card-footer">
                                <div class="align-items-center justify-content-between row text-center text-sm-start">
                                    <div class="col-sm">
                                        <div class="text-muted">
                                            Showing <span class="fw-semibold">5</span> of <span
                                                class="fw-semibold">2596</span> Users
                                        </div>
                                    </div>
                                    <div class="col-sm-auto mt-3 mt-sm-0">
                                        <ul
                                            class="pagination pagination-boxed pagination-sm mb-0 justify-content-center">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link"><i class="ri-arrow-left-s-line"></i></a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link"><i class="ri-arrow-right-s-line"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> <!-- -->
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xxl-4">
                        <div class="card">
                            <div
                                class="d-flex card-header justify-content-between align-items-center border-bottom border-dashed">
                                <h4 class="header-title">Transactions</h4>
                                <a href="javascript:void(0);" class="btn btn-sm btn-light">Add New <i
                                        class="ri-add-line ms-1"></i></a>
                            </div>
                            <div class="card-body" data-simplebar style="height: 400px;">
                                <div class="timeline-alt py-0">
                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <i data-lucide="shopping-bag"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">You sold an item</a>
                                            <span class="mb-1">Paul Burgess just purchased “My - Admin
                                                Dashboard”!</span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">5 minutes ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-primary-subtle text-primary timeline-icon">
                                            <i data-lucide="rocket"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">Product on the Theme
                                                Market</a>
                                            <span class="mb-1">Reviewer added
                                                <span class="fw-medium">Admin Dashboard</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">30 minutes ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <i data-lucide="message-circle"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">Robert Delaney</a>
                                            <span class="mb-1">Send you message
                                                <span class="fw-medium">"Are you there?"</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">2 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-primary-subtle text-primary timeline-icon">
                                            <i data-lucide="image"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">Audrey Tobey</a>
                                            <span class="mb-1">Uploaded a photo
                                                <span class="fw-medium">"Error.jpg"</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">14 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <i data-lucide="shopping-bag"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">You sold an item</a>
                                            <span class="mb-1">Paul Burgess just purchased “My - Admin
                                                Dashboard”!</span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">16 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-primary-subtle text-primary timeline-icon">
                                            <i data-lucide="rocket"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">Product on the Bootstrap
                                                Market</a>
                                            <span class="mb-1">Reviewer added
                                                <span class="fw-medium">Admin Dashboard</span>
                                            </span>
                                            <p class="mb-0 pb-3">
                                                <small class="text-muted">22 hours ago</small>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="timeline-item">
                                        <span class="bg-info-subtle text-info timeline-icon">
                                            <i data-lucide="message-circle"></i>
                                        </span>
                                        <div class="timeline-item-info">
                                            <a href="javascript:void(0);"
                                                class="link-reset fw-semibold mb-1 d-block">Robert Delaney</a>
                                            <span class="mb-1">Send you message
                                                <span class="fw-medium">"Are you there?"</span>
                                            </span>
                                            <p class="mb-0 pb-2">
                                                <small class="text-muted">2 days ago</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xxl-4">
                        <div class="card">
                            <div
                                class="card-header d-flex flex-wrap align-items-center gap-2 border-bottom border-dashed">
                                <h4 class="header-title me-auto">Transactions Uses</h4>

                                <div class="d-flex gap-2 justify-content-end text-end">
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary">Refresh <i
                                            class="ri-reset-right-line ms-1"></i></a>
                                </div>
                            </div>
                            <div data-simplebar style="height: 400px;">
                                <ul class="list-unstyled transaction-list mb-0">
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">Advertising</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">07/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-up" class="fs-20 text-danger"></i>
                                        <span class="tran-text">Support licence</span>
                                        <span class="text-danger tran-price">-$965</span>
                                        <span class="text-muted ms-auto">07/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">Extended licence</span>
                                        <span class="text-success tran-price">+$830</span>
                                        <span class="text-muted ms-auto">07/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">Advertising</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">05/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-up" class="fs-20 text-danger"></i>
                                        <span class="tran-text">New plugins added</span>
                                        <span class="text-danger tran-price">-$452</span>
                                        <span class="text-muted ms-auto">05/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">Google Inc.</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">04/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-up" class="fs-20 text-danger"></i>
                                        <span class="tran-text">Facebook Ad</span>
                                        <span class="text-danger tran-price">-$364</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">New sale</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">Advertising</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">29/08/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-up" class="fs-20 text-danger"></i>
                                        <span class="tran-text">Support licence</span>
                                        <span class="text-danger tran-price">-$854</span>
                                        <span class="text-muted ms-auto">27/08/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">Google Inc.</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">04/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-up" class="fs-20 text-danger"></i>
                                        <span class="tran-text">Facebook Ad</span>
                                        <span class="text-danger tran-price">-$364</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                    <li class="px-3 py-2 d-flex align-items-center">
                                        <i data-lucide="arrow-big-down" class="fs-20 text-success"></i>
                                        <span class="tran-text">New sale</span>
                                        <span class="text-success tran-price">+$230</span>
                                        <span class="text-muted ms-auto">03/09/2017</span>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

            </div> <!-- container -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="page-container">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start">
                            <script>document.write(new Date().getFullYear())</script> © Abstack - By <span class="fw-bold text-decoration-underline text-uppercase text-reset fs-12">Coderthemes</span>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center gap-2 px-3 py-3 offcanvas-header border-bottom border-dashed">
            <h5 class="flex-grow-1 mb-0">Theme Settings</h5>

            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0 h-100" data-simplebar>
            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label p-3 w-100 d-flex justify-content-center align-items-center"
                                for="layout-color-light">
                                <iconify-icon icon="solar:sun-bold-duotone" class="fs-32 text-muted"></iconify-icon>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label p-3 w-100 d-flex justify-content-center align-items-center"
                                for="layout-color-dark">
                                <iconify-icon icon="solar:cloud-sun-2-bold-duotone" class="fs-32 text-muted"></iconify-icon>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Topbar Color</h5>

                <div class="row">
                    <div class="col-3 darkMode">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-light"
                                value="light">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-light">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-white"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-dark"
                                value="dark">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-dark">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background-color: #313a46;"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-brand"
                                value="brand">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-brand">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-primary"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Brand</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar-color" id="topbar-color-gradient"
                                value="gradient">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="topbar-color-gradient">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background: linear-gradient(to top,#5d6dc3,#3c86d8);"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Gradient</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Menu Color</h5>

                <div class="row">
                    <div class="col-3 darkMode">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-light"
                                value="light">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-light">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-white"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Light</h5>
                    </div>

                    <div class="col-3">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-dark"
                                value="dark">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-dark">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background-color: #313a46;"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Dark</h5>
                    </div>
                    <div class="col-3">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-brand"
                                value="brand">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-brand">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle bg-primary"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Brand</h5>
                    </div>
                    <div class="col-3">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-menu-color" id="sidenav-color-gradient"
                                value="gradient">
                            <label class="form-check-label p-0 avatar-lg w-100 bg-light" for="sidenav-color-gradient">
                                <span class="d-flex align-items-center justify-content-center h-100">
                                    <span class="p-2 d-inline-flex shadow rounded-circle"
                                        style="background: linear-gradient(to top,#5d6dc3,#3c86d8);"></span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Gradient</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 .border-bottom .border-dashed">
                <h5 class="mb-3 fs-16 fw-bold">Sidebar Size</h5>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-default"
                                value="default">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-default">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1 px-2">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Default</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-compact"
                                value="compact">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-compact">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end  flex-column p-1">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Compact</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-small"
                                value="condensed">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Condensed</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size"
                                id="sidenav-size-small-hover" value="sm-hover">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small-hover">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Hover View</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size"
                                id="sidenav-size-small-hover-active" value="sm-hover-active">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-small-hover-active">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="bg-light d-flex h-100 border-end flex-column" style="padding: 2px;">
                                            <span class="d-block p-1 bg-dark-subtle rounded mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                            <span
                                                class="d-block border border-3 border-secondary border-opacity-25 rounded w-100 mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Hover Active</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size" id="sidenav-size-full"
                                value="full">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-full">
                                <span class="d-flex h-100">
                                    <span class="flex-shrink-0">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="d-block p-1 bg-dark-subtle mb-1"></span>
                                        </span>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Full Layout</h5>
                    </div>

                    <div class="col-4">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidenav-size"
                                id="sidenav-size-fullscreen" value="fullscreen">
                            <label class="form-check-label p-0 avatar-xl w-100" for="sidenav-size-fullscreen">
                                <span class="d-flex h-100">
                                    <span class="flex-grow-1">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-block p-1"></span>
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <h5 class="fs-14 text-center text-muted mt-2">Hidden</h5>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed d-none">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fs-16 fw-bold mb-0">Container Width</h5>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-container-position" id="container-width-fixed"
                            value="fixed">
                        <label class="btn btn-sm btn-soft-primary w-sm" for="container-width-fixed">Full</label>

                        <input type="radio" class="btn-check" name="data-container-position" id="container-width-scrollable"
                            value="scrollable">
                        <label class="btn btn-sm btn-soft-primary w-sm ms-0" for="container-width-scrollable">Boxed</label>
                    </div>
                </div>
            </div>

            <div class="p-3 border-bottom border-dashed d-none">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fs-16 fw-bold mb-0">Layout Position</h5>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                            value="fixed">
                        <label class="btn btn-sm btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                        <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable"
                            value="scrollable">
                        <label class="btn btn-sm btn-soft-primary w-sm ms-0"
                            for="layout-position-scrollable">Scrollable</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 px-3 py-2 offcanvas-header border-top border-dashed">
            <button type="button" class="btn w-50 btn-soft-danger" id="reset-layout">Reset</button>
            <a href="https://1.envato.market/coderthemes" target="_blank" class="btn w-50 btn-soft-info">Buy Now</a>
        </div>

    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <!-- Apex Chart js -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>
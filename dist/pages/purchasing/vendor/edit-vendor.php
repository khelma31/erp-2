<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../assets/css/app.css">
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        <!-- Sidebar -->
        <?php include '../../../layouts/_sidebar.php'; ?>
        <!-- Sidebar -->

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">

                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                            <h3>Edit Vendor</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/purchasing/vendor/list-vendor.php">List Vendor</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Vendor</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row p-3">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="city-column" class="mb-2">Name</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            name="fname-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <div class="col d-flex justify-content-start mb-3">
                                                            <label for="">Is the vendor an individual or a company?</label>
                                                        </div>
                                                        <input class="form-check-input me-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                        <label class="form-check-label me-2" for="flexRadioDefault1">
                                                            Individual
                                                        </label>
                                                        <input class="form-check-input me-1" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Company
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Address</label>
                                                        <input type="text" id="country-floating" class="form-control mb-3"
                                                            name="country-floating" placeholder="Street...">
                                                        <input type="text" id="country-floating" class="form-control mb-3"
                                                            name="country-floating" placeholder="Street 2...">
                                                        <div class="input-group mb-3" role="group">
                                                            <input type="text" id="city" class="form-control" name="city" placeholder="City">
                                                            <input type="text" id="state" class="form-control" name="state" placeholder="State">
                                                            <input type="text" id="zip" class="form-control" name="zip" placeholder="ZIP">
                                                        </div>
                                                        <input type="text" id="country-floating" class="form-control mb-3"
                                                            name="country-floating" placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Phone</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="country-floating" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Email</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="country-floating" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Website</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="country-floating" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="email-id-column" class="mb-2">Add Image</label>
                                                        <input type="file" class="form-control" id="inputGroupFile01">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit"
                                                        class="btn btn-primary me-2 mb-1">Save</button>
                                                    <a type="reset"
                                                        class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/purchasing/vendor/list-vendor.php">Cancel</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
    <script src="../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>
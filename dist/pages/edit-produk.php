<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        <!-- Sidebar -->
        <?php include '../../dist/layouts/_sidebar.php'; ?>
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
                            <h3>Edit Product</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../../dist/pages/list-produk.php">List Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                                                <div class="col-md-3 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="last-name-column" class="mb-2">Product Category</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect">
                                                                <option value="" disabled selected>- Choose Category -</option>
                                                                <option>Minyak Esensial</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="last-name-column" class="mb-2">Product Variant</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect">
                                                                <option value="" disabled selected>- Choose Variant -</option>
                                                                <option>Parfume Cowo 50ml</option>
                                                                <option>Parfume Cowo 100ml</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Sales Price</label>
                                                        <div class="input-group mb-3">
                                                            <input type="number" class="form-control"
                                                                aria-label="Text input with dropdown button"
                                                                placeholder="Rp.">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false">Tax</button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">11%</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Cost</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="country-floating" placeholder="Rp.">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="company-column" class="mb-2">Barcode</label>
                                                        <input type="text" id="company-column" class="form-control"
                                                            name="company-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="email-id-column" class="mb-2">Add Image</label>
                                                        <input type="file" class="form-control" id="inputGroupFile01">
                                                        <!-- <input type="file" class="image-crop-filepond" image-crop-aspect-ratio="1:1"> -->
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="company-column" class="mb-2">Description</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Save</button>
                                                    <a type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1" href="../../dist/pages/list-produk.php">Cancel</a>
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
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>
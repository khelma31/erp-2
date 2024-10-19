<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview Bill of Material</title>

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
                            <h3>Overview Bill of Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../../dist/pages/list-bom.php">List Bill of Material</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Overview Bill of Material</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 style="text-align: right;">Product Reference</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row p-3">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Product Cost</th>
                                                        <th>BoM Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <b style="text-decoration: solid;">Parfume Cowo 50ml</b>
                                                        </td>
                                                        <td>1.00</td>
                                                        <td>Rp. 2000</td>
                                                        <td>Rp. 2000</td>
                                                    </tr>
                                                    <tr class="indent">
                                                        <td>Botol</td>
                                                        <td>1.00</td>
                                                        <td>Rp. 2000</td>
                                                        <td>Rp. 2000</td>
                                                    </tr>
                                                    <tr class="indent">
                                                        <td>Botol</td>
                                                        <td>1.00</td>
                                                        <td>Rp. 2000</td>
                                                        <td>Rp. 2000</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a type="reset"
                                                class="btn btn-outline-danger mb-1" href="../../dist/pages/list-bom.php">Cancel</a>
                                        </div>
                                    </form>
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

    <style>
        /* Styling kolom dan rata teks */
        #table1 th,
        #table1 td {
            text-align: left;
        }

        #table1 th:nth-child(1),
        #table1 td:nth-child(1) {
            width: 40%;
            /* Kolom Product lebih lebar */
        }

        #table1 th:nth-child(2),
        #table1 td:nth-child(2),
        #table1 th:nth-child(3),
        #table1 td:nth-child(3),
        #table1 th:nth-child(4),
        #table1 td:nth-child(4) {
            text-align: right;
            /* Kolom selain Product rata kanan */
            width: 20%;
        }

        /* Menambahkan indentasi untuk baris tertentu */
        .indent td:first-child {
            padding-left: 50px;
        }
    </style>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader - Mazer Admin Dashboard</title>

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
                            <h3>Add Bill of Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../../dist/pages/list-bom.php">List Bill of Material</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Bill of Material</li>
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
                                                        <label for="city-column" class="mb-2">Product</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect">
                                                                <option value="" disabled selected>- Choose Product -</option>
                                                                <option>Minyak Esensial</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="last-name-column" class="mb-2">Product Reference</label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            name="fname-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="city-column" class="mb-2">Product Variants</label>
                                                        <input type="text" id="city-column" class="form-control"
                                                            name="city-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="country-floating" class="mb-2">Quantity</label>
                                                        <input type="text" id="country-floating" class="form-control"
                                                            name="country-floating">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="company-column">Unit</label>
                                                        <input type="text" id="company-column" class="form-control"
                                                            name="company-column">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="form">
                                            <div class="row p-3">
                                                <div class="page-title">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                                                            <h5>Input Material</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <div class="row">
                                                        <div class="col-md-12 col-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-outline-primary btn-sm me-2" id="addMaterialButton">
                                                                <i class="bi bi-plus-square bi-middle me-2"></i>Add Material</button>
                                                        </div>
                                                    </div>
                                                    <table class="table mt-3" id="materialTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Material</th>
                                                                <th>Quantity</th>
                                                                <th>Unit</th>
                                                                <th>Action</th> <!-- Tambahkan kolom Action -->
                                                            </tr>
                                                        </thead>
                                                        <tbody id="materialTabelBody">
                                                            <tr>
                                                                <td>
                                                                    <select class="form-select" name="material[]" required>
                                                                        <option value="" disabled selected>- Select Material -</option>
                                                                        <option value="Steel">Steel</option>
                                                                        <option value="Aluminum">Aluminum</option>
                                                                        <option value="Plastic">Plastic</option>
                                                                        <option value="Copper">Copper</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="unit[]" class="form-control" placeholder="Unit" required>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                                                        <i class="bi bi-trash bi-middle"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div id="materialForm" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="materialName">Material Name</label>
                                                                    <input type="text" class="form-control" id="materialName">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="materialQuantity">Quantity</label>
                                                                    <input type="text" class="form-control" id="materialQuantity">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="materialUnit">Unit</label>
                                                                    <input type="text" class="form-control" id="materialUnit">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" id="submitBahanButton">Tambahkan Bahan</button>
                                                    </div>

                                                </div>

                                                <div class="col-12 d-flex justify-content-end mt-5">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <a type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1" href="../../dist/pages/list-bom.php">Cancel</a>
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

    <!-- Import jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Fungsi untuk menambah baris material baru
        document.getElementById('addMaterialButton').addEventListener('click', function() {
            var tableBody = document.getElementById('materialTabelBody');

            var newRow = document.createElement('tr');

            var cell1 = document.createElement('td');
            var cell2 = document.createElement('td');
            var cell3 = document.createElement('td');
            var cell4 = document.createElement('td'); // Kolom Action

            // Dropdown Material
            cell1.innerHTML = `
            <select class="form-select" name="material[]" required>
                <option value="" disabled selected>- Select Material -</option>
                <option value="Steel">Steel</option>
                <option value="Aluminum">Aluminum</option>
                <option value="Plastic">Plastic</option>
                <option value="Copper">Copper</option>
            </select>`;

            // Input Quantity
            cell2.innerHTML = `<input type="number" name="quantity[]" class="form-control" placeholder="Quantity" required>`;

            // Input Unit
            cell3.innerHTML = `<input type="text" name="unit[]" class="form-control" placeholder="Unit" required>`;

            // Tombol Delete
            cell4.innerHTML = `
            <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                <i class="bi bi-trash bi-middle"></i>
            </button>`;

            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            newRow.appendChild(cell4);

            tableBody.appendChild(newRow);
        });

        // Event listener untuk tombol delete
        document.addEventListener('click', function(e) {
            if (e.target && e.target.closest('.deleteMaterialButton')) {
                e.target.closest('tr').remove();
            }
        });
    </script>

</body>

</html>
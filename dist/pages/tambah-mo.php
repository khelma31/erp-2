<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manufacturing Order</title>

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
                            <h3>Add Manufacturing Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../../dist/pages/list-mo.php">List Manufacturing Order</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Manufacturing Order</li>
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
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col d-flex" style="padding: 30px;">
                                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn disabled btn-primary">Draft</button>
                                                    <button type="button" class="btn disabled btn-primary">Mark As Todo</button>
                                                    <button type="button" class="btn disabled btn-primary">Check Availability</button>
                                                    <button type="button" class="btn disabled btn-primary">Produce</button>
                                                    <button type="button" class="btn disabled btn-primary">Mark As Done</button>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-end" style="padding: 30px;">
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-secondary btn-sm">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 style="text-align: left; padding: 40px; margin-top: -40px; margin-bottom: -20px">Product Reference</h3>
                                </div>
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
                                                    <label for="last-name-column" class="mb-2">Bill of Material</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
                                                            <option value="" disabled selected>- Choose Bill of Material -</option>
                                                            <option>Minyak Esensial</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="city-column" class="mb-2">Quantity to Produce</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control"
                                                            aria-label="Sizing example input"
                                                            aria-describedby="inputGroup-sizing-default"
                                                            step="0.01">
                                                        <span class="input-group-text"
                                                            id="inputGroup-sizing-default">Unit</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="form">
                                        <div class="row p-3">
                                            <div class="table-responsive">
                                                <table class="table mt-3" id="materialTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>To Produce</th>
                                                            <th>Reserved</th>
                                                            <th>Consumed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="materialTabelBody">
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="quantity[]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="quantity[]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="unit[]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="unit[]" class="form-control" required>
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

                                            <div class="col-12 d-flex justify-content-end mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary me-1 mb-1">Save</button>
                                                <a type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1" href="../../dist/pages/list-mo.php">Cancel</a>
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
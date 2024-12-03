<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manufacturing Order</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../../assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">

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
                            <h3>Purchase Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Purchase Order</li>
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
                                                    <button type="button" class="btn disabled btn-primary">Request for Quotation</button>
                                                    <button type="button" class="btn btn-primary no-click">Purchase Order</button>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-end" style="padding: 30px;">
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-danger btn-sm">
                                                        <i class="bi bi-mailbox bi-middle me-1"></i>
                                                        Send by Email
                                                    </a>
                                                </div>
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-secondary btn-sm">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex" style="padding-left: 30px;">
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-primary btn-md"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                        Validate
                                                    </a>
                                                </div>
                                                <!-- Vertically Centered modal Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically
                                                                    Centered
                                                                </h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Do you wish to proceed with accepting this order?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary ml-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Accept</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row p-3">
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="city-column" class="mb-2">Vendor</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="basicSelect">
                                                            <option value="" disabled selected>- Choose Vendor -</option>
                                                            <option>Option 1</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="last-name-column" class="mb-2">Order Date</label>
                                                    <input type="date" id="order-date-column" name="order_date" class="form-control">
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
                                                        <button type="button" class="btn btn-outline-primary btn-sm" id="addMaterialButton">
                                                            <i class="bi bi-plus-square bi-middle me-2"></i>Add Material</button>
                                                    </div>
                                                </div>
                                                <table class="table mt-3" id="materialTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Tax</th>
                                                            <th>Subtotal</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="materialTabelBody">
                                                        <tr>
                                                            <td>
                                                                <select class="form-select" name="product[]" required>
                                                                    <option value="" disabled selected>- Select Product -</option>
                                                                    <option value="Steel">Option 1</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="quantity[]" class="form-control" placeholder="0" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="tax[]" class="form-control" placeholder="10%" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="subtotal[]" class="form-control" placeholder="Rp. 0" disabled>
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
                                                                <label for="materialProduct">Product</label>
                                                                <input type="text" class="form-control" id="materialProduct">
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
                                                                <label for="materialUnit">Unit Price</label>
                                                                <input type="text" class="form-control" id="materialPrice">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="materialTax">Tax</label>
                                                                <input type="number" class="form-control" id="materialTax">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="materialSubtotal">Subtotal</label>
                                                                <input type="number" class="form-control" id="materialSubtotal">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary" id="submitBahanButton">Tambahkan Bahan</button>
                                                </div>

                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-5">
                                                <button type="submit"
                                                    class="btn btn-primary me-2 mb-1">Confirm Order</button>
                                                <a type="reset"
                                                    class="btn btn-light-secondary mb-1" href="list-rfq.php">Cancel</a>
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
            var cell4 = document.createElement('td');
            var cell5 = document.createElement('td');
            var cell6 = document.createElement('td'); // Kolom Action

            // Dropdown Product
            cell1.innerHTML = `
            <select class="form-select" name="product[]" required>
                <option value="" disabled selected>- Select Product -</option>
                <option value="Steel">Option 1</option>
            </select>`;

            // Quantity
            cell2.innerHTML = `<input type="number" name="quantity[]" class="form-control" placeholder="0" required>`;

            // Unit Price
            cell3.innerHTML = `<input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" required>`;

            // Tax
            cell4.innerHTML = `<input type="number" name="tax[]" class="form-control" placeholder="10%" disabled>`;

            // Subtotal
            cell5.innerHTML = `<input type="number" name="subtotal[]" class="form-control" placeholder="Rp. 0" disabled>`;

            // Tombol Delete
            cell6.innerHTML = `
            <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                <i class="bi bi-trash bi-middle"></i>
            </button>`;

            newRow.appendChild(cell1);
            newRow.appendChild(cell2);
            newRow.appendChild(cell3);
            newRow.appendChild(cell4);
            newRow.appendChild(cell5);
            newRow.appendChild(cell6);

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
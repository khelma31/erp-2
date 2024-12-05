<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add RFQ</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../assets/css/app.css">
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?php include '../../../layouts/_sidebar.php'; ?>
        <!-- Main Content -->
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
                            <h3>Add Request for Quotation</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/purchasing/rfq/list-rfq.php">List Request for Quotation</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Request for Quotation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">b 
                                <div class="card-content">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col d-flex" style="padding: 30px;">
                                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary">Request for Quotation</button>
                                                    <button type="button" class="btn disabled btn-primary">Purchase Order</button>
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
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Form -->
                                    <form id="rfqForm">
                                        <!-- Vendor and Order Date -->
                                        <div class="row p-3">
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="vendorSelect" class="form-label">Vendor</label>
                                                <select class="form-select" id="vendorSelect" required>
                                                    <option value="" disabled selected>- Choose Vendor -</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="order-date-column" class="form-label">Order Date</label>
                                                <input type="date" id="order-date-column" name="order_date" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Material Table -->
                                        <div class="table-responsive">
                                            <button type="button" class="btn btn-outline-primary btn-sm mb-3" id="addMaterialButton">
                                                <i class="bi bi-plus-square me-2"></i>Add Material
                                            </button>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Material</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Tax (%)</th>
                                                        <th>Subtotal</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="materialTabelBody">
                                                    <tr>
                                                        <td>
                                                            <select class="form-select" name="material[]" required>
                                                                <option value="" disabled selected>- Select Material -</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="quantity[]" class="form-control" placeholder="0" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="tax[]" class="form-control" value="11" readonly>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="subtotal[]" class="form-control" placeholder="Rp. 0" readonly>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <a href="../../purchasing/rfq/list-rfq.php" class="btn btn-secondary ms-2">Cancel</a>
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

    <!-- JavaScript -->
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch vendors
            $.ajax({
                url: 'http://localhost:3000/app/api/v1/vendors',
                type: 'GET',
                success: function(response) {
                    const vendorSelect = $('#vendorSelect');
                    response.data.forEach(function(vendor) {
                        vendorSelect.append(new Option(`${vendor.id_vendor} - ${vendor.vendorname}`, vendor.id_vendor));
                    });
                },
                error: function() {
                    alert('Failed to load vendors.');
                }
            });

            // Fetch materials
            function fetchMaterials(materialSelect) {
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/material/all',
                    type: 'GET',
                    success: function(response) {
                        response.data.forEach(function(material) {
                            materialSelect.append(new Option(`${material.id_material} - ${material.Materialname}`, material.id_material));
                        });
                    },
                    error: function() {
                        alert('Failed to load materials.');
                    }
                });
            }

            fetchMaterials($('#materialTabelBody select[name="material[]"]'));

            // Add new material row
            $('#addMaterialButton').click(function() {
                const newRow = `
                    <tr>
                        <td>
                            <select class="form-select" name="material[]" required>
                                <option value="" disabled selected>- Select Material -</option>
                            </select>
                        </td>
                        <td><input type="number" name="quantity[]" class="form-control" required></td>
                        <td><input type="number" name="unitPrice[]" class="form-control" required></td>
                        <td><input type="number" name="tax[]" class="form-control" value="11" readonly></td>
                        <td><input type="number" name="subtotal[]" class="form-control" readonly></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>`;
                const newRowElement = $(newRow);
                $('#materialTabelBody').append(newRowElement);
                fetchMaterials(newRowElement.find('select[name="material[]"]'));
            });

            // Delete material row
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                $(this).closest('tr').remove();
            });

            // Submit form
            $('#rfqForm').submit(function(e) {
                e.preventDefault();

                const id_vendor = $('#vendorSelect').val();
                const order_date = $('#order-date-column').val();
                const products = [];

                $('#materialTabelBody tr').each(function() {
                    const materialId = $(this).find('select[name="material[]"]').val();
                    const quantity = $(this).find('input[name="quantity[]"]').val();
                    const unitPrice = $(this).find('input[name="unitPrice[]"]').val();
                    const subtotal = (quantity * unitPrice * 1.11).toFixed(2);

                    if (materialId && quantity && unitPrice) {
                        products.push({
                            id_product: materialId,
                            quantity: quantity,
                            unitprice: unitPrice,
                            tax: "11%",
                            subtotal: subtotal
                        });
                    }
                });

                const postData = {
                    id_vendor,
                    order_date,
                    products
                };

                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/rfq',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(postData),
                    success: function() {
                        alert('RFQ submitted successfully!');
                        window.location.href = '../../purchasing/rfq/list-rfq.php';
                    },
                    error: function() {
                        alert('Failed to submit RFQ.');
                    }
                });
            });
        });
    </script>
</body>

</html>
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
                            <h3>Add Quotations</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/sales/quotations/list-quotation.php">List Quotations</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Quotations</li>
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
                                            <div class="col d-flex" style="padding: 30px; padding-right: 16px;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-primary">Quotation</button>
                                                    <button type="button" class="btn disabled btn-primary">Sales Order</button>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-end" style="padding: 30px; padding-right: 16px;">
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
                                                <label for="vendorSelect" class="form-label">Customer</label>
                                                <select class="form-select" id="vendorSelect" required>
                                                    <option value="" disabled selected>- Choose Customer -</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="order-date-column" class="form-label">Expiration Date</label>
                                                <input type="date" id="order-date-column" name="order-date-column" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="currency" class="form-label">Currency</label>
                                                <input type="text" id="currency" name="currency" class="form-control" placeholder="IDR" disabled>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="payment" class="form-label">Payment Terms</label>
                                                <select class="form-select" id="paymentSelect" required>
                                                    <option value="" disabled selected>- Choose Payment -</option>
                                                    <option value="Immediate Payment">Immediate Payment</option>
                                                    <option value="End of Following Month">End of Following Month</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row p-3">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                                                        <h5>Input Product</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <div class="row">
                                                    <div class="col-md-12 col-12 d-flex justify-content-end">
                                                        <button
                                                            type="button"
                                                            class="btn btn-outline-primary btn-sm"
                                                            id="addMaterialButton">
                                                            <i class="bi bi-plus-square bi-middle me-2"></i>Add Product</button>
                                                    </div>
                                                </div>
                                                <table class="table mt-3" id="materialTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
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
                                                                    <option value="" disabled selected>- Select Product -</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    name="quantity[]"
                                                                    class="form-control"
                                                                    placeholder="Quantity"
                                                                    required>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    name="unitPrice[]"
                                                                    class="form-control"
                                                                    placeholder="Rp."
                                                                    required>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    name="tax[]"
                                                                    class="form-control"
                                                                    placeholder="11"
                                                                    disabled>
                                                            </td>
                                                            <td>
                                                                <input
                                                                    type="text"
                                                                    name="subtotal[]"
                                                                    class="form-control"
                                                                    placeholder="Rp."
                                                                    disabled>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                                                    <i class="bi bi-trash bi-middle"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-5">
                                                <button type="submit" class="btn btn-primary me-2 mb-1">Confirm</button>
                                                <a type="reset" class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/sales/quotations/list-quotation.php">Cancel</a>
                                            </div>
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
    <script src="../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("Document ready - initializing script");

            // Fetch vendors
            $.ajax({
                url: 'http://localhost:3000/app/api/v1/costumers',
                type: 'GET',
                success: function(response) {
                    console.log("Vendors fetched:", response);
                    const vendorSelect = $('#vendorSelect');
                    response.data.forEach(function(vendor) {
                        vendorSelect.append(new Option(`${vendor.id_costumer} - ${vendor.costumername}`, vendor.id_costumer));
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Failed to fetch Costumer:", error);
                    alert('Failed to load Costumer.');
                }
            });

            // Fetch materials
            function fetchMaterials(materialSelect) {
                console.log("Fetching materials...");
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/product/all',
                    type: 'GET',
                    success: function(response) {
                        console.log("Materials fetched:", response);
                        response.data.forEach(function(material) {
                            materialSelect.append(new Option(`${material.id_product} - ${material.Productname}`, material.id_product));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to fetch materials:", error);
                        alert('Failed to load materials.');
                    }
                });
            }

            fetchMaterials($('#materialTabelBody select[name="material[]"]'));

            // Function to calculate subtotal
            function calculateSubtotal(row) {
                const quantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;
                const unitPrice = parseFloat(row.find('input[name="unitPrice[]"]').val()) || 0;
                const subtotal = (quantity * unitPrice * 1.11).toFixed(2); // Include tax in subtotal

                console.log("Calculating subtotal:", {
                    quantity,
                    unitPrice,
                    subtotal
                });
                row.find('input[name="subtotal[]"]').val(subtotal);
            }

            // Add new material row
            $('#addMaterialButton').click(function() {
                console.log("Add Material button clicked");
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

                console.log("New row element created:", newRowElement);
                $('#materialTabelBody').append(newRowElement);

                console.log("New row appended to table");
                fetchMaterials(newRowElement.find('select[name="material[]"]'));
            });

            // Delete material row
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                console.log("Delete Material button clicked");
                $(this).closest('tr').remove();
            });

            // Recalculate subtotal on quantity or unit price change
            $('#materialTabelBody').on('input', 'input[name="quantity[]"], input[name="unitPrice[]"]', function() {
                const row = $(this).closest('tr');
                console.log("Input changed in row:", row);
                calculateSubtotal(row);
            });

            // Submit form
            $('#rfqForm').submit(function(e) {
                e.preventDefault();

                console.log("Form submission started");
                const id_vendor = $('#vendorSelect').val();
                const order_date = $('#order-date-column').val(); // Corrected ID for order date
                const payment = $('#paymentSelect').val(); // Added payment field
                const products = [];

                $('#materialTabelBody tr').each(function() {
                    const row = $(this);
                    const productId = row.find('select[name="material[]"]').val();
                    const productName = row.find('select[name="material[]"] option:selected').text().split(' - ')[1]; // Get material name
                    const quantity = row.find('input[name="quantity[]"]').val();
                    const unitPrice = row.find('input[name="unitPrice[]"]').val();
                    const subtotal = row.find('input[name="subtotal[]"]').val();
                    const tax = row.find('input[name="tax[]"]').val(); // Tax value (assuming 11)

                    console.log("Row data:", {
                        productId,
                        productName,
                        quantity,
                        unitPrice,
                        subtotal,
                        tax
                    });

                    if (productId && quantity && unitPrice) {
                        products.push({
                            id_product: productId,
                            productname: productName, // Include material name
                            quantity: quantity,
                            unitprice: unitPrice,
                            tax: tax, // Ensure tax is passed correctly
                            Subtotal: subtotal // Ensure subtotal is passed as a number
                        });
                    }
                });

                const postData = {
                    id_costumer: id_vendor, // Change 'id_vendor' to 'id_costumer'
                    order_date,
                    payment, // Added the payment field
                    products
                };

                console.log("Post data prepared:", postData);

                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/quotation',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(postData),
                    success: function(response) {
                        console.log("Form submitted successfully:", response);
                        alert('Quo submitted successfully!');
                        window.location.href = 'list-quotation.php';
                    },
                    error: function(xhr, status, error) {
                        console.error("Form submission failed:", {
                            status,
                            error
                        });
                        alert('Failed to submit Quo.');
                    }
                });
            });

        });
    </script>

    <script src="../../../assets/js/main.js"></script>

</body>

</html>
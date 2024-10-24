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
                                                    <label for="productSelect" class="mb-2">Product</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="productSelect">
                                                            <option value="" disabled selected>- Choose Product -</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="bomSelect" class="mb-2">Bill of Material</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="bomSelect">
                                                            <option value="" disabled selected>- Choose Bill of Material -</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="quantityToProduce" class="mb-2">Quantity to Produce</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" class="form-control" id="quantityToProduce" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01">
                                                        <span class="input-group-text" id="inputGroup-sizing-default">Unit</span>
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
                                                                <input type="text" name="material[]" class="form-control" required readonly>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="toProduce[]" class="form-control to-produce" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="reserved[]" class="form-control" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="consumed[]" class="form-control consumed" required readonly>
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
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                                <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="../../dist/pages/list-mo.php">Cancel</a>
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
        $(document).ready(function() {
            // Object to hold materials and their quantities
            let materialQuantities = {}; // Define this outside the AJAX success callback

            // Fetch products
            $.ajax({
                url: 'http://localhost:3000/app/api/v1/product/all',
                method: 'GET',
                success: function(response) {
                    const products = response.data;
                    products.forEach(function(product) {
                        const optionText = `${product.id_product} - ${product.Productname}`;
                        $('#productSelect').append(new Option(optionText, product.id_product));
                    });
                },
                error: function(error) {
                    console.error('Error fetching products:', error);
                }
            });

            // Fetch BOMs
            $.ajax({
                url: 'http://localhost:3000/app/api/v1/bom/all',
                method: 'GET',
                success: function(response) {
                    const boms = response.data;
                    boms.forEach(function(bom) {
                        const optionText = `${bom.id_bom} - ${bom.productname}`;
                        $('#bomSelect').append(new Option(optionText, bom.id_bom));
                    });
                },
                error: function(error) {
                    console.error('Error fetching BOMs:', error);
                }
            });

            // Fetch BOM Overview when a BOM is selected
            $('#bomSelect').change(function() {
                const selectedBom = $(this).val();

                if (selectedBom) {
                    // Fetch materials and store their quantities first
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/material/all',
                        method: 'GET',
                        success: function(response) {
                            const materialsData = response.data;

                            // Store quantities from the response
                            materialsData.forEach(function(material) {
                                materialQuantities[material.id_material] = material.Qty; // Store quantity for each material by ID
                                console.log("Material Quantities:", materialQuantities); // Tambahkan log untuk memeriksa apakah data material sudah benar
                            });

                            // After fetching material quantities, fetch the BOM overview
                            $.ajax({
                                url: `http://localhost:3000/app/api/v1/bom/${selectedBom}/overview`,
                                method: 'GET',
                                success: function(response) {
                                    const materials = response.data.materials;
                                    const materialTableBody = $('#materialTabelBody');

                                    // Clear previous rows
                                    materialTableBody.empty();

                                    materials.forEach(function(material) {
                                        const availableQty = materialQuantities[material.id_material] || 0; // Get available quantity from fetched materials
                                        console.log("Material ID:", material.id_material, "Available Quantity:", availableQty); // Log untuk cek apakah ID dan Qty cocok

                                        const reservedQty = material.quantity || 0; // Get reserved quantity from BOM

                                        const row = `<tr>
        <td><input type="text" name="material[]" class="form-control" value="${material.material}" readonly></td>
        <td><input type="number" name="toProduce[]" class="form-control to-produce" value="${reservedQty}" required readonly ></td>
        <td><input type="number" name="reserved[]" class="form-control" value="${availableQty}" required readonly></td>
        <td><input type="number" name="consumed[]" class="form-control consumed" value="${(reservedQty * quantityToProduce || 0).toFixed(8)}" required readonly></td>
    </tr>`;
                                        materialTableBody.append(row);
                                    });

                                },
                                error: function(error) {
                                    console.error('Error fetching BOM Overview:', error);
                                }
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching materials:', error);
                        }
                    });
                }
            });

            // Recalculate Consumed when Quantity to Produce changes
            $('#quantityToProduce').on('input', function() {
                const quantityToProduce = parseFloat($(this).val()) || 0;

                // Loop through each row in the material table to update Consumed
                $('#materialTabelBody tr').each(function() {
                    const toProduceValue = parseFloat($(this).find('.to-produce').val()) || 0;
                    const consumedInput = $(this).find('.consumed');

                    // Calculate consumed value
                    const consumedValue = toProduceValue * quantityToProduce;
                    consumedInput.val(consumedValue);
                });
            });
        });
    </script>





</body>

</html>
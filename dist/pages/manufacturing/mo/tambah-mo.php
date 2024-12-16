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
                            <h3>Add Manufacturing Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/mo/list-mo.php">List Manufacturing Order</a></li>
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
                                            <div class="col d-flex justify-content-end" style="padding: 30px; padding-right: 16px;">
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
                                                        <input type="number" class="form-control" id="quantityToProduce" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="1">
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
                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-4">
                                                <button type="button" class="btn btn-primary me-1 mb-1" id="saveButton" data-status="draft">Save</button>
                                                <a type="reset" class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/manufacturing/mo/list-mo.php">Cancel</a>
                                            </div>
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
        $(document).ready(function() {
            let materialQuantities = {}; // Store material quantities by ID

            // Fetch Products
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
                    Toastify({
                        text: "Failed to load products",
                        duration: 3000,
                        gravity: "top",
                        backgroundColor: "#f44336"
                    }).showToast();
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
                    Toastify({
                        text: "Failed to load BOMs",
                        duration: 3000,
                        gravity: "top",
                        backgroundColor: "#f44336"
                    }).showToast();
                }
            });

            function fetchMaterialQuantities(callback) {
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/material/all',
                    method: 'GET',
                    success: function(response) {
                        response.data.forEach(function(material) {
                            // Store quantity based on Materialname
                            materialQuantities[material.Materialname] = material.Qty || 0;
                        });
                        callback();
                    },
                    error: function(error) {
                        Toastify({
                            text: "Failed to load materials",
                            duration: 3000,
                            gravity: "top",
                            backgroundColor: "#f44336"
                        }).showToast();
                    }
                });
            }


            // Load BOM Overview when BOM is selected
            $('#bomSelect').change(function() {
                const selectedBom = $(this).val();

                if (selectedBom) {
                    fetchMaterialQuantities(() => {
                        $.ajax({
                            url: `http://localhost:3000/app/api/v1/bom/${selectedBom}/overview`,
                            method: 'GET',
                            success: function(response) {
                                const materials = response.data.materials;
                                const materialTableBody = $('#materialTabelBody');
                                materialTableBody.empty();

                                materials.forEach(function(material) {
                                    // Get the available quantity based on material name
                                    const availableQty = materialQuantities[material.material] || 0;
                                    const reservedQty = parseFloat(material.quantity) || 0;

                                    // Add a row to the table with the material data
                                    const row = `
                                <tr>
                                    <td><input type="text" name="material[]" class="form-control" value="${material.material}" readonly></td>
                                    <td><input type="number" name="toProduce[]" class="form-control to-produce" value="${reservedQty}" readonly></td>
                                    <td><input type="number" name="reserved[]" class="form-control" value="${availableQty}" readonly></td>
                                    <td><input type="number" name="consumed[]" class="form-control consumed" value="${(reservedQty * parseFloat($('#quantityToProduce').val()) || 0).toFixed(2)}" readonly></td>
                                </tr>`;
                                    materialTableBody.append(row);
                                });
                            },
                            error: function(error) {
                                Toastify({
                                    text: "Failed to load BOM overview",
                                    duration: 3000,
                                    gravity: "top",
                                    backgroundColor: "#f44336"
                                }).showToast();
                            }
                        });
                    });
                }
            });

            // Recalculate Consumed Quantities on Quantity to Produce input change
            $('#quantityToProduce').on('input', function() {
                const quantityToProduce = parseFloat($(this).val()) || 0;
                $('#materialTabelBody tr').each(function() {
                    const toProduceValue = parseFloat($(this).find('.to-produce').val()) || 0;
                    $(this).find('.consumed').val((toProduceValue * quantityToProduce).toFixed(2));
                });
            });

            // Save Manufacturing Order
            // Save Manufacturing Order
            $('#saveButton').on('click', function() {
                // Ambil status saat ini dari tombol
                const currentStatus = $(this).data('status');

                // Siapkan data sesuai dengan status saat ini
                let manufacturingOrderData = {};
                let url = '';

                if (currentStatus === 'draft') {
                    // Simpan MO baru
                    url = 'http://localhost:3000/app/api/v1/mo';
                    manufacturingOrderData = {
                        id_product: $('#productSelect').val(),
                        id_bom: $('#bomSelect').val(),
                        Qtytoproduce: $('#quantityToProduce').val(),
                        status: 'draft'

                    };
                    window.location.href = '../../manufacturing/mo/list-mo.php';
                }

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: JSON.stringify(manufacturingOrderData),
                    contentType: 'application/json',
                    success: function(response) {
                        if (currentStatus === 'draft') {
                            // Ubah status tombol menjadi 'confirm'
                            $('#saveButton').text('Confirm').data('status', 'confirm');
                        } else if (currentStatus === 'confirm') {
                            // Ubah status tombol menjadi 'confirmed' dan nonaktifkan
                            $('#saveButton').text('Confirmed').prop('disabled', true);
                            Toastify({
                                text: "Successfully updated manufacture order status",
                                duration: 3000,
                                gravity: "top",
                                backgroundColor: "#4caf50"
                            }).showToast();
                        }
                    },
                    error: function(error) {
                        console.error("Error updating status", error);
                        Toastify({
                            text: "Failed to update status",
                            duration: 3000,
                            gravity: "top",
                            backgroundColor: "#f44336"
                        }).showToast();
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
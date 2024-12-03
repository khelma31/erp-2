<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material</title>

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
        <?php include '../../../../dist/layouts/_sidebar.php'; ?>
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
                            <h3>Edit Bill of Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/bom/list-bom.php">List Bill of Material</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Bill of Material</li>
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
                                        <form class="form" id="bomForm">
                                            <div class="row p-3">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="basicSelect" class="mb-2">Product</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="basicSelect" name="product" required>
                                                                <option value="" disabled selected>- Choose Product -</option>
                                                                <!-- Example product -->
                                                                <option value="PRF-00001">Minyak Esensial</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="productReference" class="mb-2">Product Reference</label>
                                                        <input type="text" id="productReference" class="form-control" name="productReference" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="productVariant" class="mb-2">Product Variant</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="productVariant" name="productVariant" required>
                                                                <option value="" disabled selected>- Choose Variant -</option>
                                                                <option value="Cairan">Cairan</option> <!-- Example variant -->
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="quantity" class="mb-2">Quantity</label>
                                                        <input type="number" id="quantity" class="form-control" name="quantity" required>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="materialTabelBody">
                                                            <!-- Existing materials will be populated here -->
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end mt-5">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                                    <a type="reset" class="btn btn-light-secondary me-1 mb-1" href="/../../../../erp-2/dist/pages/manufacturing/bom/list-bom.php">Cancel</a>
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
            const urlParams = new URLSearchParams(window.location.search);
            const bomId = urlParams.get('id'); // Get material ID from URL
            fetchBomData(bomId);

            function fetchBomData(bomId) {
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/bom/${bomId}`, // Replace with your API endpoint
                    method: 'GET',
                    success: function(response) {
                        // Check if the response is successful
                        if (response.meta.code === 200) {
                            const data = response.data_bom;

                            // Populate Product Dropdown
                            $('#basicSelect').empty(); // Clear existing options
                            $('#basicSelect').append(`<option value="" disabled>- Choose Product -</option>`);
                            $('#basicSelect').append(`<option value="${data.id_product}" selected>${data.id_product} | ${data.productname}</option>`);

                            // Populate Product Reference
                            $('#productReference').val(data.productpreference); // Set Product Reference

                            // Populate Product Variant Dropdown
                            $('#productVariant').empty(); // Clear existing options
                            $('#productVariant').append(`<option value="" disabled>- Choose Variant -</option>`);
                            $('#productVariant').append(`<option value="${data.productname}" selected>${data.productname}</option>`);

                            // Set Quantity
                            $('#quantity').val(data.quantity); // Set Quantity

                            // Populate materials
                            const materials = data.materials;
                            $('#materialTabelBody').empty(); // Clear existing materials
                            materials.forEach(material => {
                                $('#materialTabelBody').append(`
                            <tr>
                                <td>
                                    <select class="form-select" name="material[]" required>
                                        <option value="${material.id_material}" selected>${material.id_material} | ${material.material_name}</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" class="form-control" value="${material.quantity}" required>
                                </td>
                                <td>
                                    <input type="text" name="unit[]" class="form-control" value="${material.unit}" required>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                        <i class="bi bi-trash bi-middle"></i>
                                    </button>
                                </td>
                            </tr>
                        `);
                            });

                            // Call the function to populate material select for existing materials
                            materials.forEach((material, index) => {
                                populateMaterialSelect($('#materialTabelBody tr').eq(index).find('select[name="material[]"]'));
                            });

                        } else {
                            console.error("Error:", response.meta.message);
                        }
                    },
                    error: function(error) {
                        console.log("Error fetching BOM data:", error);
                    }
                });
            }

            // Function to fetch materials and populate the select element
            function fetchMaterials() {
                return $.ajax({
                    url: 'http://localhost:3000/app/api/v1/material/all',
                    type: 'GET'
                });
            }

            function populateMaterialSelect(materialSelect) {
                fetchMaterials().then(function(response) {
                    if (response.meta.code === 200) {
                        response.data.forEach(function(material) {
                            var optionText = material.id_material + ' | ' + material.Materialname;
                            materialSelect.append(new Option(optionText, material.id_material));
                        });
                    } else {
                        console.error('Failed to fetch materials:', response.meta.message);
                    }
                }).catch(function(error) {
                    console.error('Error fetching materials:', error);
                });
            }

            // Handle Add Material Button Click
            $('#addMaterialButton').click(function() {
                const newRow = $(`
            <tr>
                <td>
                    <select class="form-select" name="material[]" required>
                        <option value="" disabled selected>- Choose Material -</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="quantity[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="unit[]" class="form-control" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                        <i class="bi bi-trash bi-middle"></i>
                    </button>
                </td>
            </tr>
        `);
                $('#materialTabelBody').append(newRow);
                populateMaterialSelect(newRow.find('select[name="material[]"]')); // Populate material select for new row
            });

            // Handle Delete Material Button Click
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                $(this).closest('tr').remove();
            });

            // Handle Form Submission
            $('#bomForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                const materials = [];
                $('#materialTabelBody tr').each(function() {
                    var materialId = $(this).find('[name="material[]"]').val(); // Get id_material
                    var material_name = $(this).find('[name="material[]"] option:selected').text().split(' | ')[1]; // Extract material name
                    var materialQuantity = $(this).find('[name="quantity[]"]').val();
                    var unit = $(this).find('[name="unit[]"]').val();

                    materials.push({
                        id_material: materialId,
                        material_name: material_name,
                        quantity: materialQuantity,
                        unit: unit
                    });
                });

                // Prepare form data
                const formData = {
                    id_product: $('#basicSelect').val(),
                    productname: $('#basicSelect').find('option:selected').text().split(' | ')[1],
                    productReference: $('#productReference').val(),
                    productVariant: $('#productVariant').val(),
                    quantity: $('#quantity').val(),
                    materials: materials
                };

                // Send form data to API
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/bom/edit/${bomId}`, // Replace with your API endpoint
                    method: 'PUT', // Use PUT for updating
                    contentType: 'application/json',
                    data: JSON.stringify(formData),
                    success: function(response) {
                        if (response.meta.code === 200) {
                            alert("BOM updated successfully!");
                            window.location.href = '../../dist/pages/list-bom.php'; // Redirect to list page
                        } else {
                            alert("Error updating BOM: " + response.meta.message);
                        }
                    },
                    error: function(error) {
                        alert("Error updating BOM: " + error.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>
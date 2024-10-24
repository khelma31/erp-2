<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bill of Material</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendors/toastify/toastify.css">
    <link
        rel="stylesheet"
        href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link
        rel="stylesheet"
        href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link
        rel="shortcut icon"
        href="../assets/images/favicon.svg"
        type="image/x-icon">
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
                                    <li class="breadcrumb-item">
                                        <a href="../../dist/pages/index.php">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="../../dist/pages/list-bom.php">List Bill of Material</a>
                                    </li>
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
                                        <form class="form" id="bomForm">
                                            <div class="row p-3">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="productSelect" class="mb-2">Product</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="productSelect" required>
                                                                <option value="" disabled selected>- Choose Product -</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="productpreference" class="mb-2">Product Reference</label>
                                                        <input
                                                            type="text"
                                                            id="productpreference"
                                                            class="form-control"
                                                            name="productpreference"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="variantSelect" class="mb-2">Product Variant</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="variantSelect" required>
                                                                <option value="" disabled selected>- Choose Variant -</option>
                                                                <option>Minyak Esensial</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="quantity" class="mb-2">Quantity</label>
                                                        <div class="input-group mb-3">
                                                            <input
                                                                type="text"
                                                                id="quantity"
                                                                class="form-control"
                                                                placeholder="Quantity"
                                                                required>
                                                            <button
                                                                class="btn btn-primary dropdown-toggle"
                                                                type="button"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false">Unit</button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a class="dropdown-item" href="#">g</a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item" href="#">ml</a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
                                                            <button
                                                                type="button"
                                                                class="btn btn-outline-primary btn-sm me-2"
                                                                id="addMaterialButton">
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
                                                            <tr>
                                                                <td>
                                                                    <select class="form-select" name="material[]" required>
                                                                        <option value="" disabled selected>- Select Material -</option>
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
                                                                        name="unit[]"
                                                                        class="form-control"
                                                                        placeholder="Unit"
                                                                        required>
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
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                                    <a
                                                        type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1"
                                                        href="../../dist/pages/list-bom.php">Cancel</a>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fetch products and populate product select
            $.ajax({
                url: 'http://localhost:3000/app/api/v1/product/variants/all',
                type: 'GET',
                success: function(response) {
                    var productSelect = $('#productSelect');
                    response.data.forEach(function(product) {
                        var optionText = product.id_product + ' - ' + product.Productname;
                        productSelect.append(new Option(optionText, product.id_product));
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching products:', error);
                    alert('Could not load products.');
                }
            });

            // Function to fetch materials
            function fetchMaterials() {
                return $.ajax({
                    url: 'http://localhost:3000/app/api/v1/material/all',
                    type: 'GET'
                });
            }

            // Function to populate material select
            function populateMaterialSelect(materialSelect) {
                fetchMaterials()
                    .then(function(response) {
                        if (response.meta.code === 200) {
                            response.data.forEach(function(material) {
                                var optionText = material.id_material + ' - ' + material.Materialname;
                                materialSelect.append(new Option(optionText, material.id_material));
                            });
                        } else {
                            console.error('Failed to fetch materials:', response.meta.message);
                        }
                    })
                    .catch(function(error) {
                        console.error('Error fetching materials:', error);
                    });
            }

            // Populate the initial row for materials
            populateMaterialSelect($('#materialTabelBody select[name="material[]"]'));


            // Add material button functionality
            document.getElementById('addMaterialButton').addEventListener('click', function() {
                var tableBody = document.getElementById('materialTabelBody');
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td>
                    <select class="form-select" name="material[]" required>
                        <option value="" disabled selected>- Select Material -</option>
                    </select>
                </td>
                <td>
                    <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" required>
                </td>
                <td>
                    <input type="text" name="unit[]" class="form-control" placeholder="Unit" required>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                        <i class="bi bi-trash bi-middle"></i>
                    </button>
                </td>
            `;
                tableBody.appendChild(newRow);

                // Populate material dropdown for the new row
                populateMaterialSelect($(newRow).find('select[name="material[]"]'));
            });

            // Event delegation for delete button
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                $(this).closest('tr').remove();
            });

            // Handle form submission
            $('#bomForm').on('submit', function(e) {
                e.preventDefault();

                var id_product = $('#productSelect').val();
                var productname = $('#productSelect').find('option:selected').text().split(' - ')[1];
                var productpreference = $('#productpreference').val();
                var quantity = $('#quantity').val();
                var materials = [];

                $('#materialTabelBody tr').each(function() {
                    var materialId = $(this).find('select[name="material[]"]').val();
                    var material_name = $(this).find('select[name="material[]"] option:selected').text().split(' - ')[1];
                    var materialQuantity = $(this).find('input[name="quantity[]"]').val();
                    var unit = $(this).find('input[name="unit[]"]').val();

                    // Add validation to ensure no empty values are submitted
                    if (materialId && materialQuantity && unit) {
                        materials.push({
                            id_material: materialId,
                            material_name: material_name,
                            quantity: materialQuantity,
                            unit: unit
                        });
                    } else {
                        alert('Please fill all fields for each material.');
                        return false; // Prevent form submission
                    }
                });

                var postData = {
                    id_product: id_product,
                    productname: productname,
                    productpreference: productpreference,
                    quantity: quantity,
                    materials: materials
                };

                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/bom',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(postData),
                    success: function(response) {
                        alert('Data saved successfully!');
                        window.location.href = '../../dist/pages/list-bom.php';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        alert('Could not save data.');
                    }
                });
            });
        });
    </script>

</body>

</html>
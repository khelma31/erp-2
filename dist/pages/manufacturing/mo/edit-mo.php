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
                                                    <button type="button" class="btn disabled btn-primary" id="draftButton">Draft</button>
                                                    <button type="button" class="btn disabled btn-primary" id="todoButton">Mark As Todo</button>
                                                    <button type="button" class="btn disabled btn-primary" id="availabilityButton">Check Availability</button>
                                                    <button type="button" class="btn disabled btn-primary" id="produceButton">Produce</button>
                                                    <button type="button" class="btn disabled btn-primary" id="doneButton">Mark As Done</button>
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
                                                        <select class="form-select" id="productSelect" disabled>
                                                            <option value="" disabled selected>- Choose Product -</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="bomSelect" class="mb-2">Bill of Material</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="bomSelect" disabled>
                                                            <option value="" disabled selected>- Choose Bill of Material -</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="quantityToProduce" class="mb-2">Quantity to Produce</label>
                                                    <div class="input-group mb-3">
                                                        <input disabled type="number" class="form-control" id="quantityToProduce" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" step="0.01">
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
                                                <button id="backToListButton" class="btn btn-primary d-none" onclick="window.location.href='list-bom.php';">
                                                    Back to List
                                                </button>
                                                <a type="reset" class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/manufacturing/mo/list-mo.php">Cancel</a>
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

    <style>
        .highlighted {
            background-color: #28a745;
            /* Warna hijau terang atau sesuaikan */
            color: white;
            border-color: #28a745;
        }
    </style>


    <script src="/../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/../../../assets/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <script src="/../../../assets/js/main.js"></script>

    <!-- Import jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const moId = urlParams.get('id');

            // Variables to store material quantities and overview
            let materialQuantities = {};
            let bomOverview = [];
            let allMaterialsAvailable = true;
            let materialsToReduce = [];

            if (moId) {
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/mo/${moId}`,
                    method: 'GET',
                    success: function(response) {
                        if (response.meta.code === 200) {
                            const data = response.data;

                            // Populate form fields
                            $('#productSelect').append(`<option value="${data.id_product}" selected>${data.id_product}</option>`);
                            $('#bomSelect').append(`<option value="${data.id_bom}" selected>${data.id_bom}</option>`);
                            $('#quantityToProduce').val(data.qtytoproduce);

                            // Update button status based on MO status
                            if (data.status === 'draft') {
                                $('#draftButton').addClass('highlighted').removeClass('disabled');
                                $('#saveButton').text('Confirm');
                            } else if (data.status === 'confirmed') {
                                $('#todoButton').addClass('highlighted').removeClass('disabled');
                                $('#saveButton').text('Check Availability');
                            } else if (data.status === 'on progress') {
                                $('#produceButton').addClass('highlighted').removeClass('disabled');
                                $('#saveButton').text('Done');
                            } else if (data.status === 'done') {
                                $('#doneButton').addClass('highlighted').removeClass('disabled');
                            }

                            // Fetch material quantities and BOM overview
                            fetchMaterialQuantities(() => {
                                fetchBOMOverview(data.id_bom, data.qtytoproduce);
                            });
                        } else {
                            console.error('Data tidak ditemukan');
                        }
                    },
                    error: function(error) {
                        console.error('Error saat mengambil data', error);
                    }
                });
            } else {
                console.error('ID tidak ditemukan di URL');
            }

            // Fetch material quantities
            function fetchMaterialQuantities(callback) {
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/material/all',
                    method: 'GET',
                    success: function(response) {
                        response.data.forEach(function(material) {
                            materialQuantities[material.Materialname] = material.Qty || 0;
                        });
                        callback(); // Call the callback after materials are fetched
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

            // Fetch BOM overview
            function fetchBOMOverview(bomId, qtyToProduce) {
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/bom/${bomId}/overview`,
                    method: 'GET',
                    success: function(response) {
                        const materials = response.data.materials;
                        const materialTableBody = $('#materialTabelBody');
                        materialTableBody.empty();
                        bomOverview = materials; // Store BOM overview for future use

                        materials.forEach(function(material) {
                            const availableQty = materialQuantities[material.material] || 0;
                            const reservedQty = parseFloat(material.quantity) || 0;
                            const consumedQty = (reservedQty * qtyToProduce).toFixed(2);

                            const row = `
                <tr>
                    <td><input type="text" name="material[]" class="form-control" value="${material.material}" readonly data-name="${material.material}"></td>
                    <td><input type="number" name="toProduce[]" class="form-control to-produce" value="${reservedQty}" readonly></td>
                    <td><input type="number" name="reserved[]" class="form-control" value="${availableQty}" readonly></td>
                    <td><input type="number" name="consumed[]" class="form-control consumed" value="${consumedQty}" readonly></td>
                </tr>`;
                            materialTableBody.append(row);
                        });

                        checkMaterialAvailability();
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
            }

            // Event listener for save button
            $('#saveButton').click(function() {
                if ($(this).text() === 'Confirm') {
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/mo/status/confirm',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id_mo: moId
                        }),
                        success: function(response) {
                            if (response.meta.code === 200) {
                                $('#saveButton').text('Check Availability');
                                $('#todoButton').removeClass('disabled').addClass('highlighted');
                                $('#draftButton').removeClass('highlighted').addClass('disabled');
                            }
                        },
                        error: function(error) {
                            Toastify({
                                text: "Failed to update MO status",
                                duration: 3000,
                                gravity: "top",
                                backgroundColor: "#f44336"
                            }).showToast();
                        }
                    });
                } else if ($(this).text() === 'Check Availability') {
                    let allMaterialsAvailable = true;
                    $('#materialTabelBody tr').each(function() {
                        const materialName = $(this).find('input[name="material[]"]').data('name'); // Mengambil nama material
                        const consumed = parseFloat($(this).find('input[name="consumed[]"]').val());

                        if (consumed > 0) {
                            materialsToReduce.push({
                                MaterialName: materialName, // Menggunakan nama material
                                Qty: consumed // Menggunakan jumlah yang dikonsumsi
                            });
                        }
                    });

                    // Memanggil fungsi checkAvailability setelah tombol Check Availability diklik
                    checkMaterialAvailability();

                    function checkMaterialAvailability() {
                        let allMaterialsAvailable = true; // Pastikan ini diset ulang
                        $('#materialTabelBody tr').each(function() {
                            const reserved = parseFloat($(this).find('input[name="reserved[]"]').val());
                            const consumed = parseFloat($(this).find('input[name="consumed[]"]').val());

                            if (reserved < consumed) {
                                $(this).find('input[name="consumed[]"]').addClass('bg-danger').removeClass('bg-success');
                                allMaterialsAvailable = false;
                            } else {
                                $(this).find('input[name="consumed[]"]').addClass('bg-success').removeClass('bg-danger');
                            }
                        });
                    }

                    // Lanjutkan dengan proses lainnya jika semua bahan tersedia
                    if (allMaterialsAvailable) {
                        $('#saveButton').text('Produce');
                        $('#availabilityButton').removeClass('disabled').addClass('highlighted');
                        $('#todoButton').removeClass('highlighted').addClass('disabled');
                    } else {
                        $('#saveButton').text('Check Availability');
                        $('#produceButton').addClass('disabled').removeClass('highlighted');
                    }
                } else if ($(this).text() === 'Produce') {
                    if (allMaterialsAvailable) {
                        if (confirm("Are you sure you want to reduce materials?")) {
                            console.log("Confirmation received, reducing materials...");

                            // Loop through the rows and add materials to the reduction list
                            $('#materialTabelBody tr').each(function() {
                                const materialId = $(this).find('input[name="material[]"]').val();
                                const consumed = parseFloat($(this).find('input[name="consumed[]"]').val());

                                if (consumed > 0) {
                                    materialsToReduce.push({
                                        MaterialId: materialId, // MaterialId from the row
                                        Qty: consumed // Qty from the Consumed field
                                    });
                                }
                            });

                            // Check if there are materials to reduce
                            if (materialsToReduce.length === 0) {
                                console.log("No materials to reduce.");
                            } else {
                                console.log("Materials to reduce:", materialsToReduce);

                                // Disable the "Produce" button and show loading state
                                $('#produceButton').addClass('disabled');

                                // Disable Check Availability button (if it exists)
                                $('#checkAvailabilityButton').prop('disabled', true);

                                Promise.all(
                                        materialsToReduce.map(material => {
                                            console.log(`Reducing material with Name ${material.MaterialName}, Qty: ${material.Qty}`);

                                            return fetch('http://localhost:3000/app/api/v1/material/reducemat', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify(material)
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    console.log("API response data:", data);
                                                    if (data.success) {
                                                        console.log(`Material ${material.MaterialName} reduced by ${material.Qty}`);
                                                    } else {
                                                        console.error(`Failed to reduce material ${material.MaterialName}. Response:`, data);
                                                    }
                                                })
                                                .catch(error => {
                                                    console.error('Error during material reduction:', error);
                                                });
                                        })
                                    )
                                    .then(() => {
                                        // After materials are reduced, call for confirmation
                                        $.ajax({
                                            url: 'http://localhost:3000/app/api/v1/mo/status/confirm',
                                            method: 'POST',
                                            contentType: 'application/json',
                                            data: JSON.stringify({
                                                id_mo: moId
                                            }),
                                            success: function(response) {
                                                if (response.meta.code === 200) {
                                                    // Update status tombol di sini
                                                    $('#saveButton').text('Produce');
                                                    $('#produceButton').removeClass('disabled').addClass('highlighted');
                                                    $('#availabilityButton').removeClass('highlighted').addClass('disabled');
                                                    Toastify({
                                                        text: "Production started",
                                                        duration: 3000,
                                                        gravity: "top",
                                                        backgroundColor: "#4CAF50"
                                                    }).showToast();
                                                }
                                            },
                                            error: function(error) {
                                                Toastify({
                                                    text: "Failed to start production",
                                                    duration: 3000,
                                                    gravity: "top",
                                                    backgroundColor: "#f44336"
                                                }).showToast();
                                            }
                                        });
                                    })
                                    .finally(() => {
                                        // Re-enable the buttons after the process is finished
                                        $('#checkAvailabilityButton').prop('disabled', false);
                                    });
                            }
                        }
                    }
                } else if ($(this).text() === 'Done') {
                    console.log("Starting process: Mark MO as Done");

                    // Mark MO as done
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/mo/status/confirm',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id_mo: moId
                        }),
                        success: function(response) {
                            console.log("MO marked as done successfully:", response);

                            // Get the ProductId and Quantity to Produce from the response or your form
                            var productId = $('#productSelect').val(); // Assume product field has the ProductId
                            var qtyToProduce = $('#quantityToProduce').val(); // Assume quantity field has the Qty

                            console.log("ProductId:", productId);
                            console.log("QtyToProduce:", qtyToProduce);

                            // Validate that ProductId and Qty are not empty
                            if (!productId || !qtyToProduce) {
                                console.error("ProductId or QtyToProduce is missing!");
                                return;
                            }

                            // Make API call to increase product quantity
                            $.ajax({
                                url: 'http://localhost:3000/app/api/v1/product/increase',
                                method: 'POST',
                                contentType: 'application/json',
                                data: JSON.stringify({
                                    ProductId: productId,
                                    Qty: parseFloat(qtyToProduce) // Ensure the quantity is a valid float
                                }),
                                success: function(increaseResponse) {
                                    console.log("Product quantity increased successfully:", increaseResponse);

                                    $('#produceButton').removeClass('highlighted').addClass('disabled');
                                    $('#doneButton').removeClass('disabled').addClass('highlighted');
                                    Toastify({
                                        text: "MO is done and product quantity updated",
                                        duration: 3000,
                                        gravity: "top",
                                        backgroundColor: "#4CAF50"
                                    }).showToast();
                                },
                                error: function(increaseError) {
                                    console.error("Error updating product quantity:", increaseError);
                                    Toastify({
                                        text: "MO done, but failed to update product quantity",
                                        duration: 3000,
                                        gravity: "top",
                                        backgroundColor: "#f44336"
                                    }).showToast();
                                }
                            });
                        },
                        error: function(error) {
                            console.error("Error marking MO as done:", error);
                            Toastify({
                                text: "Failed to mark MO as done",
                                duration: 3000,
                                gravity: "top",
                                backgroundColor: "#f44336"
                            }).showToast();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
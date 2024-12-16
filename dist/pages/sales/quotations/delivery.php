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
                            <h3>Delivery</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/mo/list-mo.php">List Quotations</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Delivery</li>
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
                                                    <button type="button" id="draftButton" class="btn btn-primary">Draft</button>
                                                    <button type="button" id="checkButton" class="btn disabled btn-primary" disabled>Check</button>
                                                    <button type="button" id="doneButton" class="btn disabled btn-primary" disabled>Done</button>
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
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row p-3">
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="vendorSelect" class="mb-2">Customer</label>
                                                    <fieldset class="form-group">
                                                        <input type="text" id="vendorSelect" class="form-control" readonly>
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
                                            <div class="table-responsive">
                                                <table class="table mt-3" id="materialTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Demand</th>
                                                            <th>Reserved</th>
                                                            <th>Done</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="materialTabelBody">
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="material[]" class="form-control" required readonly>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="demand[]" class="form-control demand" required>
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
                                                <button type="button" class="btn btn-primary me-2 mb-1" id="saveButton" data-status="draft">Check Availability</button>
                                                <a type="reset" class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/sales/quotations/list-quotation.php">Cancel</a>
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
        $.ajax({
            url: 'http://localhost:3000/app/api/v1/costumers',
            type: 'GET',
            success: function(response) {
                console.log("Vendors fetched:", response);
                const vendorSelect = $('#vendorSelect');
                response.data.forEach(function(vendor) {
                    $('#vendorSelect').val(quotationData.costumer_id);
                });
            },
            error: function(xhr, status, error) {
                console.error("Failed to fetch vendors:", error);
                alert('Failed to load vendors.');
            }
        });

        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const RfqId = urlParams.get('id'); // Get RFQ ID from URL
            const apiUrl = `http://localhost:3000/app/api/v1/quotation/overview/${RfqId}`;
            let materialQuantities = {}; // Initialize an object to store material quantities

            function calculateTotal() {
                let total = 0;
                $('input[name="subtotal[]"]').each(function() {
                    const value = parseFloat($(this).val()) || 0;
                    total += value;
                });
                // Update total display on the page
                $('h6:contains("Total:")').text(`Total: Rp. ${total.toLocaleString('id-ID')}`);
            }

            // Fetch material quantities
            function fetchMaterialQuantities(callback) {
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/product/all',
                    method: 'GET',
                    success: function(response) {
                        response.data.forEach(function(material) {
                            materialQuantities[material.Productname] = material.Qty || 0; // Store product quantities
                        });
                        callback(); // Call the callback after materials are fetched
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
            }

            // Load quotation data
            function loadQuotationData() {
                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("Quotation data fetched:", response);

                        const quotationData = response.data_bom;
                        // Fill customer ID in vendor select dropdown
                        $('#vendorSelect').val(quotationData.costumer_id);

                        // Fill order date
                        $('#order-date-column').val(quotationData.order_date.split("T")[0]);

                        // Populate the product table
                        const tableBody = $('#materialTabelBody');
                        tableBody.empty(); // Clear existing rows

                        quotationData.products.forEach(product => {
                            const availableQty = materialQuantities[product.product_name] || 0; // Get available quantity
                            const reservedQty = availableQty - product.quantity; // Calculate reserved quantity (remaining stock)
                            const newRow = `
                        <tr>
                            <td>
                                <select class="form-select" name="product[]" required>
                                    <option value="${product.product_id}" selected>${product.product_name}</option>
                                </select>
                            </td>
                            <td><input type="number" name="quantity[]" class="form-control" value="${product.quantity}" required></td>
                            <td><input type="number" name="unitPrice[]" class="form-control" value="${availableQty}" required></td>
                            <td><input type="number" name="tax[]" class="form-control" value="0" disabled></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                    <i class="bi bi-trash bi-middle"></i>
                                </button>
                            </td>
                        </tr>`;
                            tableBody.append(newRow); // Append the new row to the table
                        });

                        // Calculate total cost after loading data
                        calculateTotal();

                        // Update status if available
                        if (quotationData.status === 'Delivery') {
                            $('#statusText').text('Delivery').addClass('fs-1 text-warning fw-bold');
                        } else {
                            $('#statusText').text('Paid').addClass('fs-1 text-success fw-bold');
                        }

                        console.log("Form updated with quotation data.");
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to fetch quotation data:", error);
                        alert('Failed to load quotation data.');
                    }
                });
            }

            // Fetch material quantities and then load quotation data
            fetchMaterialQuantities(loadQuotationData);

            // Handle delete product row from the table
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                $(this).closest('tr').remove();
                calculateTotal();
            });

            // Handle adding a new product row
            $('#addMaterialButton').click(function() {
                const newRow = `
            <tr>
                <td>
                    <select class="form-select" name="product[]" required>
                        <option value="" disabled selected>- Select Product -</option> 
                    </select>
                </td>
                <td><input type="number" name="quantity[]" class="form-control" placeholder="0" required></td>
                <td><input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" required></td>
                <td><input type="number" name="tax[]" class="form-control" placeholder="11%" disabled></td>
                <td><input type="number" name="subtotal[]" class="form-control" placeholder="Rp. 0" disabled></td>
                <td><input type="number" name="reserved[]" class="form-control" placeholder="Reserved" disabled></td> <!-- Reserved column -->
                <td>
                    <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                        <i class="bi bi-trash bi-middle"></i>
                    </button>
                </td>
            </tr>`;
                $('#materialTabelBody').append(newRow);
                calculateTotal();
            });

            // Recalculate total when subtotal input changes
            $('#materialTabelBody').on('input', 'input[name="subtotal[]"]', function() {
                calculateTotal();
            });

            // Fungsi untuk menambah baris baru secara manual
            $('#addMaterialButton').click(function() {
                const newRow = `
                <tr>
                    <td>
                        <select class="form-select" name="product[]" required>
                            <option value="" disabled selected>- Select Product -</option> 
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" placeholder="0" required></td>
                    <td><input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" required></td>
                    <td><input type="number" name="tax[]" class="form-control" placeholder="11%" disabled></td>
                    <td><input type="number" name="subtotal[]" class="form-control" placeholder="Rp. 0" disabled></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                            <i class="bi bi-trash bi-middle"></i>
                        </button>
                    </td>
                </tr>`;
                $('#materialTabelBody').append(newRow);
                // Hitung ulang total setelah menambah baris
                calculateTotal();
            });
            // Hitung ulang total saat subtotal diperbarui secara manual
            $('#materialTabelBody').on('input', 'input[name="subtotal[]"]', function() {
                calculateTotal();
            });
            $(document).ready(function() {
                let clickCount = 0; // Variabel untuk melacak jumlah klik

                $('#saveButton').click(function() {
                    clickCount++; // Menambah jumlah klik setiap kali tombol diklik

                    // Cek apakah semua produk memiliki Reserved > Demand
                    let canProceed = true;
                    $('#materialTabelBody tr').each(function() {
                        const reservedQty = parseFloat($(this).find('input[name="reserved[]"]').val()) || 0;
                        const demandQty = parseFloat($(this).find('input[name="quantity[]"]').val()) || 0;

                        if (reservedQty > demandQty) { // Jika Reserved < Demand
                            canProceed = false;
                            alert("Ketersediaan produk tidak mencukupi untuk memenuhi permintaan.");
                            return false;
                        }
                    });

                    if (canProceed) {
                        if (clickCount === 1) {
                            // Klik pertama, hanya ganti status tombol ke 'check'
                            $(this).data('status', 'check');
                            $(this).text('Check'); // Ubah teks tombol menjadi 'Check'
                            $('#draftButton').prop('disabled', true); // Disable Draft button
                            $('#checkButton').prop('disabled', false).removeClass('disabled'); // Enable Check button
                            alert("Status diubah menjadi Check. Klik lagi untuk Deliver.");

                        } else if (clickCount === 2) {
                            // Klik kedua, ganti status tombol ke 'done' dan update status di database
                            $(this).data('status', 'done');
                            $(this).text('Deliver'); // Ubah teks tombol menjadi 'Deliver'

                            // Kirim permintaan ke API untuk mengubah status RFQ menjadi "Delivered"
                            const RfqId = new URLSearchParams(window.location.search).get('id'); // Ambil RFQ ID dari URL

                            $.ajax({
                                url: `http://localhost:3000/app/api/v1/quotation/status/${RfqId}`,
                                method: 'POST', // Gunakan method sesuai dengan API (POST atau PUT)
                                contentType: 'application/json',
                                data: JSON.stringify({
                                    id_rfq: RfqId,
                                    status: 'Delivered' // Status yang akan diubah menjadi 'Delivered'
                                }),
                                success: function(response) {
                                    if (response.meta.code === 200) {
                                        alert("Status berhasil diperbarui ke Delivered.");
                                        // Update UI setelah status diperbarui
                                        $('#doneButton').prop('disabled', false).addClass('highlighted');
                                        $('#checkButton').prop('disabled', true).removeClass('highlighted');
                                        $('#statusMessage').text('RFQ sudah dikonfirmasi!').addClass('fs-1 text-success fw-bold');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error("Gagal memperbarui status. Error:", error);
                                    alert("Gagal mengubah status RFQ. Silakan coba lagi.");
                                }
                            });
                        }
                    }
                });
            });



            // Event listener untuk tombol kirim email
            $('#sendEmailButton').click(function() {
                console.log("Send Email button clicked!");

                // Ambil parameter RFQ ID dari URL
                const urlParams = new URLSearchParams(window.location.search);
                const rfqId = urlParams.get('id');
                console.log("Extracted RFQ ID:", rfqId);

                // Ambil vendor ID dari dropdown
                const vendorId = $('#vendorSelect').val();
                console.log("Selected Vendor ID:", vendorId);

                // Validasi input
                if (!vendorId || !rfqId) {
                    alert("Vendor ID atau RFQ ID tidak valid!");
                    console.error("Invalid Vendor ID or RFQ ID. Vendor ID:", vendorId, "RFQ ID:", rfqId);
                    return;
                }

                // URL API untuk mengirim email
                const emailApiUrl = `http://localhost:3000/app/api/v1/rfq/email/${vendorId}?rfq_id=${rfqId}`;
                console.log("Constructed Email API URL:", emailApiUrl);

                // Memanggil API kirim email
                $.ajax({
                    url: emailApiUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("Email sent successfully. Response:", response);
                        alert("Email berhasil dikirim!");
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to send email. Status:", status, "Error:", error, "Response:", xhr.responseText);
                        alert("Gagal mengirim email. Silakan coba lagi.");
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>

</html>
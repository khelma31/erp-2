<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Order - Konate Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../assets/css/app.css">
    <link rel="shortcut icon" href="../../../assets/images/logo/2.png" type="image/png">
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
                            <h3>Sales Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/sales/quotations/list-quotation.php">List Quotations</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sales Order</li>
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
                                                    <button type="button" id="qtnButton" class="btn btn-primary" disabled>Quotation</button>
                                                    <button type="button" id="salesButton" class="btn btn-primary" disabled>Sales Order</button>
                                                </div>
                                            </div>
                                            <div class="col d-flex justify-content-end" style="padding: 30px; padding-right: 16px;">
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-primary btn-sm" href="delivery.php">
                                                        <i class="bi bi-truck bi-middle me-1"></i>
                                                        Delivery
                                                    </a>
                                                </div>
                                                <div class="buttons">
                                                    <a type="button" id="sendEmailButton" class="btn btn-outline-danger btn-sm">
                                                        <i class="bi bi-mailbox bi-middle me-1"></i>
                                                        Send by Email
                                                    </a>
                                                </div>
                                                <div class="buttons">
                                                    <a type="button" id="printPdf" class="btn btn-outline-secondary btn-sm">
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
                                    <form id="rfqForm" method="POST">
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
                                                <input type="date" id="order-date-column" name="order_date" class="form-control" required>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="order-date-column" class="form-label">Currency</label>
                                                <input type="text" id="order-date-column" name="currency" class="form-control" placeholder="IDR" disabled>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="paymentSelect" class="form-label">Payment Terms</label>
                                                <input type="text" id="paymentSelect" name="payment_terms" class="form-control" placeholder="Enter payment terms" required>
                                            </div>
                                        </div>

                                        <div class="row p-3">
                                            <div class="page-title">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                                                        <h5>Produk </h5>
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
                                                            <i class="bi bi-plus-square bi-middle me-2"></i>Add Material</button>
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
                                                <button type="submit" id="saveButton" class="btn btn-primary me-2 mb-1">Confirm</button>
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
                console.error("Failed to fetch vendors:", error);
                alert('Failed to load vendors.');
            }
        });

        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const RfqId = urlParams.get('id'); // Get vendor ID from URL
            const apiUrl = `http://localhost:3000/app/api/v1/quotation/overview/${RfqId}`;

            function calculateTotal() {
                let total = 0;
                $('input[name="subtotal[]"]').each(function() {
                    const value = parseFloat($(this).val()) || 0;
                    total += value;
                });
                // Update elemen total di halaman
                $('h6:contains("Total:")').text(`Total: Rp. ${total.toLocaleString('id-ID')}`);
            }

            function loadRFQData() {
                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("RFQ data fetched:", response);

                        const rfqData = response.data_bom;
                        console.log("RFQ Data:", rfqData); // Cek data yang diterima

                        // Mengubah status tombol berdasarkan status RFQ
                        if (rfqData.status === 'QUOTATION') {
                            // Jika status RFQ, aktifkan tombol RFQ
                            $('#qtnButton').removeAttr('disabled');
                            $('#salesButton').attr('disabled', 'disabled');
                        } else if (rfqData.status === 'Sales Order') {
                            // Jika status PO, aktifkan tombol PO
                            $('#salesButton').removeAttr('disabled');
                            $('#qtnButton').attr('disabled', 'disabled');
                            // Ubah teks tombol #saveButton
                            $('#saveButton').text('To Deliver');
                            // Tambahkan event listener untuk pindah ke halaman validate.php saat tombol ditekan
                            $('#saveButton').off('click').on('click', function() {
                                event.preventDefault(); // Cegah submit form
                                console.log("To Deliver button clicked, redirecting...");
                                window.location.replace('http://localhost:8080/erp-2/dist/pages/sales/quotations/list-sales-order.php');
                            });
                        }

                        // Mengisi dropdown customer dengan costumer_id dan costumername
                        if (rfqData.costumer_id) {
                            $('#vendorSelect').append(new Option(`${rfqData.costumer_id} - ${rfqData.costumername}`, rfqData.costumer_id));
                            $('#vendorSelect').val(rfqData.costumer_id); // Set the selected value for customer
                        }

                        // Mengisi tanggal order
                        $('#order-date-column').val(rfqData.order_date.split("T")[0]);

                        // Mengisi tabel produk
                        const tableBody = $('#materialTabelBody');
                        tableBody.empty(); // Kosongkan tabel sebelum diisi ulang

                        rfqData.products.forEach(product => {
                            const newRow = `
                        <tr>
                            <td>
                                <select class="form-select" name="product[]" required>
                                    <option value="${product.product_id}" selected>${product.product_id}</option>
                                </select>
                            </td>
                            <td><input type="number" name="quantity[]" class="form-control" value="${product.quantity}" required></td>
                            <td><input type="number" name="unitPrice[]" class="form-control" value="${product.unit_price}" required></td>
                            <td><input type="number" name="tax[]" class="form-control" value="11" disabled></td>
                            <td><input type="number" name="subtotal[]" class="form-control" value="${product.subtotal}" disabled></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm deleteMaterialButton">
                                    <i class="bi bi-trash bi-middle"></i>
                                </button>
                            </td>
                        </tr>`;
                            tableBody.append(newRow);
                        });

                        // Hitung total setelah data dimuat
                        calculateTotal();

                        // Set payment terms (this can be customized as needed)
                        const paymentSelect = $('#paymentSelect');
                        const paymentTerms = rfqData.payment_terms || "Immediate Payment"; // Set default if not provided
                        paymentSelect.val(paymentTerms); // Set selected payment term

                        console.log("Form updated with RFQ data.");
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to fetch RFQ data:", error);
                        alert('Failed to load RFQ data.');
                    }
                });
            }

            // Panggil fungsi loadRFQData saat halaman dimuat
            loadRFQData();

            // Event listener untuk tombol hapus material
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                $(this).closest('tr').remove();

                // Hitung ulang total setelah menghapus baris
                calculateTotal();
            });

            // Fungsi untuk menambah baris baru secara manual
            $('#addMaterialButton').click(function() {
                const newRow = `
            <tr>
                <td>
                    <select class="form-select" name="product[]" required>
                        <option value="" required selected>- Select Product -</option> 
                    </select>
                </td>
                <td><input type="number" name="quantity[]" class="form-control" placeholder="0" required></td>
                <td><input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" required></td>
                <td><input type="number" name="tax[]" class="form-control" placeholder="11%" required></td>
                <td><input type="number" name="subtotal[]" class="form-control" placeholder="Rp. 0" required></td>
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

            $('#saveButton').click(function() {
                const RfqId = new URLSearchParams(window.location.search).get('id'); // Get RFQ ID from URL
                const vendorId = $('#vendorSelect').val();
                const orderDate = $('#order-date-column').val();
                const paymentTerms = $('#paymentSelect').val();

                const products = [];
                $('#materialTabelBody tr').each(function() {
                    const productId = $(this).find('select[name="product[]"]').val();
                    const productName = $(this).find('select[name="product[]"] option:selected').text(); // Ambil nama produk dari dropdown
                    const quantity = parseInt($(this).find('input[name="quantity[]"]').val()) || 0;
                    const unitPrice = parseFloat($(this).find('input[name="unitPrice[]"]').val()) || 0;
                    const subtotal = parseFloat($(this).find('input[name="subtotal[]"]').val()) || 0;

                    if (productId) {
                        products.push({
                            id_product: productId,
                            productname: productName,
                            id_costumer: $('#vendorSelect').val(), // Ambil ID customer dari dropdown
                            quantity: quantity.toString(), // Pastikan nilai dikirim sebagai string
                            unitprice: unitPrice.toString(),
                            tax: "11", // Pajak tetap 11%
                            Subtotal: subtotal.toString()
                        });
                    }
                });


                const data = {
                    id_costumer: $('#vendorSelect').val(), // ID Customer dari dropdown
                    order_date: $('#order-date-column').val(), // Tanggal pesanan
                    payment: $('#paymentSelect').val(), // Metode pembayaran
                    products: products // Data produk
                };
                $.ajax({
                    url: `http://localhost:3000/app/api/v1/quotation/status/${RfqId}`, // Corrected URL template literal
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        id_quotation: RfqId // Sending RFQ ID as a parameter
                    }),
                    success: function(response) {
                        if (response.meta.code === 200) {
                            alert("Quotation berhasil dikonfirmasi!");

                            // Disable or highlight buttons after confirmation
                            $('#qtnButton').prop('disabled', false).addClass('highlighted');
                            $('#salesButton').prop('disabled', true).removeClass('highlighted');

                            // Change save button text to "To Deliver"
                            $('#saveButton').text('To Deliver');

                            // Update event listener for 'To Deliver' action
                            $('#saveButton').off('click').on('click', function(event) {
                                event.preventDefault(); // Cegah submit form
                                console.log("To Deliver button clicked, redirecting...");
                                window.location.replace('http://localhost:8080/erp-2/dist/pages/sales/quotations/list-sales-order.php');
                            });


                        } else {
                            alert("Gagal mengonfirmasi Quotation. Coba lagi.");
                        }
                    },
                    error: function(error) {
                        alert("Gagal mengonfirmasi Quotation. Silakan coba lagi.");
                        console.error("Error:", error);
                    }
                });
                if (confirm("Apakah Anda yakin ingin mengonfirmasi Quotation ini?")) {
                    $.ajax({
                        url: `http://localhost:3000/app/api/v1/quotation/${RfqId}`, // Gunakan ID RFQ dari URL
                        type: 'PUT',
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        success: function(response) {
                            if (response.meta.code === 200) {
                                alert("Quotation berhasil diperbarui!");
                                window.location.replace('list-sales-order.php');
                            } else {
                                alert("Gagal mengonfirmasi Quotation. Coba lagi.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Failed to update Quotation:", error, xhr.responseText);
                            alert('Gagal mengonfirmasi Quotation. Silakan coba lagi.');
                        }
                    });

                }
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
                const emailApiUrl = `http://localhost:3000/app/api/v1/quotation/email/${vendorId}?quotation_id=${rfqId}`;
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

            $('#printPdf').click(function() {
                const urlParams = new URLSearchParams(window.location.search);
                const rfqId = urlParams.get('id');
                // Ensure materialId is defined
                if (!RfqId) {
                    alert('RFQ ID is not defined.');
                    return;
                }

                axios({
                        url: `http://localhost:3000/app/api/v1/quotation/${RfqId}/pdf`, // Use backticks
                        method: 'GET',
                        responseType: 'blob' // Important
                    })
                    .then((response) => {
                        const url = window.URL.createObjectURL(new Blob([response.data]));
                        const link = document.createElement('a');
                        link.href = url;
                        link.setAttribute('download', `data_${RfqId}.pdf`); // Use backticks for filename
                        document.body.appendChild(link);
                        link.click();
                        link.remove();
                    })
                    .catch((error) => {
                        console.error('There was an error downloading the PDF!', error);
                        alert('Error downloading PDF.');
                    });
            });
        });
    </script>


    <script src="../../../assets/js/main.js"></script>

</body>

</html>
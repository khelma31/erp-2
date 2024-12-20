<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order - Konate Dashboard</title>

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
    <link rel="shortcut icon" href="../../../assets/images/logo/2.png" type="image/png">
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
                                                    <button type="button" id="rfqButton" class="btn btn-primary" disabled>Request for Quotation</button>
                                                    <button type="button" id="poButton" class="btn btn-primary" disabled>Purchase Order</button>
                                                </div>

                                            </div>
                                            <div class="col d-flex justify-content-end" style="padding: 30px; padding-right: 16px;">
                                                <div class="buttons">
                                                    <a id="sendEmailButton" class="btn btn-outline-danger btn-sm">
                                                        <i class="bi bi-mailbox bi-middle me-1"></i>
                                                        Send by Email
                                                    </a>
                                                </div>
                                                <div class="buttons">
                                                    <a id="printButtonPDF" class="btn btn-outline-secondary btn-sm">
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
                                                    <label for="city-column" class="mb-2">Vendor</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" id="vendorSelect">

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
                                        <div class="row p-3">
                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <table class="table table-striped" id="table1">
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

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12 mb-3" style="display: flex; justify-content: flex-end; padding-right: 169px;">
                                                <h6>Total: </h6>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end mt-5">
                                                <button type="button"
                                                    class="btn btn-primary me-2 mb-1" id="saveButton" data-status="RFQ">Confirm Order</button>
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        $.ajax({
            url: 'http://localhost:3000/app/api/v1/vendors',
            type: 'GET',
            success: function(response) {
                console.log("Vendors fetched:", response);
                const vendorSelect = $('#vendorSelect');
                response.data.forEach(function(vendor) {
                    vendorSelect.append(new Option(`${vendor.id_vendor} - ${vendor.vendorname}`, vendor.id_vendor));
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
            const apiUrl = `http://localhost:3000/app/api/v1/rfq/${RfqId}`;

            function calculateTotal() {
                let total = 0;
                $('input[name="subtotal[]"]').each(function() {
                    const value = parseFloat($(this).val()) || 0;
                    total += value;
                });
                // Update elemen total di halaman
                $('h6:contains("Total:")').text(`Total: Rp. ${total.toLocaleString('id-ID')}`);
            }
            // Fungsi untuk memuat data RFQ dari API
            function loadRFQData() {
                $.ajax({
                    url: apiUrl,
                    type: 'GET',
                    success: function(response) {
                        console.log("RFQ data fetched:", response);

                        const rfqData = response.data_bom;
                        console.log("RFQ Data:", rfqData); // Cek data yang diterima
                        // Mengubah status tombol berdasarkan status RFQ
                        if (rfqData.status === 'RFQ') {
                            // Jika status RFQ, aktifkan tombol RFQ
                            $('#rfqButton').removeAttr('disabled');
                            $('#poButton').attr('disabled', 'disabled');
                        } else if (rfqData.status === 'Purchase Order') {
                            // Jika status PO, aktifkan tombol PO
                            $('#poButton').removeAttr('disabled');
                            $('#rfqButton').attr('disabled', 'disabled');
                            // Ubah teks tombol #saveButton
                            $('#saveButton').text('To Validate');

                            // Tambahkan event listener untuk pindah ke halaman validate.php saat tombol ditekan
                            $('#saveButton').off('click').on('click', function() {
                                window.location.href = 'list-po.php';
                            });
                        }
                        // Pastikan rfqData memiliki vendor_id
                        if (rfqData && rfqData.vendor_id) {
                            $('#basicSelect').val(rfqData.vendor_id);
                        } else {
                            console.log("Vendor ID not found");
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
                const RfqId = new URLSearchParams(window.location.search).get('id'); // Ambil RFQ ID dari URL
                const products = [];

                // Ambil data produk dari tabel
                $('#materialTabelBody tr').each(function() {
                    const product = {
                        id_product: $(this).find('select[name="product[]"]').val(),
                        productname: $(this).find('select[name="product[]"] option:selected').text(),
                        quantity: $(this).find('input[name="quantity[]"]').val(),
                        unitprice: $(this).find('input[name="unitPrice[]"]').val(),
                        tax: "11%", // Anda dapat sesuaikan jika diperlukan
                        Subtotal: $(this).find('input[name="subtotal[]"]').val(),
                    };
                    products.push(product);
                });

                const payload = {
                    id_rfq: RfqId,
                    id_vendor: $('#vendorSelect').val(),
                    order_date: $('#order-date-column').val(),
                    products: products
                };

                // Request untuk update RFQ
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/rfq',
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify(payload),
                    success: function(response) {
                        alert("RFQ berhasil dikonfirmasi!");

                        // Ubah status RFQ setelah update RFQ berhasil
                        updateRfqStatus(RfqId);

                        // Tombol PO dan RFQ status
                        $('#poButton').prop('disabled', false).addClass('highlighted');
                        $('#rfqButton').prop('disabled', true).removeClass('highlighted');
                        // Ubah teks tombol #saveButton
                        $('#saveButton').text('To Validate');

                        // Tambahkan event listener untuk pindah ke halaman validate.php saat tombol ditekan
                        $('#saveButton').off('click').on('click', function() {
                            window.location.href = 'list-po.php';
                        });
                    },
                    error: function(error) {
                        alert("Gagal memperbarui RFQ. Silakan coba lagi.");
                        console.error("Error:", error);
                    }
                });
            });

            // Fungsi untuk update status RFQ
            function updateRfqStatus(RfqId) {
                const statusPayload = {
                    id_rfq: RfqId
                };

                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/rfq/status',
                    method: 'POST', // Atau POST jika API menggunakan POST
                    contentType: 'application/json',
                    data: JSON.stringify(statusPayload),
                    success: function(response) {
                        console.log("Status RFQ berhasil diperbarui:", response);
                    },
                    error: function(error) {
                        alert("Gagal memperbarui status RFQ. Silakan coba lagi.");
                        console.error("Error:", error);
                    }
                });
            }
            $('#printButtonPDF').click(function() {
                // Ensure materialId is defined
                if (!RfqId) {
                    alert('RFQ ID is not defined.');
                    return;
                }

                axios({
                        url: `http://localhost:3000/app/api/v1/rfq/${RfqId}/pdf`, // Use backticks
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


</body>

</html>
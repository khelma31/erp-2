<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manufacturing Order</title>

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
                                                    <button type="button" id="poButton" class="btn btn-primary" disabled>Purchase Order</button>
                                                    <button type="button" id="RecivedButton" class="btn btn-primary" disabled>Recived</button>
                                                    <button type="button" id="BilledButton" class="btn btn-primary" disabled>Billed</button>
                                                    <button type="button" id="DoneButton" class="btn btn-primary" disabled>Done</button>
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
                                                    <a id="exportPdfButton" class="btn btn-outline-secondary btn-sm">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col d-flex" style="padding-left: 30px;">
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-primary btn-md"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                        Validate
                                                    </a>
                                                </div>
                                                <div class="buttons">
                                                    <a type="button" class="btn btn-outline-primary btn-md" id="createBillButton" href="#">
                                                        Create Bill
                                                    </a>
                                                </div>

                                                <!-- Vertically Centered modal Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically
                                                                    Centered
                                                                </h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Do you wish to proceed with accepting this order?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="button" class="btn btn-primary ml-1" id="acceptButton" data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Accept</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
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

            // Sisipkan ID ke dalam href tombol Create Bill
            if (RfqId) {
                const createBillButton = $('#createBillButton');
                createBillButton.attr('href', `bill.php?id=${RfqId}`); // Tambahkan parameter ID ke URL
            } else {
                console.error("RFQ ID tidak ditemukan di URL");
            }

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
                        if (rfqData.status === 'Recived') {
                            // Jika status RFQ, aktifkan tombol RFQ
                            $('#RecivedButton').removeAttr('disabled');
                            $('#BilledButton').attr('disabled', 'disabled');
                        } else if (rfqData.status === 'Billed') {
                            // Jika status PO, aktifkan tombol PO
                            $('#BilledButton').removeAttr('disabled');
                            $('#RecivedButton').attr('disabled', 'disabled');
                        } else if (rfqData.status === 'Purchase Order') {
                            // Jika status PO, aktifkan tombol PO
                            $('#poButton').removeAttr('disabled');
                            $('#BilledButton').attr('disabled', 'disabled');
                            $('#RecivedButton').attr('disabled', 'disabled');
                        } else if (rfqData.status === 'Done') {
                            // Jika status PO, aktifkan tombol PO
                            $('#DoneButton').removeAttr('disabled');
                            $('#BilledButton').attr('disabled', 'disabled');
                            $('#RecivedButton').attr('disabled', 'disabled');
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
                <select class="form-select" name="product[]" disabled>
                    <option value="${product.product_id}" selected>${product.product_id}</option>
                </select>
            </td>
            <td><input type="number" name="quantity[]" class="form-control" value="${product.quantity}" disabled></td>
            <td><input type="number" name="unitPrice[]" class="form-control" value="${product.unit_price}" disabled></td>
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

            $('#acceptButton').click(function() {
                const RfqId = new URLSearchParams(window.location.search).get('id'); // Ambil RFQ ID dari URL

                // Jika pengguna memilih "OK", jalankan AJAX
                $.ajax({
                    url: 'http://localhost:3000/app/api/v1/rfq/status',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        id_rfq: RfqId
                    }),
                    success: function(response) {
                        if (response.meta.code === 200) {
                            alert("Status berhasil diubah menjadi Accepted!");

                            // Nonaktifkan tombol "Validate" dan aktifkan tombol lainnya jika perlu
                            $('#ValidateButton').prop('disabled', true).removeClass('highlighted');
                            $('#poButton').prop('disabled', false).addClass('highlighted');

                            // Lakukan tindakan lain (opsional), seperti memuat ulang halaman atau memperbarui UI
                            location.reload(); // Memuat ulang halaman untuk memperbarui status
                        }
                    },
                    error: function(error) {
                        alert("Gagal mengubah status. Silakan coba lagi.");
                        console.error("Error:", error);
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


</body>

</html>
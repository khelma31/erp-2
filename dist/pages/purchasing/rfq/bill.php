<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill - Konate Dashboard</title>

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
                            <h3>Bill</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bill</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div id="statusContainer">
                    <span id="statusText"></span> <!-- This will display "PAID" when the status is 'Done' -->
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
                                                    <button type="button" id="draftButton" class="btn btn-primary">Billed</button>
                                                    <button type="button" id="doneButton" class="btn btn-primary" disabled>Done</button>
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
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="POST">
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
                                                    <label for="last-name-column" class="mb-2">Bill Date</label>
                                                    <input type="date" id="order-date-column" name="order_date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <div class="form-group">
                                                    <label for="payment-method" class="mb-2">Payment</label>
                                                    <select id="payment-method" name="payment" class="form-control" required>
                                                        <option value="" disabled selected>Select payment method</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="transfer">Transfer</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-3">
                                            <div class="col-md-12 col-12 mb-3">
                                                <div class="form-group">
                                                    <table class="table table-striped" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>Material</th>
                                                                <th>Quantity</th>
                                                                <th>Unit Price</th>
                                                                <th>Taxes</th>
                                                                <th>Subtotal</th>
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
                                                <button type="submit" class="btn btn-primary me-1 mb-1" id="saveButton">Confirm</button>
                                                <a type="reset" class="btn btn-light-secondary mb-1" href="list-po.php" id="cancelButton">Back</a>
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
                        if (rfqData.status === 'Recived') {
                            // Jika status RFQ, aktifkan tombol RFQ
                            $('#draftButton').removeAttr('disabled');
                            $('#doneButton').attr('disabled', 'disabled');
                        } else if (rfqData.status === 'Done') {
                            // Jika status PO, aktifkan tombol PO
                            $('#doneButton').removeAttr('disabled');
                            $('#draftButton').attr('disabled', 'disabled');

                            // Menampilkan tulisan "PAID" dengan ukuran besar jika status Done
                            $('#statusText').text('PAID').addClass('fs-1 text-success fw-bold'); // Bootstrap classes for large, bold, and green text
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

            // Fungsi untuk menghapus baris tabel
            $('#materialTabelBody').on('click', '.deleteMaterialButton', function() {
                $(this).closest('tr').remove();
                // Hitung ulang total setelah menghapus baris
                calculateTotal()
            });

            // Fungsi untuk menambah baris baru secara manual
            $('#addMaterialButton').click(function() {
                const newRow = `
                <tr>
                    <td>
                        <select class="form-select" name="Material[]" disable>
                            <option value="" disabled selected>- Select Material -</option> 
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" placeholder="0" disable></td>
                    <td><input type="number" name="unitPrice[]" class="form-control" placeholder="Rp. 0" disable></td>
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

            $('#saveButton').click(function() {
                if (confirm("Apakah Anda yakin ingin mengonfirmasi Bill ini?")) {
                    const materials = [];
                    const RfqId = new URLSearchParams(window.location.search).get('id');

                    $('#materialTabelBody tr').each(function() {
                        const productId = $(this).find('select[name="product[]"]').val();
                        const quantity = $(this).find('input[name="quantity[]"]').val();
                        console.log("Material ID:", productId, "Quantity:", quantity);


                        // Validasi data sebelum push
                        if (productId && quantity) {
                            materials.push({
                                MaterialName: productId,
                                Qty: parseFloat(quantity),
                            });
                        } else {
                            console.warn("Data tidak valid untuk baris:", {
                                productId,
                                quantity,
                            });
                        }
                    });

                    console.log("Materials to update:", materials);
                    // Panggil API untuk setiap material
                    materials.forEach((material) => {
                        $.ajax({
                            url: 'http://localhost:3000/app/api/v1/material/increasemat',
                            method: 'POST',
                            contentType: 'application/json',
                            data: JSON.stringify(material),
                            success: function(materialResponse) {
                                if (materialResponse.meta.code === 200) {
                                    console.log(
                                        `Material ${material.MaterialName} berhasil diperbarui.`,
                                        materialResponse
                                    );

                                    $('#materialStatusMessage').append(
                                        `<p>Material ${material.MaterialName} berhasil ditambahkan ${material.Qty}!</p>`
                                    );
                                } else {
                                    console.error(
                                        `Gagal memperbarui material ${material.MaterialName}.`,
                                        materialResponse
                                    );
                                }
                            },
                            error: function(error) {
                                console.error(
                                    `Error saat memperbarui material ${material.MaterialName}:`,
                                    error
                                );
                                alert(`Gagal menambah material ${material.MaterialName}. Silakan coba lagi.`);
                            },
                        });
                    });
                    // Panggil API untuk mengupdate status RFQ
                    $.ajax({
                        url: 'http://localhost:3000/app/api/v1/rfq/status',
                        method: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify({
                            id_rfq: RfqId
                        }),
                        success: function(response) {
                            if (response.meta.code === 200) {
                                alert("Bill berhasil dikonfirmasi!");

                                // Update status tombol
                                $('#doneButton').prop('disabled', false).addClass('highlighted');
                                $('#draftButton').prop('disabled', true).removeClass('highlighted');

                                // Update UI
                                $('#statusMessage').text('Bill sudah dikonfirmasi!');


                            }
                        },
                        error: function(error) {
                            console.error("Gagal mengonfirmasi Bill:", error);
                            alert("Gagal mengonfirmasi Bill. Silakan coba lagi.");
                        },
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
            // Periksa apakah teks di #statusText adalah 'PAID'
            if ($('#statusText').text() === 'PAID') {
                console.log("Status: PAID. Menghilangkan tombol Confirm.");
                $('#saveButton').hide(); // Sembunyikan tombol Confirm
            }

            // Opsional: Jika teks #statusText dapat berubah, pantau dengan observer
            const observer = new MutationObserver(function(mutationsList) {
                mutationsList.forEach(function(mutation) {
                    if (mutation.target.textContent === 'PAID') {
                        console.log("Status berubah menjadi PAID. Menghilangkan tombol Confirm.");
                        $('#saveButton').hide(); // Sembunyikan tombol Confirm
                    }
                });
            });

            // Konfigurasi observer untuk memantau #statusText
            observer.observe(document.getElementById('statusText'), {
                childList: true, // Perubahan pada konten anak
                subtree: true, // Termasuk elemen di dalamnya
                characterData: true, // Perubahan teks
            });
        });
    </script>


</body>

</html>
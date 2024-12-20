<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List RFQ - Konate Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/vendors/simple-datatables/style.css">
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
                            <h3>List Request for Quotation</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Request for Quotation</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <a type="button" class="btn btn-outline-primary btn-sm me-2" href='tambah-rfq.php'>
                                        <i class="bi bi-plus-square bi-middle me-1"></i>
                                        Add
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Vendor</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="rfqTableBody">
                                    <!-- Data will be populated dynamically here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../../../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Objek untuk menyimpan data vendor
        let vendors = {};

        // Ambil data vendors dari API
        axios.get('http://localhost:3000/app/api/v1/vendors')
            .then(response => {
                const vendorData = response.data.data;

                // Simpan data vendor dalam objek untuk akses cepat
                vendorData.forEach(vendor => {
                    vendors[vendor.id_vendor] = vendor.vendorname;
                });

                // Setelah mengambil data vendor, fetch data RFQ
                fetchRfqs();
            })
            .catch(error => {
                console.error('There was an error fetching the vendors!', error);
            });

        // Fungsi untuk mengambil data RFQ dan mengisi tabel
        function fetchRfqs() {
            axios.get('http://localhost:3000/app/api/v1/rfq/all/rfq')
                .then(response => {
                    const rfqs = response.data.data;
                    const tableBody = document.getElementById('rfqTableBody');

                    rfqs.forEach(rfq => {
                        // Format the date to a more user-friendly format
                        const formattedDate = new Date(rfq.order_date).toLocaleDateString();

                        // Ambil nama vendor berdasarkan id_vendor
                        const vendorName = vendors[rfq.id_vendor] || 'Unknown Vendor'; // Default 'Unknown Vendor' jika tidak ditemukan

                        // Tentukan badge berdasarkan status
                        let statusBadge = '';
                        if (rfq.status === 'RFQ') {
                            statusBadge = '<span class="badge bg-warning">RFQ</span>';
                        } else if (rfq.status === 'Purchase Order') {
                            statusBadge = '<span class="badge bg-success">Purchase Order</span>';
                        }

                        const row = `
                        <tr>
                            <td>${rfq.id_rfq}</td>
                            <td>${rfq.id_vendor} - ${vendorName}</td> <!-- Menampilkan nama vendor -->
                            <td>${formattedDate}</td>
                            <td>${statusBadge}</td> <!-- Tampilkan badge status -->
                            <td>
                                <a type="button" class="btn btn-outline-dark btn-sm me-1" href='po.php?id=${rfq.id_rfq}'>
                                    <i class="bi bi-zoom-in bi-middle"></i>
                                </a>
                                <a type="button" class="btn btn-outline-danger btn-sm" onclick="deleteRfq('${rfq.id_rfq}')">
                                    <i class="bi bi-trash-fill bi-middle"></i>
                                </a>
                            </td>
                        </tr>
                        `;
                        tableBody.innerHTML += row;
                    });

                    // Initialize the DataTable after the table has been populated
                    let table1 = document.querySelector('#table1');
                    let dataTable = new simpleDatatables.DataTable(table1);
                })
                .catch(error => {
                    console.error('There was an error fetching the RFQs!', error);
                });
        }

        // Fungsi untuk menghapus RFQ
        function deleteRfq(rfqId) {
            if (confirm('Are you sure you want to delete this RFQ?')) {
                axios.delete(`http://localhost:3000/app/api/v1/rfq/${rfqId}`)
                    .then(response => {
                        alert('RFQ deleted successfully!');
                        location.reload(); // Reload the page to update the list
                    })
                    .catch(error => {
                        console.error('There was an error deleting the RFQ!', error);
                    });
            }
        }
    </script>


    <script src="../../../assets/js/main.js"></script>
</body>

</html>
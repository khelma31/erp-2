<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Sales Order - Konate Dashboard</title>

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
                            <h3>List Sales Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Sales Order</li>
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
                                    <a type="button" class="btn btn-outline-primary btn-sm me-2" href='tambah-quotation.php'>
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
                                        <th>Customer</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="vendorTableBody">
                                    <!-- Data will be inserted here dynamically -->
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

    <script src="../../../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Objek untuk menyimpan data customer
        let costumers = {};

        // Ambil data costumer dari API untuk memetakan id_costumer ke nama
        axios.get('http://localhost:3000/app/api/v1/costumers')
            .then(response => {
                const costumerData = response.data.data;

                // Simpan data costumer dalam objek untuk akses cepat
                costumerData.forEach(costumer => {
                    costumers[costumer.id_costumer] = costumer.costumername;
                });

                // Setelah mengambil data costumer, fetch data quotation
                fetchQuotations();
            })
            .catch(error => {
                console.error('There was an error fetching the customers!', error);
            });

        // Fungsi untuk mengambil data quotation dan mengisi tabel
        function fetchQuotations() {
            axios.get('http://localhost:3000/app/api/v1/quotation/all/bill')
                .then(response => {
                    const vendors = response.data.data;
                    const tableBody = document.getElementById('vendorTableBody');

                    vendors.forEach(vendor => {
                        // Format tanggal
                        const formattedDate = new Date(vendor.order_date).toLocaleDateString();

                        // Ambil nama customer berdasarkan id_costumer
                        const customerName = costumers[vendor.id_costumer] || 'Unknown Customer'; // Default 'Unknown Customer' jika tidak ditemukan

                        let statusBadge = '';

                        // Logika untuk menentukan badge berdasarkan status
                        if (vendor.status === 'Sales Order') {
                            statusBadge = '<span class="badge bg-secondary">Sales Order</span>';
                        } else if (vendor.status === 'Invoiced') {
                            statusBadge = '<span class="badge bg-primary">Invoiced</span>';
                        } else if (vendor.status === 'Done') {
                            statusBadge = '<span class="badge bg-success">Done</span>';
                        }

                        const row = `
    <tr>
        <td>${vendor.id_quotation}</td>
        <td>${vendor.id_costumer} - ${customerName}</td> <!-- Menampilkan ID dan nama customer -->
        <td>${formattedDate}</td>
        <td>${statusBadge}</td> <!-- Menampilkan badge berdasarkan status -->
        <td>
            <a type="button" class="btn btn-outline-success btn-sm me-1" href='validate.php?id=${vendor.id_quotation}'>
                <i class="bi bi-pencil-square bi-middle"></i>
            </a>
            <a type="button" class="btn btn-outline-danger btn-sm" onclick="deleteVendor('${vendor.id_quotation}')">
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
                    console.error('There was an error fetching the vendors!', error);
                });
        }

        // Fungsi untuk menghapus vendor
        function deleteVendor(id) {
            if (confirm(`Are you sure you want to delete costumer with ID ${id}?`)) {
                axios.delete(`http://localhost:3000/app/api/v1/quotation/${id}`)
                    .then(response => {
                        alert('Quotation deleted successfully!');
                        // Reload the page to refresh the table after deletion
                        location.reload();
                    })
                    .catch(error => {
                        console.error('There was an error deleting the quotation!', error);
                        alert('Error deleting quotation.');
                    });
            }
        }
    </script>


    <script src="../../../assets/js/main.js"></script>
</body>

</html>
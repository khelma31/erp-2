<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Manufacturing Order - Konate Dashboard</title>

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
                            <h3>List Manufacturing Order</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Manufacturing Order</li>
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
                                    <a type="button" class="btn btn-outline-primary btn-sm" href='tambah-mo.php'>
                                        <i class="bi bi-plus-square bi-middle me-2"></i>
                                        Add
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID MO</th>
                                        <th>Product ID</th>
                                        <th>BOM ID</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mo-list">
                                    <!-- Data akan diisi oleh JavaScript -->
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
        // Objek untuk menyimpan data produk
        let products = {};

        // Ambil data produk dari API untuk memetakan id_product ke nama
        axios.get('http://localhost:3000/app/api/v1/product/all')
            .then(response => {
                const productData = response.data.data;

                // Simpan data produk dalam objek untuk akses cepat
                productData.forEach(product => {
                    products[product.id_product] = product.Productname;
                });

                // Setelah mengambil data produk, fetch data manufacturing orders
                fetchManufacturingOrders();
            })
            .catch(error => {
                console.error('There was an error fetching the products!', error);
            });

        // Fetch data from the API and populate the table
        function fetchManufacturingOrders() {
            fetch('http://localhost:3000/app/api/v1/mo/all')
                .then(response => response.json()) // Parse response menjadi JSON
                .then(data => {
                    if (data.meta.code === 200 && Array.isArray(data.data)) {
                        const tableBody = document.getElementById('mo-list');
                        tableBody.innerHTML = ''; // Clear existing rows

                        data.data.forEach(order => {
                            const row = document.createElement('tr');

                            let statusBadge = '';
                            let displayStatus = order.status || '';

                            // Logika if-else untuk menentukan badge dan status
                            if (order.status === 'draft') {
                                statusBadge = '<span class="badge bg-secondary">Draft</span>';
                                displayStatus = 'Done'; // Ganti status menjadi 'Done' jika statusnya 'draft'
                            } else if (order.status === 'confirmed') {
                                statusBadge = '<span class="badge bg-primary">Confirmed</span>';
                            } else if (order.status === 'on progress') {
                                statusBadge = '<span class="badge bg-warning">On Progress</span>';
                            } else if (order.status === 'done') {
                                statusBadge = '<span class="badge bg-success">Done</span>';
                            }

                            // Ambil nama produk berdasarkan id_product
                            const productName = products[order.id_product] || 'Unknown Product';

                            row.innerHTML = `
                        <td>${order.id_mo || ''}</td>
                        <td>${order.id_product} - ${productName}</td> <!-- Menampilkan id_product dan nama produk -->
                        <td>${order.id_bom || ''}</td>
                        <td>${statusBadge}</td> <!-- Display badge based on status -->
                        <td>
                            <a type="button" class="btn btn-outline-success btn-sm me-1" href='edit-mo.php?id=${order.id_mo}'>
                                <i class="bi bi-pencil-square bi-middle"></i>
                            </a>
                            <a type="button" class="btn btn-outline-danger btn-sm me-1" onclick="deleteMo('${order.id_mo}')">
                                <i class="bi bi-trash-fill bi-middle"></i>
                            </a>
                        </td>
                    `;

                            tableBody.appendChild(row);
                        });

                        // Initialize or refresh the datatable after populating the table
                        let table1 = document.querySelector('#table1');
                        new simpleDatatables.DataTable(table1);
                    }
                })
                .catch(error => {
                    console.error('Error fetching manufacturing orders:', error);
                });
        }
        // Function to delete a Manufacturing Order (MO)
        function deleteMo(MoId) {
            if (confirm('Are you sure you want to delete this MO?')) {
                axios.delete(`http://localhost:3000/app/api/v1/mo/${MoId}`)
                    .then(response => {
                        alert('MO deleted successfully!'); // Konfirmasi penghapusan berhasil
                        fetchManufacturingOrders(); // Segarkan data setelah penghapusan
                    })
                    .catch(error => {
                        console.error('There was an error deleting the MO!', error);
                        alert('Failed to delete the MO.'); // Konfirmasi penghapusan gagal
                    });
            }
        }
    </script>

    <script src="../../../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
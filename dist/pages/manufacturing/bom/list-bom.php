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
                            <h3>List Bill of Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Bill of Material</li>
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
                                    <a type="button" class="btn btn-outline-primary btn-sm" href='tambah-bom.php'>
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
                                        <th>ID BOM</th>
                                        <th>Product Name</th>
                                        <th>Product Reference</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="bomTableBody">
                                    <!-- BOM rows will be injected here -->
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
        // Function to fetch BOM data
        function fetchBOMData() {
            const apiUrl = 'http://localhost:3000/app/api/v1/bom/all?page=1';

            axios.get(apiUrl)
                .then(response => {
                    const bomData = response.data.data;
                    const tableBody = document.getElementById('bomTableBody');
                    tableBody.innerHTML = '';

                    bomData.forEach(bom => {
                        const row = `
                            <tr>
                                <td>${bom.id_bom}</td>
                                <td>
                                    <a href="overview-bom.php?id=${bom.id_bom}">
                                        ${bom.productname}
                                    </a>
                                </td>
                                <td>${bom.productpreference}</td>
                                <td>
                                    <a type="button" class="btn btn-outline-secondary btn-sm me-1" href='overview-bom.php?id=${bom.id_bom}'>
                                        <i class="bi bi-file-earmark-easel bi-middle"></i>
                                    </a>
                                    <a type="button" class="btn btn-outline-success btn-sm me-1" href='edit-bom.php?id=${bom.id_bom}'>
                                        <i class="bi bi-pencil-square bi-middle"></i>
                                    </a>
                                    <a type="button" class="btn btn-outline-danger btn-sm" onclick="deleteBOM('${bom.id_bom}')">
                                        <i class="bi bi-trash-fill bi-middle"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });

                    // Initialize the DataTable after the table has been populated
                    new simpleDatatables.DataTable(table1);
                })
                .catch(error => {
                    console.error('There was an error fetching the BOM data!', error);
                });
        }

        // Function to delete a BOM entry
        function deleteBOM(bomId) {
            if (confirm('Are you sure you want to delete this BOM?')) {
                axios.delete(`http://localhost:3000/app/api/v1/bom/${bomId}`)
                    .then(response => {
                        alert('BOM deleted successfully!'); // Konfirmasi penghapusan berhasil
                        fetchBOMData(); // Refresh the BOM list
                    })
                    .catch(error => {
                        console.error('There was an error deleting the BOM!', error);
                        alert('Failed to delete the BOM.'); // Konfirmasi penghapusan gagal
                    });
            }
        }

        // Initial fetch
        fetchBOMData();
    </script>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>
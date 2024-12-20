<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Vendor - Konate Dashboard</title>

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
                            <h3>List Vendor</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Vendor</li>
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
                                    <a type="button" class="btn btn-outline-primary btn-sm me-2" href='tambah-vendor.php'>
                                        <i class="bi bi-plus-square bi-middle me-1"></i>
                                        Add
                                    </a>
                                    <a type="button" class="btn btn-outline-secondary btn-sm" id="exportPdfBtn">
                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                        Export as PDF
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Address</th>
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
        // Fetch vendor data from API and populate the table
        axios.get('http://localhost:3000/app/api/v1/vendors')
            .then(response => {
                const vendors = response.data.data;
                const tableBody = document.getElementById('vendorTableBody');

                vendors.forEach(vendor => {
                    const row = `
                    <tr>
                        <td>${vendor.id_vendor}</td>
                        <td>${vendor.vendorname}</td>
                        <td>${vendor.phone}</td>
                        <td>${vendor.email}</td>
                        <td>${vendor.addressone}</td>
                        <td>
                            <a type="button" class="btn btn-outline-success btn-sm me-1" href='edit-vendor.php?id=${vendor.id_vendor}'>
                                <i class="bi bi-pencil-square bi-middle"></i>
                            </a>
                            <a type="button" class="btn btn-outline-danger btn-sm" onclick="deleteVendor('${vendor.id_vendor}')">
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
        document.getElementById('exportPdfBtn').addEventListener('click', function() {
            // Send request to the API to get the PDF
            axios.get('http://localhost:3000/app/api/v1/vendor/pdf', {
                    responseType: 'blob', // Important to specify that we expect a PDF file (binary data)
                })
                .then(response => {
                    // Create a Blob from the response
                    const pdfBlob = response.data;

                    // Create an object URL for the PDF blob
                    const pdfUrl = window.URL.createObjectURL(pdfBlob);

                    // Create a link element to download the PDF
                    const link = document.createElement('a');
                    link.href = pdfUrl;
                    link.download = 'All Vendors.pdf'; // The name of the downloaded PDF file

                    // Append the link to the document body
                    document.body.appendChild(link);

                    // Trigger a click event on the link to start the download
                    link.click();

                    // Clean up the link after the download is triggered
                    document.body.removeChild(link);
                })
                .catch(error => {
                    console.error('Error downloading PDF:', error);
                    alert('There was an error generating the PDF.');
                });
        });

        // Function to delete a vendor
        function deleteVendor(id) {
            if (confirm(`Are you sure you want to delete Vendor with ID ${id}?`)) {
                axios.delete(`http://localhost:3000/app/api/v1/vendor/${id}`)
                    .then(response => {
                        alert('Vendor deleted successfully!');
                        // Reload the page to refresh the table after deletion
                        location.reload();
                    })
                    .catch(error => {
                        console.error('There was an error deleting the Vendor!', error);
                        alert('Error deleting Vendor.');
                    });
            }
        }
    </script>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>
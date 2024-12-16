<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material</title>

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
        <?php include '../../../../dist/layouts/_sidebar.php'; ?>
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
                            <h3>Overview Bill of Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/bahan/list-bahan.php">List Material</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Overview Bill of Material</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 style="text-align: right;">Product Reference</h4>
                                    <div class="col-12 d-flex justify-content-end mb-5">
                                        <a type="button" class="btn btn-outline-secondary btn-sm" id="printButtonPdf">
                                            <i class="bi bi-file-earmark bi-middle me-1"></i>
                                            Export as PDF
                                        </a>
                                    </div>
                                    <h4 style="text-align: left;">Product Reference</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row p-3">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Product Cost</th>
                                                        <th>BoM Cost</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bom-materials">
                                                    <!-- Data will be populated here -->
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="2" style="text-align: right;">Total Cost</th>
                                                        <th id="total-cost"></th>
                                                        <th id="total-bom-cost"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="col-12 d-flex justify-content-end mt-3">
                                                <a class="btn btn-outline-danger mb-1" href="../../../../dist/pages/manufacturing/bom/list-bom.php">Cancel</a>
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
    <script src="../../../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/main.js"></script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const bomId = urlParams.get('id'); // Get material ID from URL

        // Function to fetch BOM overview
        async function fetchBomOverview() {
            try {
                const response = await fetch(`http://localhost:3000/app/api/v1/bom/${bomId}/overview`);
                const result = await response.json();

                if (result.meta.code === 200) {
                    const materials = result.data.materials;
                    const productDetails = result.data.product_details;
                    const productName = result.data.product_name;

                    const bomMaterialsTable = document.getElementById('bom-materials');
                    bomMaterialsTable.innerHTML = ''; // Clear existing data

                    // Add product row with correct cost order
                    bomMaterialsTable.innerHTML += `
                    <tr>
                        <td><b>${productName} 50ml</b></td>
                        <td><b>1.00</b></td>
                        <td>Rp. ${parseFloat(productDetails.sell_price).toFixed(2)}</td> <!-- Product Cost -->
                        <td>Rp. ${parseFloat(productDetails.make_price).toFixed(2)}</td> <!-- BoM Cost -->
                    </tr>
                `;

                    materials.forEach(material => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${material.material}</td>
                        <td>${material.quantity}</td>
                        <td>Rp. ${parseFloat(material.product_cost).toFixed(2)}</td>
                        <td>Rp. ${parseFloat(material.product_cost).toFixed(2)}</td>
                    `;
                        bomMaterialsTable.appendChild(row);
                    });

                    // Set total costs
                    document.getElementById('total-cost').innerText = 'Rp. ' + parseFloat(productDetails.sell_price).toFixed(2);
                    // Remove 'Rp ' from total_cost and convert to float
                    const totalCost = parseFloat(result.data.total_cost.replace(/[^0-9.-]+/g, "")); // Strip 'Rp ' and any non-numeric characters
                    document.getElementById('total-bom-cost').innerText = 'Rp. ' + totalCost.toFixed(2);

                } else {
                    console.error('Failed to retrieve BOM overview:', result.meta.message);
                }
            } catch (error) {
                console.error('Error fetching BOM overview:', error);
            }
        }

        // Fetch BOM overview on page load
        document.addEventListener('DOMContentLoaded', fetchBomOverview);

        document.getElementById('printButtonPdf').addEventListener('click', function() {
            if (!bomId) {
                alert('Bom ID is not defined.');
                return;
            }

            axios({
                    url: `http://localhost:3000/app/api/v1/bom/${bomId}/overview/pdf`,
                    method: 'GET',
                    responseType: 'blob'
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', `overview-${bomId}.pdf`);
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                })
                .catch((error) => {
                    console.error('There was an error downloading the PDF!', error);
                    alert('Error downloading PDF.');
                });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <style>
        /* Styling kolom dan rata teks */
        #table1 th,
        #table1 td {
            text-align: left;
        }

        /* Menghilangkan border tabel */
        table {
            width: 100%;
            border-collapse: separate;
            /* Tidak menggabungkan border */
            border: none;
            /* Menghilangkan border keseluruhan */
        }

        /* Mengatur th dan td tanpa border */
        th,
        td {
            border: none;
            padding: 8px;
        }

        #table1 th:nth-child(1),
        #table1 td:nth-child(1) {
            /* Mengatur lebar kolom */
            width: 40%;
            /* Kolom Product lebih lebar */
        }

        #table1 th:nth-child(n+2),
        #table1 td:nth-child(n+2) {
            text-align: right;
            /* Kolom selain Product rata kanan */
            width: 20%;
        }

        /* Menambahkan indentasi untuk baris tertentu */
        .indent td:first-child {
            padding-left: 50px;
            /* Indentasi lebih dalam */
        }
    </style>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Product</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="shortcut icon" href="../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?php include '../../dist/layouts/_sidebar.php'; ?>
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
                            <h3>List Product</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../../dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List Product</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex justify-content-start">
                                    <label for="">Show Product Variants</label>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <a type="button" class="btn btn-outline-primary btn-sm me-2" href='tambah-produk.php'>
                                        <i class="bi bi-plus-square bi-middle me-1"></i>
                                        Add
                                    </a>
                                    <a type="button" class="btn btn-outline-secondary btn-sm" id="printButton">
                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                        Export as PDF
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-start">
                                    <input class="form-check-input me-1" type="radio" name="showVariants" id="flexRadioDefault1" value="yes">
                                    <label class="form-check-label me-2" for="flexRadioDefault1">
                                        Yes
                                    </label>
                                    <input class="form-check-input me-1" type="radio" name="showVariants" id="flexRadioDefault2" value="no" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productTableBody">
                                    <!-- Product rows will be injected here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Function to fetch data based on selected radio button
        function fetchProducts() {
            const showVariants = document.querySelector('input[name="showVariants"]:checked').value;
            const apiUrl = showVariants === "yes" ? 
                'http://localhost:3000/app/api/v1/product/variants/all?page=1' :
                'http://localhost:3000/app/api/v1/product/all?page=1';

            axios.get(apiUrl)
                .then(response => {
                    const products = response.data.data; // Assuming response.data.data contains product array
                    const tableBody = document.getElementById('productTableBody');
                    const imageBaseUrl = 'http://localhost:3000'; // Base URL of your server
                    tableBody.innerHTML = ''; // Clear previous rows

                    products.forEach(product => {
                        const imageUrl = `${imageBaseUrl}${product.Image}`;
                        const row = `
                            <tr>
                                <td>${product.id_product}</td>
                                <td>${product.Productname}</td>
                                <td>${product.Productcategory}</td>
                                <td><img src="${imageUrl}" alt="${product.Productname}" style="width: 100px; height: auto;"></td>
                                <td>
                                    <a type="button" class="btn btn-outline-success btn-sm me-1" href='edit-produk.php?id=${product.id_product}'>
                                        <i class="bi bi-pencil-square bi-middle"></i>
                                    </a>
                                    <a type="button" class="btn btn-outline-danger btn-sm" onclick="deleteProduct('${product.id_product}')">
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
                    console.error('There was an error fetching the products!', error);
                });
        }

        // Function to delete a product
        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                axios.delete(`http://localhost:3000/app/api/v1/products/${productId}`)
                    .then(response => {
                        alert('Product deleted successfully!');
                        fetchProducts(); // Refresh the product list
                    })
                    .catch(error => {
                        console.error('There was an error deleting the product!', error);
                        alert('Failed to delete the product.');
                    });
            }
        }

        // Event listener for radio button changes
        document.querySelectorAll('input[name="showVariants"]').forEach((elem) => {
            elem.addEventListener("change", fetchProducts);
        });

        // Initial fetch
        fetchProducts();

        document.getElementById('printButton').addEventListener('click', function() {
            axios({
                    url: 'http://localhost:3000/app/api/v1/product/pdf',
                    method: 'GET',
                    responseType: 'blob' // Important
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', 'products.pdf'); // or any other name
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

    <script src="../assets/js/main.js"></script>
</body>

</html>

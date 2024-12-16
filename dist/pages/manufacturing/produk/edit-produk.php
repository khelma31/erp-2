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
                            <h3>Edit Product</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/produk/list-produk.php">List Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                                    <div class="card-body">
                                        <form id="editProductForm" class="form">
                                            <div class="row p-3">
                                                <div class="col-12 d-flex justify-content-end mb-4">
                                                    <a type="button" class="btn btn-outline-dark btn-sm me-2" id="printButtonBarcode">
                                                        <i class="bi bi-upc-scan bi-middle me-1"></i>
                                                        Barcode
                                                    </a>
                                                    <a type="button" class="btn btn-outline-secondary btn-sm" id="printButtonPdf">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>
                                                <!-- Name Field -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="name" class="mb-2">Name</label>
                                                        <input type="text" id="name" class="form-control" name="name">
                                                    </div>
                                                </div>

                                                <!-- Product Category -->
                                                <div class="col-md-3 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="category" class="mb-2">Product Category</label>
                                                        <select class="form-select" id="category">
                                                            <option value="" disabled selected>- Choose Category -</option>
                                                            <option>Minyak Esensial</option>
                                                            <!-- Add more categories as needed -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Variant -->
                                                <div class="col-md-3 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="mb-2">Is this product a variant?</label>
                                                        <!-- <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="variant" id="variantYes" value="yes">
                                                            <label class="form-check-label" for="variantYes">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="variant" id="variantNo" value="no">
                                                            <label class="form-check-label" for="variantNo">No</label>
                                                        </div> -->
                                                    </div>
                                                    <div class="form-group">
                                                        
                                                            <input class="form-check-input" type="radio" name="variant" id="variantYes" value="yes">
                                                            <label class="form-check-label" for="variantYes">Yes</label>
                                                        
                                                        
                                                            <input class="form-check-input" type="radio" name="variant" id="variantNo" value="no">
                                                            <label class="form-check-label" for="variantNo">No</label>
                                                        
                                                    </div>
                                                </div>

                                                <!-- Sales Price -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="sellPrice" class="mb-2">Sales Price</label>
                                                        otal Price (Incl. Taxes): <span id="finalSellPriceDisplay">Rp 0,00</span>
                                                        <input type="number" id="sellPrice" class="form-control" name="sellPrice" placeholder="Rp.">
                                                    </div>
                                                </div>

                                                <!-- Cost -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">

                                                        <label for="cost" class="mb-2">Cost</label>
                                                        <input type="number" id="cost" class="form-control" name="cost" placeholder="Rp.">
                                                    </div>
                                                </div>

                                                <!-- Tax -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="tax" class="mb-2">Tax</label>
                                                        <input type="number" id="tax" class="form-control" name="tax" placeholder="11%" disabled>
                                                    </div>
                                                </div>

                                                <!-- Image -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="image" class="mb-2"> Image</label>
                                                        <img id="imagePreview" style="display:none; width: 300px; " alt="Product Image">
                                                    </div>
                                                </div>

                                                <!-- Description -->
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="description" class="mb-2">Description</label>
                                                        <textarea class="form-control" id="description" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Submit and Cancel -->
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-primary me-2 mb-1">Save</button>
                                                    <a href="/../../../../erp-2/dist/pages/manufacturing/produk/list-produk.php" class="btn btn-light-secondary mb-1">Cancel</a>
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



    <script>
        let productId; // Declare productId in a broader scope

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            productId = urlParams.get('id'); // Assign the product ID from URL

            document.getElementById('sellPrice').addEventListener('input', calculateFinalSellPrice);
            document.getElementById('tax').addEventListener('input', calculateFinalSellPrice);

            function calculateFinalSellPrice() {
                const sellPrice = parseFloat(document.getElementById('sellPrice').value) || 0;
                const taxRate = parseFloat(document.getElementById('tax').value) / 100 || 0;

                const finalSellPrice = sellPrice * (1 + taxRate);
                document.getElementById('finalSellPriceDisplay').textContent = `Rp ${finalSellPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`;
            }

            if (productId) {
                // Fetch product details
                axios.get(`http://localhost:3000/app/api/v1/product/${productId}`)
                    .then(response => {
                        const product = response.data.data;

                        // Populate form fields with product data
                        document.getElementById('name').value = product.Productname || '';
                        document.getElementById('category').value = product.Productcategory || '';
                        document.getElementById('sellPrice').value = product.Sellprice || '';
                        document.getElementById('cost').value = product.Makeprice || '';
                        document.getElementById('description').value = product.Description || '';

                        // Handle variant radio buttons
                        if (product.Variant === 'yes') {
                            document.getElementById('variantYes').checked = true;
                        } else {
                            document.getElementById('variantNo').checked = true;
                        }

                        // Display image if available
                        if (product.Image) {
                            const imagePreview = document.getElementById('imagePreview');
                            imagePreview.src = `http://localhost:3000${product.Image}`;
                            imagePreview.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('There was an error fetching the product!', error);
                    });
            }
        });

        // Handle form submission
        document.getElementById('editProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            axios.put(`http://localhost:3000/app/api/v1/product/${productId}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    alert('Product updated successfully!');
                    window.location.href = '../../dist/pages/list-produk.php';
                })
                .catch(error => {
                    console.error('There was an error updating the product!', error);
                });
        });

        document.getElementById('printButtonBarcode').addEventListener('click', function() {
            if (!productId) {
                alert('Product ID is not defined.');
                return;
            }

            axios({
                    url: `http://localhost:3000/app/api/v1/product/${productId}/barcode`,
                    method: 'GET',
                    responseType: 'blob'
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', `barcode_${productId}.png`);
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                })
                .catch((error) => {
                    console.error('There was an error downloading the PDF!', error);
                    alert('Error downloading PDF.');
                });
        });

        document.getElementById('printButtonPdf').addEventListener('click', function() {
            if (!productId) {
                alert('Product ID is not defined.');
                return;
            }

            axios({
                    url: `http://localhost:3000/app/api/v1/product/${productId}/pdf`,
                    method: 'GET',
                    responseType: 'blob'
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', `data${productId}.pdf`);
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

    <script src="../../../assets/js/main.js"></script>
</body>

</html>
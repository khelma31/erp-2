<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - Konate Dashboard</title>

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
                            <h3>Add Product</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/produk/list-produk.php">List Product</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
                                        <form class="form" id="productForm" enctype="multipart/form-data">
                                            <div class="row p-3">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="product-name" class="mb-2">Name</label>
                                                        <input type="text" id="productname" class="form-control" name="productname" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="product-category" class="mb-2">Product Category</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="productcategory" name="productcategory" required>
                                                                <option value="" disabled selected>- Choose Category -</option>
                                                                <option value="Cairan">Cairan</option>
                                                                <option value="Minyak Esensial">Minyak Esensial</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="variant" class="mb-2">Is this product a variant?</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-check-input me-1" type="radio" name="variant" value="yes">Yes
                                                        <input class="form-check-input me-1" type="radio" name="variant" value="no" checked>No
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="sell-price" class="mb-2">Sales Price</label>
                                                        Total Price (Incl. Taxes): <span id="finalSellPriceDisplay">Rp 0,00</span>

                                                        <input type="number" id="sellprice" class="form-control" name="sellprice" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="make-price" class="mb-2">Cost</label>
                                                        <input type="number" id="makeprice" class="form-control" name="makeprice" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="tax" class="mb-2">Tax</label>
                                                        <select class="form-select" id="pajak" name="pajak" required>
                                                            <option value="" disabled selected>- Choose Category -</option>
                                                            <option value="11">11</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="image" class="mb-2">Add Image</label>
                                                        <input type="file" class="form-control" id="image" name="image">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="description" class="mb-2">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-primary me-2 mb-1">Save</button>
                                                    <a type="reset" class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/manufacturing/produk/list-produk.php">Cancel</a>
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // Listener untuk sell price input
        document.getElementById('sellprice').addEventListener('input', function() {
            const sellPrice = parseFloat(this.value) || 0;
            const taxRate = 0.11; // 11%
            const finalSellPrice = sellPrice * (1 + taxRate);

            // Tampilkan sell price akhir dalam format mata uang
            document.getElementById('finalSellPriceDisplay').textContent = formatCurrency(finalSellPrice);
        });

        document.getElementById('pajak').addEventListener('change', updateSellPriceWithTax);

        function updateSellPriceWithTax() {
            const sellPrice = parseFloat(document.getElementById('sellprice').value) || 0;
            const taxRate = parseFloat(document.getElementById('pajak').value) / 100; // Ambil nilai pajak dari dropdown dan konversi ke desimal

            // Hitung nilai sell price
            const finalSellPrice = sellPrice * (1 + taxRate); // Sell price = Sell price * (1 + tax rate)

            // Tampilkan hasil dalam format mata uang
            document.getElementById('finalSellPriceDisplay').textContent = formatCurrency(finalSellPrice);
        }

        // Fungsi untuk format mata uang
        function formatCurrency(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(value);
        }

        // Listener untuk submit form
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this); // Collect all form data

            axios.post('http://localhost:3000/app/api/v1/products', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    console.log('Success:', response.data);
                    alert(response.data.meta.message); // Show success message
                    window.location.href = '../../manufacturing/produk/list-produk.php'; // Redirect to list product page
                })
                .catch(error => {
                    console.error('There was an error!', error);
                    alert('There was an error adding the product.');
                });
        });
    </script>
</body>

</html>
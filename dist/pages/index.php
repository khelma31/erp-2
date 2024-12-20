<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php include '../../dist/layouts/_header.php'; ?>
<!-- Header -->

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
                <h3>Admin Dashboard</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-basket2-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Material</h6>
                                                <h6 class="font-extrabold mb-0" id="materialCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-basket2-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Product</h6>
                                                <h6 class="font-extrabold mb-0" id="productCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-file-earmark-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Bill of Material</h6>
                                                <h6 class="font-extrabold mb-0" id="BomCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-inboxes-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Manufacturing Order</h6>
                                                <h6 class="font-extrabold mb-0" id="MoCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-house-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Vendor</h6>
                                                <h6 class="font-extrabold mb-0" id="VendorCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-receipt"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">RFQ</h6>
                                                <h6 class="font-extrabold mb-0" id="RfqCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-receipt"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Purchase Order</h6>
                                                <h6 class="font-extrabold mb-0" id="RfqPoCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-people-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Customers</h6>
                                                <h6 class="font-extrabold mb-0" id="CustomerCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-wallet-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Quotations</h6>
                                                <h6 class="font-extrabold mb-0" id="QuoCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                <div class="stats-icon">
                                                    <i>
                                                        <a class="bi-calculator-fill"></a>
                                                    </i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Sales Order</h6>
                                                <h6 class="font-extrabold mb-0" id="SoCount">Loading...</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="../assets/js/pages/dashboard.js"></script>

    <script src="../assets/js/main.js"></script>


    <script>
        // Fungsi untuk mengambil data dari API dan menghitung jumlah data
        async function fetchMaterialCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/material/all');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const materialCount = data.data.length; // Menghitung jumlah material
                    document.getElementById('materialCount').innerText = materialCount; // Menampilkan jumlah
                } else {
                    document.getElementById('materialCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching material data:', error);
                document.getElementById('materialCount').innerText = 'Error loading data';
            }
        }

        async function fetchProductCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/product/all');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const productCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('productCount').innerText = productCount; // Menampilkan jumlah
                } else {
                    document.getElementById('productCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('productCount').innerText = 'Error loading data';
            }
        }

        async function fetchBomCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/bom/all');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const BomCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('BomCount').innerText = BomCount; // Menampilkan jumlah
                } else {
                    document.getElementById('BomCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('BomCount').innerText = 'Error loading data';
            }
        }

        async function fetchMoCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/mo/all');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const MoCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('MoCount').innerText = MoCount; // Menampilkan jumlah
                } else {
                    document.getElementById('MoCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('MoCount').innerText = 'Error loading data';
            }
        }

        async function fetchVendorCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/vendors');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const VendorCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('VendorCount').innerText = VendorCount; // Menampilkan jumlah
                } else {
                    document.getElementById('VendorCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('VendorCount').innerText = 'Error loading data';
            }
        }

        async function fetchRfqCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/rfq/all/rfq');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const RfqCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('RfqCount').innerText = RfqCount; // Menampilkan jumlah
                } else {
                    document.getElementById('RfqCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('RfqCount').innerText = 'Error loading data';
            }
        }

        async function fetchRfqPoCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/rfq/all/bill');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const RfqPoCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('RfqPoCount').innerText = RfqPoCount; // Menampilkan jumlah
                } else {
                    document.getElementById('RfqPoCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('RfqPoCount').innerText = 'Error loading data';
            }
        }

        async function fetchCustomerCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/costumers');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const CustomerCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('CustomerCount').innerText = CustomerCount; // Menampilkan jumlah
                } else {
                    document.getElementById('CustomerCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('CustomerCount').innerText = 'Error loading data';
            }
        }

        async function fetchQuoCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/quotation/all/quo');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const QuoCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('QuoCount').innerText = QuoCount; // Menampilkan jumlah
                } else {
                    document.getElementById('QuoCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('QuoCount').innerText = 'Error loading data';
            }
        }

        async function fetchSoCount() {
            try {
                const response = await fetch('http://localhost:3000/app/api/v1/quotation/all/bill');
                const data = await response.json();

                // Mengecek apakah data ada dan memiliki array "data"
                if (data.meta.code === 200 && Array.isArray(data.data)) {
                    const SoCount = data.data.length; // Menghitung jumlah produk
                    document.getElementById('SoCount').innerText = SoCount; // Menampilkan jumlah
                } else {
                    document.getElementById('SoCount').innerText = 'Error: Invalid data';
                }
            } catch (error) {
                console.error('Error fetching product data:', error);
                document.getElementById('SoCount').innerText = 'Error loading data';
            }
        }
        // Panggil kedua fungsi saat halaman dimuat
        window.onload = async function() {
            await Promise.all([fetchMaterialCount(), fetchMoCount(), fetchVendorCount(), fetchRfqCount(),
             fetchBomCount(),fetchProductCount(), fetchRfqPoCount(), fetchCustomerCount(), 
              fetchQuoCount(), fetchSoCount()]); // Menjalankan kedua fungsi secara bersamaan
        };
    </script>

</body>

</html>
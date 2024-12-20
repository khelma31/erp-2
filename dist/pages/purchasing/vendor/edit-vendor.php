<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vendor - Konate Dashboard</title>

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
                            <h3>Edit Vendor</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/purchasing/vendor/list-vendor.php">List Vendor</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Vendor</li>
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
                                        <form class="form" id="editVendorForm">
                                            <div class="row p-3">
                                                <div class="col-12 d-flex justify-content-end mb-4">
                                                    <a type="button" class="btn btn-outline-secondary btn-sm" id="btnPdf">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="first-name-column" class="mb-2">Name</label>
                                                        <input type="text" id="name" class="form-control" name="fname-column">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <div class="col d-flex justify-content-start mb-3">
                                                            <label for="">Individual or company?</label>
                                                        </div>
                                                        <input class="form-check-input me-1" type="radio" name="flexRadioDefault" id="individual" value="individual">
                                                        <label class="form-check-label me-2" for="flexRadioDefault1">Individual</label>
                                                        <input class="form-check-input me-1" type="radio" name="flexRadioDefault" id="company" value="company" checked>
                                                        <label class="form-check-label" for="flexRadioDefault1">Company</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="address" class="mb-2">Address</label>
                                                        <input type="text" id="address" class="form-control mb-3" name="address" placeholder="Street...">
                                                        <input type="text" id="address2" class="form-control mb-3" name="address2" placeholder="Street 2...">
                                                        <div class="input-group mb-3" role="group">
                                                            <input type="text" id="city" class="form-control" name="city" placeholder="City">
                                                            <input type="text" id="state" class="form-control" name="state" placeholder="State">
                                                            <input type="text" id="zip" class="form-control" name="zip" placeholder="ZIP">
                                                        </div>
                                                        <input type="text" id="country" class="form-control mb-3" name="country" placeholder="Country">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="phone" class="mb-2">Phone</label>
                                                        <input type="text" id="phone" class="form-control" name="phone" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="mb-2">Email</label>
                                                        <input type="text" id="email" class="form-control" name="email" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="website" class="mb-2">Website</label>
                                                        <input type="text" id="website" class="form-control" name="website" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-primary me-2 mb-1">Save</button>
                                                    <a type="reset" class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/purchasing/vendor/list-vendor.php">Cancel</a>
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
        const urlParams = new URLSearchParams(window.location.search);
        const vendorId = urlParams.get('id'); // Get vendor ID from URL

        // Fetch the vendor data and populate the form
        if (vendorId) {
            axios.get(`http://localhost:3000/app/api/v1/vendor/${vendorId}`)
                .then(response => {
                    const vendor = response.data.data;

                    // Populate form fields with existing vendor data
                    document.getElementById('name').value = vendor.vendorname || ''; // vendorname -> name
                    document.getElementById('address').value = vendor.addressone || ''; // addressone -> address
                    document.getElementById('address2').value = vendor.addresstwo || ''; // addresstwo -> address2
                    document.getElementById('city').value = vendor.city || '';
                    document.getElementById('state').value = vendor.state || '';
                    document.getElementById('zip').value = vendor.zip || '';
                    document.getElementById('country').value = vendor.country || '';
                    document.getElementById('phone').value = vendor.phone || '';
                    document.getElementById('email').value = vendor.email || '';
                    document.getElementById('website').value = vendor.website || '';

                    // Handle the vendor type radio buttons (status -> vendorType)
                    if (vendor.status === 'individual') {
                        document.getElementById('individual').checked = true;
                    } else if (vendor.status === 'company') {
                        document.getElementById('company').checked = true;
                    }
                })
                .catch(error => {
                    console.error('There was an error fetching the vendor!', error);
                });
        }

        // Handle the form submission for updating the vendor
        document.getElementById('editVendorForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form values
            const vendorData = {
                Vendorname: document.getElementById('name').value,
                Addressone: document.getElementById('address').value,
                Addresstwo: document.getElementById('address2').value,
                Zip: document.getElementById('zip').value,
                Country: document.getElementById('country').value,
                State: document.getElementById('state').value,
                City: document.getElementById('city').value,
                Phone: document.getElementById('phone').value,
                Email: document.getElementById('email').value,
                Website: document.getElementById('website').value,
                Status: document.querySelector('input[name="vendorType"]:checked').value
            };

            // Send PUT request to update vendor
            axios.put(`http://localhost:3000/app/api/v1/vendor/${vendorId}`, vendorData)
                .then(response => {
                    alert('Vendor updated successfully!');
                    window.location.href = '/../../../../erp-2/dist/pages/purchasing/vendor/list-vendor.php';
                })
                .catch(error => {
                    console.error('There was an error updating the vendor!', error);
                });
        });

        document.getElementById('btnPdf').addEventListener('click', function() {
            if (vendorId) {
                window.open(`http://localhost:3000/app/api/v1/vendor/${vendorId}/pdf`, '_blank');
            } else {
                alert('Vendor ID is missing!');
            }
        });
    </script>
</body>

</html>
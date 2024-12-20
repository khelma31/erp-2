<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vendor - Konate Dashboard</title>

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
                            <h3>Add Vendor</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/purchasing/vendor/list-vendor.php">List Vendor</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Vendor</li>
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
                                        <form class="form" id="vendorForm">
                                            <div class="row p-3">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="city-column" class="mb-2">Name</label>
                                                        <input type="text" id="vendor-name" class="form-control" name="fname-column" required>
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
                                                        <label for="country-floating" class="mb-2">Address</label>
                                                        <input type="text" id="address1" class="form-control mb-3" name="Addressone" placeholder="Street..." required>
                                                        <input type="text" id="address2" class="form-control mb-3" name="Addresstwo" placeholder="Street 2..." >
                                                        <div class="input-group mb-3" role="group">
                                                            <input type="text" id="city" class="form-control" name="city" placeholder="City" required>
                                                            <input type="text" id="state" class="form-control" name="state" placeholder="State" required>
                                                            <input type="text" id="zip" class="form-control" name="zip" placeholder="ZIP" required>
                                                        </div>
                                                        <input type="text" id="country" class="form-control mb-3" name="country-floating" placeholder="Country" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="phone" class="mb-2">Phone</label>
                                                        <input type="text" id="phone" class="form-control" name="Phone" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="mb-2">Email</label>
                                                        <input type="email" id="email" class="form-control" name="Email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="website" class="mb-2">Website</label>
                                                        <input type="text" id="website" class="form-control" name="website" >
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../../../assets/js/main.js"></script>

    <script>
        document.getElementById("vendorForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Create an object to hold form data
            const formData = {
                Vendorname: document.getElementById("vendor-name").value,
                Addressone: document.getElementById("address1").value,
                Addresstwo: document.getElementById("address2").value,
                Phone: document.getElementById("phone").value,
                Email: document.getElementById("email").value,
                website: document.getElementById("website").value,
                City: document.getElementById("city").value,
                State: document.getElementById("state").value,
                Zip: document.getElementById("zip").value,
                Country: document.getElementById("country").value,
                status: document.querySelector('input[name="flexRadioDefault"]:checked').value // Get selected radio button value
            };

            // Send data to the server using Fetch API
            fetch("http://localhost:3000/app/api/v1/vendor", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(formData), // Send form data as JSON
                })
                .then(response => {
                    return response.json(); // Parse JSON response
                })
                .then(data => {
                    // Handle success or error
                    if (data.success) {
                        alert("Vendor added successfully!");
                        document.getElementById("vendorForm").reset(); // Reset the form
                        window.location.href = "http://localhost:8080/erp-2/dist/pages/purchasing/vendor/list-vendor.php"; // Redirect to list vendor page
                    } else {
                        window.location.href = "http://localhost:8080/erp-2/dist/pages/purchasing/vendor/list-vendor.php";
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    alert("Failed to send data.");
                });
        });
    </script>

</body>

</html>

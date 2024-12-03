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
                            <h3>Add Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/bahan/list-bahan.php">List Material</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Material</li>
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
                                        <form id="materialForm" class="form">
                                            <div class="row p-3">
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="name" class="mb-2">Name</label>
                                                        <input type="text" id="name" class="form-control" name="materialname" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="category" class="mb-2">Material Category</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="category" name="materialcategory" required>
                                                                <option value="" disabled selected>- Choose Category -</option>
                                                                <option>Minyak Esensial</option>
                                                                <option>Pelarut</option>
                                                                <option>Aditif Aroma</option>
                                                                <option>Kemasan</option>
                                                                <option>Label dan Aksesori</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="sellprice" class="mb-2">Sales Price</label>
                                                        <input type="text" id="sellprice" class="form-control" name="sellprice" placeholder="Rp." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="cost" class="mb-2">Cost</label>
                                                        <input type="text" id="cost" class="form-control" name="makeprice" placeholder="Rp." required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="unit" class="mb-2">Unit</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="unit" name="unit" required>
                                                                <option value="" disabled selected>- Choose Unit -</option>
                                                                <option>g</option>
                                                                <option>L</option>
                                                                <option>pcs</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="inputGroupFile01" class="mb-2">Add Image</label>
                                                        <input type="file" class="form-control" id="inputGroupFile01" name="image" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="description" class="mb-2">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit"
                                                        class="btn btn-primary me-2 mb-1">Save</button>
                                                    <a type="reset"
                                                        class="btn btn-light-secondary mb-1" href="/../../../../erp-2/dist/pages/manufacturing/bahan/list-bahan.php">Cancel</a>
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
    <script src="../../../assets/vendors/simple-datatables/simple-datatables.js"></script>

    <script>
        document.getElementById('materialForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const formData = new FormData(this); // Collect all form data

            axios.post('http://localhost:3000/app/api/v1/materials', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    console.log('Success:', response.data);
                    alert(response.data.meta.message); // Show success message
                    // Optionally redirect to the list page or reset the form
                    window.location.href = '../../dist/pages/list-bahan.php';
                })
                .catch(error => {
                    console.error('There was an error!', error);
                    alert('There was an error adding the material.');
                });
        });
    </script>

    <script src="../../../assets/js/main.js"></script>
</body>

</html>
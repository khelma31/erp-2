<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Material - Konate Dashboard</title>

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
    <link rel="shortcut icon" href="../../../assets/images/logo/2.png" type="image/png">
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
                            <h3>Edit Material</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/../../../../../erp-2/dist/pages/index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="/../../../../erp-2/dist/pages/manufacturing/bahan/list-bahan.php">List Material</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Material</li>
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
                                        <form class="form" id="editMaterialForm">
                                            <div class="row p-3">
                                                <!-- Buttons for Barcode and PDF Export -->
                                                <div class="col-12 d-flex justify-content-end mb-3">
                                                    <a type="button" class="btn btn-outline-secondary btn-sm me-2" id="printButtonBarcode">
                                                        <i class="bi bi-upc-scan bi-middle me-1"></i>
                                                        Barcode
                                                    </a>
                                                    <a type="button" class="btn btn-outline-secondary btn-sm" id="printButtonPDF">
                                                        <i class="bi bi-file-earmark bi-middle me-1"></i>
                                                        Export as PDF
                                                    </a>
                                                </div>

                                                <!-- Material Name Field -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="name" class="mb-2">Name</label>
                                                        <input type="text" id="name" class="form-control" name="materialname" required>
                                                    </div>
                                                </div>

                                                <!-- Material Category Field -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="category" class="mb-2">Material Category</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="category" name="materialcategory" required>
                                                                <option value="" disabled selected>- Choose Category -</option>
                                                                <option value="Minyak Esensial">Minyak Esensial</option>
                                                                <option value="Pelarut">Pelarut</option>
                                                                <option value="Aditif Aroma">Aditif Aroma</option>
                                                                <option value="Kemasan">Kemasan</option>
                                                                <option value="Label dan Aksesori">Label dan Aksesori</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <!-- Sales Price Field -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="sellPrice" class="mb-2">Sales Price</label>
                                                        <input type="text" id="sellPrice" class="form-control" name="sellprice" placeholder="Rp." required>
                                                    </div>
                                                </div>

                                                <!-- Cost Field -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="cost" class="mb-2">Cost</label>
                                                        <input type="text" id="cost" class="form-control" name="makeprice" placeholder="Rp." required>
                                                    </div>
                                                </div>

                                                <!-- Unit Field -->
                                                <div class="col-md-6 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="unit" class="mb-2">Unit</label>
                                                        <fieldset class="form-group">
                                                            <select class="form-select" id="unit" name="unit" required>
                                                                <option value="" disabled selected>- Choose Unit -</option>
                                                                <option value="g">g</option>
                                                                <option value="L">L</option>
                                                                <option value="pcs">pcs</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                </div>

                                                <!-- Image Upload Field -->
                                                <div class="col-md-6 col-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="image" class="mb-2">Image</label>
                                                        <img id="imagePreview" style="display: none; width: 150px;" alt="Image Preview">
                                                    </div>
                                                </div>

                                                <!-- Description Field -->
                                                <div class="col-md-12 col-12 mb-3">
                                                    <div class="form-group">
                                                        <label for="description" class="mb-2">Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Save and Cancel Buttons -->
                                                <div class="col-12 d-flex justify-content-end mt-3">
                                                    <button type="submit" class="btn btn-primary me-2 mb-1">Save</button>
                                                    <a type="reset" class="btn btn-light-secondary mb-1" href="../../../../dist/pages/Manufacturing/Bahan/list-bahan.php">Cancel</a>
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
        const urlParams = new URLSearchParams(window.location.search);
        const materialId = urlParams.get('id'); // Get material ID from URL

        // Fetch existing material details from API
        // Fetch existing material details from API
        if (materialId) {
            axios.get(`http://localhost:3000/app/api/v1/material/${materialId}`)
                .then(response => {
                    const material = response.data.data;

                    // Base URL for images
                    const imageBaseUrl = 'http://localhost:3000';

                    // Populate form fields with existing data
                    document.getElementById('name').value = material.Materialname || '';
                    document.getElementById('category').value = material.Materialcategory || '';
                    document.getElementById('sellPrice').value = material.Sellprice || '';
                    document.getElementById('cost').value = material.Makeprice || '';
                    document.getElementById('unit').value = material.Unit || '';
                    document.getElementById('description').value = material.Description || '';

                    // Display the image if it exists
                    const imagePreview = document.getElementById('imagePreview');
                    if (material.Image) {
                        imagePreview.src = imageBaseUrl + material.Image;
                        imagePreview.style.display = 'block';

                        const imagePath = material.Image.split('/'); // Split the path by '/' to get the file name
                        const imageFileName = imagePath[imagePath.length - 1]; // Get the last part which is the file name
                        fileNameSpan.textContent = `Current file: ${imageFileName}`;
                    } else {
                        imagePreview.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('There was an error fetching the material!', error);
                });
        }



        document.getElementById('editMaterialForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            console.log("Form Data to be sent:", Array.from(formData.entries()));

            axios.put(`http://localhost:3000/app/api/v1/materials/${materialId}`, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(response => {
                    alert('Material updated successfully!');
                    window.location.href = '../../dist/pages/list-bahan.php'; // Redirect to the list page
                })
                .catch(error => {
                    console.error('There was an error!', error);
                    alert('There was an error adding the material.');
                });
        });

        document.getElementById('printButtonBarcode').addEventListener('click', function() {
            // Ensure materialId is defined
            if (!materialId) {
                alert('Material ID is not defined.');
                return;
            }

            axios({
                    url: `http://localhost:3000/app/api/v1/material/${materialId}/barcode`, // Use backticks
                    method: 'GET',
                    responseType: 'blob' // Important
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', `barcode_${materialId}.png`); // Use backticks for filename
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                })
                .catch((error) => {
                    console.error('There was an error downloading the PDF!', error);
                    alert('Error downloading PDF.');
                });
        });

        document.getElementById('printButtonPDF').addEventListener('click', function() {
            // Ensure materialId is defined
            if (!materialId) {
                alert('Material ID is not defined.');
                return;
            }

            axios({
                    url: `http://localhost:3000/app/api/v1/material/${materialId}/pdf`, // Use backticks
                    method: 'GET',
                    responseType: 'blob' // Important
                })
                .then((response) => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', `data_${materialId}.pdf`); // Use backticks for filename
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
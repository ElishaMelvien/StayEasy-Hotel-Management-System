<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Issue Reporting</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .form-container {
            max-width: 500px; 
            margin: 0 auto; 
        }
        .form-select, .btn {
            font-size: 0.875rem; 
        }
        .form-control, .form-select {
            padding: 0.75rem 1.25rem; 
        }
        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        .btn:hover {
            color: white;
            background-color: orange;
        }
        .input-group {
            display: flex;
            align-items: center;
        }
        .input-group-text {
            border: none;
            background: transparent;
            font-size: 1.25rem;
            padding: 0.5rem;
        }
        .icon-low {
            color: green;
        }
        .icon-medium {
            color: orange;
        }
        .icon-high {
            color: red;
        }
        .icon-critical {
            color: darkred;
        }
    </style>
</head>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-2 mb-2 page-header">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">EASY STAY</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="home.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Report Issue</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Issue Reporting Form Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Issue Reporting</h6>
                
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="form-container">
                        <form id="issueForm" onsubmit="event.preventDefault(); submitIssue();" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="issue_type" class="form-label">Issue Type:</label>
                                    <select id="issue_type" name="issue_type" class="form-select" required>
                                        <option value="" disabled selected>Select Issue Type</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Cleanliness">Cleanliness</option>
                                        <option value="Guest Services">Guest Services</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="guest_services" class="form-label">Guest Services:</label>
                                    <select id="guest_services" name="guest_services" class="form-select">
                                        <option value="" disabled selected>Select Service</option>
                                        <option value="Concierge">Concierge</option>
                                        <option value="Room Service">Room Service</option>
                                        <option value="Laundry">Laundry</option>
                                        <option value="Tea">Tea</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dessert">Dessert</option>
                                        <!-- Add more services as needed -->
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="severity" class="form-label">Severity:</label>
                                    <div class="input-group">
                                        <select id="severity" name="severity" class="form-select" required>
                                            <option value="" disabled selected>Select Severity</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                            <option value="Critical">Critical</option>
                                        </select>
                                        <span id="severity-icon" class="input-group-text">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="message" placeholder="Describe your issue" id="message" style="height: 150px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <input type="hidden" id="reported_by" name="reported_by" value="123"> <!-- This should be dynamically set based on logged-in user -->
                                <div class="col-12 text-center">
                                    <button class="btn" type="submit">Submit Issue</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Issue Reporting Form End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Custom JavaScript for Form Submission -->
    <script>
        function submitIssue() {
            const issueForm = document.getElementById('issueForm');
            const formData = new FormData(issueForm);

            fetch('submit_issue.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Your issue has been reported successfully.',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                    issueForm.reset();
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an error reporting your issue: ' + data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error reporting your issue.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            });
            }

        document.getElementById('severity').addEventListener('change', function() {
            const icon = document.getElementById('severity-icon').querySelector('i');
            const severity = this.value;

            
            icon.classList.remove('icon-low', 'icon-medium', 'icon-high', 'icon-critical');

            
            switch (severity) {
                case 'Low':
                    icon.classList.add('icon-low');
                    break;
                case 'Medium':
                    icon.classList.add('icon-medium');
                    break;
                case 'High':
                    icon.classList.add('icon-high');
                    break;
                case 'Critical':
                    icon.classList.add('icon-critical');
                    break;
                default:
                    icon.classList.add('icon-low');
            }
        });
    </script>

</body>

</html>

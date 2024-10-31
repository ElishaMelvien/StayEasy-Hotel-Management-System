<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SINAMU LODGE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link rel="stylesheet" href="./css/support.css">

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            font-size: 0.9800rem;
            border: none;
            background-color: blue;
            filter: contrast(1.2) brightness(1.0) saturate(1.3);
            color: white;
            cursor: pointer;
        }
        .btn:hover {
            color: white;
            background-color: #28a745;
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
    <nav>
    <div class="logo">
    <!-- <img class="bluebirdlogo" src="./image/bluebirdlogo.png"> -->
      <p>SINAMU LODGE</p>
    </div>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="contact.php">Contact</a>
      

</li>
      <a href="./logout.php"><button class="logoutbtn">Logout</button></a>
    </ul>
  </nav>
   
    <!-- Header End -->
   
    <!-- Issue Reporting Form Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="form-container">
                        <form id="issueForm" onsubmit="event.preventDefault(); submitIssue();" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="issue_type" class="form-label">Report Issue:</label>
                                    <select id="issue_type" name="issue_type" class="form-select" required aria-label="Select issue type">
                                        <option value="" disabled selected>Select Issue Type</option>
                                        <option value="Maintenance">Maintenance</option>
                                        <option value="Electrical">Electrical</option>
                                        <option value="Cleanliness">Cleanliness</option>
                                        <option value="Fire">Fire</option>
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
                                <div class="col-md-12">
                                    <label for="guest_services" class="form-label">Room Services:</label>
                                    <select id="guest_services" name="guest_services" class="form-select">
                                        <option value="" disabled selected>Select Service</option>
                                        <option value="Concierge">Concierge</option>
                                        <option value="Laundry">Laundry</option>
                                        <option value="Tea">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Tea">Tea</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dessert">Dessert</option>
                                    </select>
                                </div>
                               
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="message" placeholder="Describe your issue" id="message" style="height: 150px" required></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <input type="hidden" id="reported_by" name="reported_by" value="<?= $_SESSION['user_id'] ?>">
                                <div class="col-12 text-center">
                                    <button class="btn" type="submit" id="submitButton">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.getElementById('issue_type').addEventListener('change', function() {
            const guestServicesField = document.getElementById('guest_services');
            guestServicesField.required = this.value === 'Guest Services';
        });
        console.log(document.getElementById('message').value);
        function submitIssue() {
            const issueForm = document.getElementById('issueForm');
            const submitButton = document.getElementById('submitButton');
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
            })
            
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
                    break;
            }
        });
    </script>
</body>
</html>

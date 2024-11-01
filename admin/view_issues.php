<?php
session_start();
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/view-issues.css">
    <title>SINAMU LODGE - Admin</title>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>

    <div class="searchsection">
        <input type="text" name="search_bar" id="search_bar" placeholder="search..." onkeyup="searchFun()">
    </div>

        <!-- Modal for Assigning Issue -->
    <div class="modal fade" id="assignIssueModal" tabindex="-1" aria-labelledby="assignIssueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="assignIssueModalLabel">Assign Issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="assignForm">
                        <input type="hidden" id="issueId" name="issueId">
                        <div class="mb-3">
                            <label for="staffMember" class="form-label">Select Staff Member</label>
                            <select class="form-select" id="staffMember" name="staffMember" required>
                                <option value="" disabled selected>Select Staff Member</option>
                                <!-- Staff options will be populated here -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="roombooktable table-responsive-xl">
        <?php
            $issuesTableSQL = "SELECT * FROM issues";
            $issuesResult = mysqli_query($conn, $issuesTableSQL);
        ?>
    <table class="table table-bordered" id="table-data">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Issue Type</th>
                <th scope="col">Guest Service</th>
                <th scope="col">Severity</th>
                <th scope="col">Message</th>
                <th scope="col">Reported By</th>
                <th scope="col">Assigned To</th>
                <th scope="col">Status</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Room ID</th>
                <th scope="col">User ID</th>
                <th scope="col">User Email</th>
                <th scope="col" class="action">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php
        while ($issue = mysqli_fetch_array($issuesResult)) {
        ?>
            <tr>
                <td><?php echo $issue['id']; ?></td>
                <td><?php echo $issue['issue_type']; ?></td>
                <td><?php echo $issue['guest_service']; ?></td>
                <td><?php echo $issue['severity']; ?></td>
                <td><?php echo $issue['message']; ?></td>
                <td><?php echo $issue['reported_by']; ?></td>
                <td><?php echo $issue['assigned_to']; ?></td>
                <td>
                    <span class="status-label 
                        <?php 
                            if ($issue['status'] == 'Reported') { echo 'reported'; } 
                            elseif ($issue['status'] == 'In Progress') { echo 'in-progress'; } 
                            elseif ($issue['status'] == 'Resolved') { echo 'resolved'; } 
                            elseif ($issue['status'] == 'Closed') { echo 'closed'; } 
                        ?>">
                        <?php echo $issue['status']; ?>
                    </span>
                </td>
                <td><?php echo $issue['created_at']; ?></td>
                <td><?php echo $issue['updated_at']; ?></td>
                <td><?php echo $issue['room_id']; ?></td>
                <td><?php echo $issue['user_id']; ?></td>
                <td><?php echo $issue['usermail']; ?></td>
                <td class="action">
                    <?php if ($issue['status'] == 'Reported') { ?>
                        <button class="btn btn-warning" onclick="openAssignModal(<?php echo $issue['id']; ?>, '<?php echo $issue['issue_type']; ?>')">Assign</button>
                        <!-- <button class="btn btn-warning">Assign</button> -->
                    <?php } elseif ($issue['status'] == 'In Progress') { ?>
                        <button class="btn btn-success">Mark as Resolved</button>
                        <button class="btn btn-secondary">Reassign</button>
                    <?php } elseif ($issue['status'] == 'Resolved') { ?>
                        <button class="btn btn-primary">Close Issue</button>
                        <button class="btn btn-warning">Reopen</button>
                    <?php } elseif ($issue['status'] == 'Closed') { ?>
                        <button class="btn btn-warning">Reopen</button>
                    <?php } ?>
                </td>

            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
<script src="./javascript/view_issues.js"></script>

</html>


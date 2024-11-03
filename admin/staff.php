<?php
session_start();
include '../config.php';

if (isset($_POST['addstaff'])) {
    $staffname = $_POST['staffname'];
    $staffwork = $_POST['staffwork'];

    $sql = "INSERT INTO staff(name, work) VALUES ('$staffname', '$staffwork')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: staff.php");
        exit();
    }
}

if (isset($_POST['updateStaff'])) {
    $staffid = $_POST['staffid'];
    $staffname = $_POST['staffname'];
    $staffwork = $_POST['staffwork'];

    $sql = "UPDATE staff SET name='$staffname', work='$staffwork' WHERE id='$staffid'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: staff.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/staff.css">
    <title>SINAMU LODGE - Admin</title>
</head>
<body>
    <div class="addroomsection">
        <form action="" method="POST">
            <label for="troom">Name :</label>
            <input type="text" name="staffname" class="form-control" required placeholder="Enter Full Name">
            <label for="bed">Role :</label>
            <select name="staffwork" class="form-control" required>
                <option value="" disabled selected>Please choose a role</option>
                <option value="Manager">Manager</option>
                <option value="Cook">Cook</option>
                <option value="Helper">Helper</option>
                <option value="Cleaner">Cleaner</option>
                <option value="Waiter">Waiter</option>
                <option value="Plumber">Plumber</option>
                <option value="Electrician">Electrician</option>
                <option value="Receptionist">Receptionist</option>
                <option value="Chef">Chef</option>
                <option value="Bar Attendant">Bar Attendant</option>
            </select>
            <button type="submit" class="btn btn-success" name="addstaff">Add Staff</button>
        </form>
    </div>

    <div class="roombooktable table-responsive-xl">
        <h2 class="text-center">Staff</h2>
        <table class="table table-bordered" id="table-data">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM staff";
                $re = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($re)) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . htmlspecialchars($row['name']) . "</td>
                            <td>" . htmlspecialchars($row['work']) . "</td>
                            <td class='action'>
                                <a href='staffdelete.php?id=" . $row['id'] . "'><button class='delete-btn'>Delete</button></a>
                                <button class='edit-btn' data-bs-toggle='modal' data-bs-target='#editModal' 
                                data-id='" . $row['id'] . "' data-name='" . htmlspecialchars($row['name']) . "' 
                                data-work='" . htmlspecialchars($row['work']) . "'><i class='fas fa-edit'></i></button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Staff Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        <input type="hidden" name="staffid" id="staffid">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Name</label>
                            <input type="text" class="form-control" name="staffname" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Role</label>
                            <select class="form-control" name="staffwork" id="editRole" required>
                                <option value="" disabled>Please choose a role</option>
                                <option value="Manager">Manager</option>
                                <option value="Cook">Cook</option>
                                <option value="Helper">Helper</option>
                                <option value="Cleaner">Cleaner</option>
                                <option value="Waiter">Waiter</option>
                                <option value="Plumber">Plumber</option>
                                <option value="Electrician">Electrician</option>
                                <option value="Receptionist">Receptionist</option>
                                <option value="Chef">Chef</option>
                                <option value="Bar Attendant">Bar Attendant</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="updateStaff">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const work = button.getAttribute('data-work');

                document.getElementById('staffid').value = id;
                document.getElementById('editName').value = name;
                document.getElementById('editRole').value = work;
            });
        });
    </script>

</body>
</html>

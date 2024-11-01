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
    <title>SINAMU LODGE - Admin</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/room.css">

    <style>
        .roombox {
            background-color: #d1d7ff;
            padding: 10px;
        }
        .table td, .table th {
            padding-left: 20px;
        }
        .table .staff-name {
            text-align: right;
        }
        .room-title {
            margin-bottom: 10px;
        }
    </style>
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
                <option value="pPlumber">Plumber</option>
                <option value="Electrician">Electrician</option>
                <option value="Receptionist">Receptionist</option>
                <option value="Chef">Chef</option>
                <option value="Bar_man">Bar Man</option>
            </select>

            <button type="submit" class="btn btn-success" name="addstaff">Add Staff</button>
        </form>

        <?php
        if (isset($_POST['addstaff'])) {
            $staffname = $_POST['staffname'];
            $staffwork = $_POST['staffwork'];

            $sql = "INSERT INTO staff(name,work) VALUES ('$staffname', '$staffwork')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: staff.php");
                exit(); 
            }
        }
        ?>
    </div>

    <div class="room mt-4">
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
                                <a href='staffdelete.php?id=" . $row['id'] . "'><button class='btn btn-danger'>Delete</button></a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

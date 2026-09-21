<?php
include "database.php";

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1 class="text-center mb-4">Student Records</h1>

    <!-- Add Student Button -->
    <button type="button"
            class="btn btn-primary mb-3"
            data-bs-toggle="modal"
            data-bs-target="#add">
        Add Student
    </button>

    <!-- Student Table -->
    <div class="row">
        <div class="col-12">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $id = $row['id'];
                        $firstname = $row['firstname'];
                        $lastname = $row['lastname'];

                ?>

                    <tr>

                        <td>
                            <?php echo $id; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($firstname); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($lastname); ?>
                        </td>

                        <td>

                            <!-- EDIT BUTTON -->
                            <button type="button"
                                    class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#edit<?php echo $id; ?>">
                                Edit
                            </button>

                            <!-- DELETE BUTTON -->
                            <a href="delete.php?id=<?php echo $id; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Are you sure you want to delete this student?');">
                                Delete
                            </a>

                        </td>

                    </tr>


                    <!-- EDIT MODAL -->
                    <div class="modal fade"
                         id="edit<?php echo $id; ?>"
                         tabindex="-1"
                         aria-hidden="true">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form action="update.php" method="post">

                                    <div class="modal-header">

                                        <h5 class="modal-title">
                                            Edit Student
                                        </h5>

                                        <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal">
                                        </button>

                                    </div>

                                    <div class="modal-body">

                                        <!-- Hidden ID -->
                                        <input type="hidden"
                                               name="id"
                                               value="<?php echo $id; ?>">

                                        <!-- Firstname -->
                                        <div class="mb-3">

                                            <label class="form-label">
                                                Firstname
                                            </label>

                                            <input type="text"
                                                   class="form-control"
                                                   name="firstname"
                                                   value="<?php echo htmlspecialchars($firstname); ?>"
                                                   required>

                                        </div>

                                        <!-- Lastname -->
                                        <div class="mb-3">

                                            <label class="form-label">
                                                Lastname
                                            </label>

                                            <input type="text"
                                                   class="form-control"
                                                   name="lastname"
                                                   value="<?php echo htmlspecialchars($lastname); ?>"
                                                   required>

                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <button type="submit"
                                                class="btn btn-primary">
                                            Update
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                <?php

                    }

                } else {

                    echo '<tr>
                            <td colspan="4" class="text-center">
                                No student records found.
                            </td>
                          </tr>';

                }

                ?>

                </tbody>

            </table>

        </div>
    </div>

</div>


<!-- ADD STUDENT MODAL -->
<div class="modal fade"
     id="add"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="insert.php" method="post">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Student
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body">

                    <!-- Firstname -->
                    <div class="mb-3">

                        <label class="form-label">
                            Firstname
                        </label>

                        <input type="text"
                               class="form-control"
                               name="firstname"
                               required>

                    </div>

                    <!-- Lastname -->
                    <div class="mb-3">

                        <label class="form-label">
                            Lastname
                        </label>

                        <input type="text"
                               class="form-control"
                               name="lastname"
                               required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Add Student
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

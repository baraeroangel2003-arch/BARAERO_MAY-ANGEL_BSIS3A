<?php

include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "INSERT INTO students (firstname, lastname)
            VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $firstname, $lastname);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

?>

<td><?php echo $firstname; ?></td>
<td><?php echo $lastname; ?></td>
<td>
    <!--Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $id; ?>">
    Edit Student
    </button>

    <!-- Modal -->
    <div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h1 class="modal-title fs-5">Edit Student</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form action="update.php" method="POST">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
    </div>
    </div>
    </div>
    </div>

    <div class="modal-body">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="tect" value="<?php echo $firstname; ?>" name="firstname" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control">
        </div>

        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="modal-content">
        <form action="update.php" method="POST">
        <div class="modal-header">
        <h1 class="modal-title fs-5">Edit Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" value="<?php echo $firstname; ?>" name="firstname" class="form-control">
        </div>
        <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control">
        </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
        </div>
        </form>
        </div>


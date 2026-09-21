<?php

include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "UPDATE students
            SET firstname = ?, lastname = ?
            WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $firstname, $lastname, $id);

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

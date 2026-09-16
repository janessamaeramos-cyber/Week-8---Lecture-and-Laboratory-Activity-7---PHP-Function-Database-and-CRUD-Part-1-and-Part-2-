<?php

require_once "db.php";
require_once "functions.php";

$result = $conn->query("SELECT * FROM students");

require_once "includes/header.php";
?>

<h2>Student List</h2>

<a href="create.php">Add Student</a>

<br><br>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row["id"]; ?></td>

            <td><?php echo displayValue($row["name"]); ?></td>

            <td><?php echo displayValue($row["email"]); ?></td>

            <td><?php echo displayValue($row["course"]); ?></td>

            <td>
                <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                |
                <a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
            </td>
        </tr>

    <?php } ?>

</table>

</body>
</html>
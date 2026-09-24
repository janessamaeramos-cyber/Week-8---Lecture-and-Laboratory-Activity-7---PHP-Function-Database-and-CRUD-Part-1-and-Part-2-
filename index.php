<?php

require_once "db.php";
require_once "functions.php";

$result = $conn->query("SELECT * FROM students");

require_once "includes/header.php";

?>

<h2 class="mb-3">Student List</h2>

<?php if (isset($_GET["success"])) { ?>

    <div class="alert alert-success">
        <?php
        if ($_GET["success"] == "created") {
            echo "Student added successfully.";
        } elseif ($_GET["success"] == "updated") {
            echo "Student updated successfully.";
        }
        ?>
    </div>

<?php } ?>

<a href="create.php" class="btn btn-primary mb-3">
    Add Student
</a>

<div class="table-responsive">

    <table class="table table-bordered table-striped table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($row = $result->fetch_assoc()) { ?>

                <tr>

                    <td>
                        <?php echo $row["id"]; ?>
                    </td>

                    <td>
                        <?php echo displayValue($row["name"]); ?>
                    </td>

                    <td>
                        <?php echo displayValue($row["email"]); ?>
                    </td>

                    <td>
                        <?php echo displayValue($row["course"]); ?>
                    </td>

                    <td>

                        <a
                            href="edit.php?id=<?php echo $row["id"]; ?>"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <a
                            href="delete.php?id=<?php echo $row["id"]; ?>"
                            class="btn btn-danger btn-sm"
                        >
                            Delete
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </tbody>

    </table>

</div>

<?php require_once "includes/footer.php"; ?>
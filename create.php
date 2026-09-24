<?php

require_once "db.php";
require_once "functions.php";

$message = "";

if (isset($_POST["save"])) {

    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $course = cleanInput($_POST["course"]);

    if (empty($name) || empty($email) || empty($course)) {

        $message = "Please complete all fields.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO students (name, email, course) VALUES (?, ?, ?)"
        );

        $stmt->bind_param("sss", $name, $email, $course);

        if ($stmt->execute()) {
            header("Location: index.php?success=created");
            exit;
        }
    }
}

require_once "includes/header.php";

?>

<h2 class="mb-4">Add Student</h2>

<?php if ($message != "") { ?>

    <div class="alert alert-danger">
        <?php echo $message; ?>
    </div>

<?php } ?>

<form method="POST" action="create.php">

    <div class="mb-3">

        <label for="name" class="form-label">
            Name:
        </label>

        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
        >

    </div>

    <div class="mb-3">

        <label for="email" class="form-label">
            Email:
        </label>

        <input
            type="text"
            name="email"
            id="email"
            class="form-control"
        >

    </div>

    <div class="mb-3">

        <label for="course" class="form-label">
            Course:
        </label>

        <input
            type="text"
            name="course"
            id="course"
            class="form-control"
        >

    </div>

    <button
        type="submit"
        name="save"
        class="btn btn-primary"
    >
        Save Student
    </button>

    <a
        href="index.php"
        class="btn btn-secondary"
    >
        Cancel
    </a>

</form>

<?php require_once "includes/footer.php"; ?>
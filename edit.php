<?php

require_once "db.php";
require_once "functions.php";

$message = "";

if (!isset($_GET["id"])) {
    die("Student ID is missing.");
}

$id = (int) $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

if (!$student) {
    die("Student not found.");
}

if (isset($_POST["save"])) {

    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $course = cleanInput($_POST["course"]);

    if (empty($name) || empty($email) || empty($course)) {

        $message = "Please complete all fields.";

    } else {

        $stmt = $conn->prepare(
            "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?"
        );

        $stmt->bind_param("sssi", $name, $email, $course, $id);

        if ($stmt->execute()) {
            header("Location: index.php?success=updated");
            exit;
        }
    }
}

require_once "includes/header.php";

?>

<h2 class="mb-4">Edit Student</h2>

<?php if ($message != "") { ?>

    <div class="alert alert-danger">
        <?php echo $message; ?>
    </div>

<?php } ?>

<form method="POST" action="edit.php?id=<?php echo $id; ?>">

    <div class="mb-3">

        <label for="name" class="form-label">
            Name:
        </label>

        <input
            type="text"
            name="name"
            id="name"
            class="form-control"
            value="<?php echo htmlspecialchars($student["name"]); ?>"
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
            value="<?php echo htmlspecialchars($student["email"]); ?>"
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
            value="<?php echo htmlspecialchars($student["course"]); ?>"
        >

    </div>

    <button
        type="submit"
        name="save"
        class="btn btn-warning"
    >
        Save Changes
    </button>

    <a
        href="index.php"
        class="btn btn-secondary"
    >
        Cancel
    </a>

</form>

<?php require_once "includes/footer.php"; ?>
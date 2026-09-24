<?php

require_once "Student.php";

require_once "includes/header.php";

?>

<h2 class="mb-4">OOP Student Test</h2>

<div class="row">

    <?php

    $student1 = new Student(
        "Ana Reyes",
        "ana@gmail.com",
        "BSIT"
    );

    $student2 = new Student(
        "Mark Santos",
        "mark@gmail.com",
        "BSAB"
    );

    $student3 = new Student(
        "Lara Cruz",
        "lara@gmail.com",
        "BSIS"
    );

    ?>

    <div class="col-md-4 mb-3">

        <div class="card">

            <div class="card-header">
                Student 1
            </div>

            <div class="card-body">

                <p>
                    <?php echo $student1->displayInfo(); ?>
                </p>

            </div>

        </div>

    </div>


    <div class="col-md-4 mb-3">

        <div class="card">

            <div class="card-header">
                Student 2
            </div>

            <div class="card-body">

                <p>
                    <?php echo $student2->displayInfo(); ?>
                </p>

            </div>

        </div>

    </div>


    <div class="col-md-4 mb-3">

        <div class="card">

            <div class="card-header">
                Student 3
            </div>

            <div class="card-body">

                <p>
                    <?php echo $student3->displayInfo(); ?>
                </p>

            </div>

        </div>

    </div>

</div>

<div class="alert alert-info mt-3">

    <strong>First Student Course:</strong>
    <?php echo $student1->getCourse(); ?> <br>

    <strong>Second Student Course:</strong>
    <?php echo $student2->getCourse(); ?> <br>

    <strong>Third Student Course:</strong> 
    <?php echo $student3->getCourse(); ?> 

</div>

<?php require_once "includes/footer.php"; ?>
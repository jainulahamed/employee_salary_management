<?php
include 'db.php';

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, delete the salary record associated with this employee
    $sql_salary = "DELETE FROM salaries WHERE employee_id = $id";
    if ($conn->query($sql_salary) === TRUE) {

        // Then, delete the employee record
        $sql_employee = "DELETE FROM employees WHERE id = $id";
        if ($conn->query($sql_employee) === TRUE) {
            header('Location: page2.php');
        } else {
            echo "Error deleting employee: " . $conn->error;
        }

    } else {
        echo "Error deleting salary: " . $conn->error;
    }
} else {
    echo "No ID provided.";
}

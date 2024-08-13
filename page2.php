<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Management - View Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            padding: 20px 0;
        }
        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 1200px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(9, 1fr);
            gap: 5px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            overflow-x: auto;
        }
        .grid-container div {
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .grid-header {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
        .actions a {
            color: #007bff;
            text-decoration: none;
            padding: 5px;
            display: inline-block;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
                text-align: left;
            }
            .grid-container div {
                text-align: left;
                padding: 10px 5px;
            }
            .grid-header, .actions {
                display: none;
            }
        }
    </style>
</head>
<body>

<h1>Employee Records</h1>
<div class="container">
    <div class="grid-container">
        <!-- Header Row -->
        <div class="grid-header">ID</div>
        <div class="grid-header">Name</div>
        <div class="grid-header">Employee ID</div>
        <div class="grid-header">Department</div>
        <div class="grid-header">Sex</div>
        <div class="grid-header">Marital Status</div>
        <div class="grid-header">Address</div>
        <div class="grid-header">Salary</div>
        <div class="grid-header">Actions</div>

        <!-- Data Rows -->
        <?php
        $sql = "SELECT employees.id, name, employee_id, department, sex, marital_status, address, salary
                FROM employees
                JOIN salaries ON employees.id = salaries.employee_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <div>{$row['id']}</div>
                <div>{$row['name']}</div>
                <div>{$row['employee_id']}</div>
                <div>{$row['department']}</div>
                <div>{$row['sex']}</div>
                <div>{$row['marital_status']}</div>
                <div>{$row['address']}</div>
                <div>{$row['salary']}</div>
                <div class='actions'>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}'>Delete</a>
                </div>";
            }
        } else {
            echo "<div colspan='9'>No records found</div>";
        }
        ?>
    </div>
</div>

</body>
</html>

<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $sex = $_POST['sex'];
    $marital_status = $_POST['marital_status'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name,  department, sex, marital_status, address)
            VALUES ('$name', '$department', '$sex', '$marital_status', '$address')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        $sql_salary = "INSERT INTO salaries (employee_id, salary) VALUES ('$last_id', '$salary')";
        $conn->query($sql_salary);

        header('Location: page2.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Salary Management</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
        }

        /* Form Styles */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container .radio-group {
            display: flex;
            justify-content: space-between;
        }
        .form-container .radio-group label {
            margin-right: 10px;
            font-weight: normal;
        }
        .form-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        .form-container button[type="reset"] {
            background-color: #dc3545;
        }

        /* Grid Styles */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            gap: 10px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            margin: 20px auto;
        }
        .grid-container div {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .grid-header {
            background-color: #333;
            color: #fff;
            font-weight: bold;
        }
        .actions a {
            margin: 0 5px;
            color: #007bff;
            text-decoration: none;
        }
        .actions a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Form Section -->
<div class="form-container">
    <form method="POST" action="index.php">
    <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required>

        <label>Sex:</label>
        <div class="radio-group">
            <label><input type="radio" name="sex" value="Male" required> Male</label>
            <label><input type="radio" name="sex" value="Female" required> Female</label>
            <label><input type="radio" name="sex" value="Other" required> Other</label>
        </div>

        <label for="marital_status">Marital Status:</label>
        <select id="marital_status" name="marital_status" required>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
        </select>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" required>
    <button type="submit">Submit</button>
    <button type="reset">Cancel</button>
</form>
    </div>
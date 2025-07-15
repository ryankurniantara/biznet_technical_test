<?php
require 'database.php';
$message = "";

// Cek apakah kolom bonus masih ada
$hasBonus = false;
$check = $pdo->query("SHOW COLUMNS FROM orders LIKE 'bonus'");
if ($check->rowCount() > 0) {
    $hasBonus = true;
}

// Tombol: Naikkan Gaji
if (isset($_POST['update_salary'])) {
    $pdo->exec("UPDATE employees SET salary = salary * 1.05");
    $message = "✅ Gaji semua pegawai berhasil dinaikkan 5%!";
}

// Tombol: Hitung Bonus (jika kolom bonus masih ada)
if (isset($_POST['update_bonus']) && isset($_POST['bonus_percent']) && $hasBonus) {
    $percent = floatval($_POST['bonus_percent']);
    if ($percent > 0) {
        $pdo->exec("UPDATE orders SET bonus = total_amount * ($percent / 100)");
        $message = "✅ Bonus berhasil dihitung sebesar $percent% dari total_amount.";
    } else {
        $message = "❌ Persentase bonus harus lebih dari 0.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Pegawai & Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 40px;
            background-color: #fff;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #e9ecef;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            margin-right: 10px;
            margin-bottom: 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .message {
            color: green;
            margin-bottom: 20px;
            font-weight: bold;
        }

        h2 {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 5px;
        }

        .form-inline {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        input[type="number"] {
            padding: 5px;
            width: 80px;
        }
    </style>
</head>

<body>

    <h2>Dashboard Pegawai dan Order</h2>
    <?php if (!empty($message)) echo "<div class='message'>$message</div>"; ?>

    <form method="POST" style="margin-bottom: 30px;">
        <button class="btn" type="submit" name="update_salary">Naikkan Gaji Semua Pegawai (+5%)</button>
    </form>

    <?php if ($hasBonus): ?>
        <!-- Form Bonus Dinamis -->
        <form method="POST" class="form-inline">
            <label for="bonus_percent"><strong>Hitung Bonus Order:</strong></label>
            <input type="number" name="bonus_percent" id="bonus_percent" min="1" step="0.1" placeholder="misal: 10" required>
            <span>% dari total</span>
            <button class="btn" type="submit" name="update_bonus">Hitung Bonus</button>
        </form>
    <?php endif; ?>

    <h2>Data Karyawan dan Departemen</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Departemen</th>
            <th>Gaji</th>
        </tr>
        <?php
        $stmt = $pdo->query("
        SELECT e.name AS employee_name, d.department_name, e.salary
        FROM employees e
        JOIN departments d ON e.department_id = d.id
    ");
        foreach ($stmt as $row) {
            echo "<tr>
                <td>{$row['employee_name']}</td>
                <td>{$row['department_name']}</td>
                <td>Rp " . number_format($row['salary'], 2, ',', '.') . "</td>
              </tr>";
        }
        ?>
    </table>

    <h2>Rata-rata Gaji per Departemen</h2>
    <table>
        <tr>
            <th>ID Departemen</th>
            <th>Nama Departemen</th>
            <th>Rata-rata Gaji</th>
        </tr>
        <?php
        $stmt = $pdo->query("
        SELECT d.id AS department_id, d.department_name, AVG(e.salary) AS avg_salary
        FROM employees e
        JOIN departments d ON e.department_id = d.id
        GROUP BY d.id, d.department_name
        ORDER BY avg_salary DESC
    ");
        foreach ($stmt as $row) {
            echo "<tr>
                <td>{$row['department_id']}</td>
                <td>{$row['department_name']}</td>
                <td>Rp " . number_format($row['avg_salary'], 2, ',', '.') . "</td>
              </tr>";
        }
        ?>
    </table>

    <h2>Order Bulan Ini <?= $hasBonus ? "(Dengan Bonus)" : "" ?></h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Tanggal</th>
            <th>Total</th>
            <?php if ($hasBonus): ?><th>Bonus</th><?php endif; ?>
        </tr>
        <?php
        $query = "
        SELECT order_id, customer_id, order_date, total_amount" . ($hasBonus ? ", bonus" : "") . "
        FROM orders
        WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())
    ";
        $stmt = $pdo->query($query);
        foreach ($stmt as $row) {
            echo "<tr>
                <td>{$row['order_id']}</td>
                <td>{$row['customer_id']}</td>
                <td>{$row['order_date']}</td>
                <td>Rp " . number_format($row['total_amount'], 2, ',', '.') . "</td>";
            if ($hasBonus) {
                $bonusValue = $row['bonus'] !== null ? number_format($row['bonus'], 2, ',', '.') : "-";
                echo "<td>Rp $bonusValue</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Order Melebihi Rata-rata</h2>
    <table>
        <tr>
            <th>Customer ID</th>
            <th>Total</th>
        </tr>
        <?php
        $stmt = $pdo->query("
        SELECT customer_id, total_amount
        FROM orders
        WHERE total_amount > (SELECT AVG(total_amount) FROM orders)
    ");
        foreach ($stmt as $row) {
            echo "<tr>
                <td>{$row['customer_id']}</td>
                <td>Rp " . number_format($row['total_amount'], 2, ',', '.') . "</td>
              </tr>";
        }
        ?>
    </table>

</body>

</html>
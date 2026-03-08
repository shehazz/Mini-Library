<?php
include '../Controllers/finescontroller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Fine Checker</title>
    <link rel="stylesheet" href="Fines.css">
</head>
<body>

<div class="container">
    <h2>Library Fine Inquiry System</h2>
        
    <div class="search-box">
        <form method="post">
            <label>Enter Your NIC Number:</label>
            <input type="text" name="nic" value="<?php echo htmlspecialchars($nic_input); ?>" placeholder="e.g. 199912345678" required style="padding: 10px; width: 250px; border: 1px solid #ced4da; border-radius: 4px; margin-left: 10px;">
            <button type="submit" name="search" style="padding: 10px 20px; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer;">Search</button>
        </form>
    </div>

    <?php if (isset($_POST['search'])): ?> 
        <?php if ($result && $result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Due Date</th>
                        <th>Late Days</th>
                        <th>Daily Rate (Rs.)</th>
                        <th>Total Fine (Rs.)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): 
                        $today = new DateTime();
                        $due_date = new DateTime($row['duedate']);
                        $diff = $today->diff($due_date);
                        $late_days = ($today > $due_date) ? $diff->days : 0;
                    ?>
                    <tr>
                        <td><?php echo $row['isbn']; ?></td>
                        <td><?php echo $row['duedate']; ?></td>
                        <td><?php echo $late_days; ?> Days</td>
                        <td><?php echo number_format($row['dailyrate'], 2); ?></td>
                        <td class="fine-txt"><?php echo number_format($row['fineamount'], 2); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <p style="margin-top: 15px; font-style: italic; color: #7f8c8d;">* Please settle these outstanding fines at the library counter.</p>
        <?php else: ?>
            <div class="success-msg">No outstanding fines found for this NIC number. Thank you!</div>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
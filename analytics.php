<?php
session_start();
include 'conn.php';

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

// Sample data for pie chart (replace with DB values if needed)
$data = [
    'Facebook' => 35,
    'Google' => 30,
    'Instagram' => 20,
    'Direct' => 10,
    'Others' => 5
];

$labels = json_encode(array_keys($data));
$values = json_encode(array_values($data));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', sans-serif;
            padding: 40px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .chart-box {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        /* Back to Profile Button Styling */
        .back-button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
            text-decoration: none;
            border-radius: 25px;
            margin-bottom: 25px;
            text-align: center;
            transition: all 0.3s ease-in-out;
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .back-button:hover {
            background-color: #388E3C;
            transform: translateY(-2px);
        }

        .back-button:active {
            background-color: #2C6A2E;
            transform: translateY(1px);
        }

        .back-button:focus {
            outline: none;
        }
    </style>
</head>
<body>

    <!-- Back to Profile Button -->
    <a href="profile.php" class="back-button">⬅ Back to Profile</a>

    <h2>Traffic Source Analytics</h2>

    <div class="chart-box">
        <canvas id="pieChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('pieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: <?php echo $labels; ?>,
                datasets: [{
                    label: 'Traffic Sources',
                    data: <?php echo $values; ?>,
                    backgroundColor: [
                        '#4CAF50', '#2196F3', '#FF9800', '#9C27B0', '#E91E63'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

</body>
</html>

<?php
session_start();
include 'conn.php';

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

// Fetch user details from the database
$email = $_SESSION['email'];
$query = "SELECT * FROM userdata WHERE email='$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* Global Styles */
        :root {
            --primary: #4CAF50;
            --primary-dark: #388E3C;
            --accent: #2196F3;
            --accent-dark: #1976D2;
            --danger: #f44336;
            --danger-dark: #d32f2f;
            --bg: #f5f7fb;
            --text: #333;
            --card-bg: #fff;
            --soft-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --transition: all 0.3s ease-in-out;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        header {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px 20px;
            text-align: center;
            font-size: 2rem;
            font-weight: 700;
            box-shadow: var(--soft-shadow);
        }

        .profile-container {
            width: 90%;
            max-width: 850px;
            margin: 40px auto;
            background: var(--card-bg);
            padding: 40px;
            border-radius: var(--radius);
            box-shadow: var(--soft-shadow);
            transition: var(--transition);
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-header img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            border: 6px solid var(--primary);
            object-fit: cover;
            box-shadow: var(--soft-shadow);
            transition: transform 0.3s;
        }

        .profile-header img:hover {
            transform: scale(1.08);
        }

        .profile-header h2 {
            font-size: 1.8rem;
            margin-top: 15px;
            font-weight: 600;
        }

        .profile-header p {
            font-size: 1rem;
            color: #666;
        }

        .upload-button {
            background-color: var(--accent);
            color: white;
            margin-top: 20px;
        }

        .upload-button:hover {
            background-color: var(--accent-dark);
        }

        .profile-details {
            margin-top: 30px;
            text-align: left;
            padding: 25px;
            background: #fdfdfd;
            border-radius: var(--radius);
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .profile-details p {
            font-size: 1.1rem;
            margin-bottom: 12px;
            border-bottom: 1px dashed #ddd;
            padding-bottom: 10px;
        }

        .profile-actions {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .button {
            padding: 12px 28px;
            border-radius: var(--radius);
            font-weight: 600;
            text-decoration: none;
            color: white;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            box-shadow: var(--soft-shadow);
        }

        .button:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .edit-button {
            background-color: var(--primary);
        }

        .edit-button:hover {
            background-color: var(--primary-dark);
        }

        .logout-button {
            background-color: var(--danger);
        }

        .logout-button:hover {
            background-color: var(--danger-dark);
        }

        .back-button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #ccc;
            color: black;
            font-weight: 600;
            text-decoration: none;
            border-radius: var(--radius);
            margin-bottom: 25px;
            transition: var(--transition);
        }

        .back-button:hover {
            background-color: #aaa;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #222;
            color: #eee;
            font-size: 0.95rem;
            margin-top: 40px;
        }

    </style>
</head>
<body>

    <header>
        User Profile
    </header>

    <div class="profile-container">
        
        <a href="index.php" class="back-button">⬅ Back to Home</a>

        <div class="profile-header">
            <img src="./img/jolo.jpg" alt="Profile Picture">
            <h2><?php echo htmlspecialchars($user['fullname']); ?></h2>
            <p><?php echo htmlspecialchars($user['email']); ?></p>
            <a href="edit-profile.php" class="button edit-button">Edit Profile</a>
        </div>

        <div class="profile-details">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['fullname']); ?></p>
            <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phonenumber']); ?></p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
        </div>

        <div class="profile-actions">
            <a href="logout.php" class="button logout-button">Log Out</a>
            <!-- New Analytics Button -->
            <a href="analytics.php" class="button edit-button">View Analytics</a>
        </div>
    </div>

</body>
</html>

<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | PHFOODLOG</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.jpg">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            overflow: hidden;
        }
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-info h1 {
            margin: 0 0 10px 0;
            color: #333;
        }
        .profile-info p {
            margin: 0;
            color: #666;
        }
        .profile-stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
            color: #4CAF50;
        }
        .stat-label {
            font-size: 14px;
            color: #666;
        }
        .profile-section {
            margin-bottom: 30px;
        }
        .profile-section h2 {
            margin-bottom: 15px;
            color: #333;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .back-btn:hover {
            background-color: #45a049;
        }
        /* Dark mode styles */
        body.darkMode .profile-container {
            background-color: #2d2d2d;
            color: #f0f0f0;
        }
        body.darkMode .profile-header {
            border-bottom-color: #444;
        }
        body.darkMode .profile-info h1 {
            color: #f0f0f0;
        }
        body.darkMode .profile-info p {
            color: #bbb;
        }
        body.darkMode .profile-section h2 {
            color: #f0f0f0;
            border-bottom-color: #388E3C;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <a href="index.php" class="back-btn">← Back to Home</a>
        
        <div class="profile-header">
            <div class="profile-avatar">
                <img src="../images/logo.jpg" alt="User Avatar">
            </div>
            <div class="profile-info">
                <h1><?php echo htmlspecialchars($_SESSION['username']); ?></h1>
                <p>Food Enthusiast</p>
                <p>Member since: May 2025</p>
            </div>
        </div>
        
        <div class="profile-stats">
            <div class="stat-item">
                <div class="stat-number">0</div>
                <div class="stat-label">Recipes</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">0</div>
                <div class="stat-label">Comments</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">0</div>
                <div class="stat-label">Likes</div>
            </div>
        </div>
        
        <div class="profile-section">
            <h2>Recent Activity</h2>
            <p>Your recent activity will appear here...</p>
        </div>
        
        <div class="profile-section">
            <h2>Favorite Recipes</h2>
            <p>Your favorite recipes will appear here...</p>
        </div>
    </div>
    
    <script>
        // Dark mode support
        (localStorage.getItem('mode') === 'darkmode')
            ? document.body.classList.add('darkMode')
            : document.body.classList.remove('darkMode');
    </script>
</body>
</html>
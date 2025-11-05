<?php
// Include database configuration
require_once 'db_config.php';

 $error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify password (assuming you're using password_hash)
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin'] = true;
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid Username or Password";
        }
    } else {
        $error = "Invalid Username or Password";
    }
    $stmt->close(); 
}
 $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PHP Blog</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--[ Favicon ]-->
    <link href='../images/logo.jpg' rel='apple-touch-icon' sizes='120x120'/>
    <link href='../images/logo.jpg' rel='apple-touch-icon' sizes='152x152'/>
    <link href='../images/logo.jpg' rel='icon' type='image/x-icon'/>
    <link href='../images/logo.jpg' rel='shortcut icon' type='image/x-icon'/>
    <style>
        /* --- Basic Reset & Body Styling --- */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        body {
            /* Filipino food-related background from Unsplash */
            background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
            background-size: cover;
            background-position: center;
        }
        /* --- Overlay for readability --- */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }
        
        /* --- Main Container with two columns --- */
        .main-container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            max-height: 90vh; /* Changed from fixed height to max-height */
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        
        /* --- Left Side Image Panel --- */
        .left-panel {
            width: 50%;
            position: relative;
            overflow: hidden;
        }
        
        .left-panel-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6); /* Dim the image */
        }
        
        /* Overlay for text */
        .left-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
            z-index: 1;
        }
        
        .left-panel-content {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 40px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 2;
        }
        
        .left-panel-content h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
            line-height: 1.3;
        }
        
        .left-panel-content p {
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .left-panel-content .art-by {
            font-size: 14px;
            margin-top: 20px;
            opacity: 0.8;
        }
        
        /* --- Right Side Login Panel --- */
        .right-panel {
            width: 50%;
            background: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative; /* Added for logo positioning */
            overflow-y: auto; /* Added to allow scrolling if content overflows */
        }
        
        /* --- Logo --- */
        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            z-index: 3;
        }
        
        .logo {
            width: 40px;
            height: 40px;
            padding: 5px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain; 
            border-radius: 50%; 
        }
        
        .brand-text {
            color: white;
            font-weight: 600;
            font-size: 18px;
        }
        
        .login-container {
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box; /* Added to ensure padding is included in width calculation */
        }
        
        .login-container h1 {
            color: #333;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 20px;
        }
        
        .login-container p {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        /* Error message styling */
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-bottom: 15px;
            font-weight: 500;
        }
        
        /* --- Form Styling --- */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box; /* Added to ensure padding is included in width calculation */
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        
        /* Password field with reveal icon */
        .password-field {
            position: relative;
        }
        
        .password-field input {
            padding-right: 40px; /* Make room for the icon */
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
            font-size: 16px;
        }
        
        .password-toggle:hover {
            color: #007bff;
        }
        
        .checkbox-group {
            text-align: left;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #555;
            cursor: pointer;
        }
        
        .checkbox-group input[type="checkbox"] {
            accent-color: #007bff;
        }
        
        /* --- Main Login Button --- */
        .main-btn {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            box-sizing: border-box; /* Added to ensure padding is included in width calculation */
        }
        
        .main-btn:hover {
            background-color: #45a049;
        }
        
        /* --- Divider --- */
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #ddd;
        }
        
        .divider span {
            padding: 0 15px;
            color: #999;
            font-size: 13px;
        }
        
        /* --- Social Login Buttons --- */
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid transparent;
            box-sizing: border-box; /* Added to ensure padding is included in width calculation */
        }
        
        .social-btn i {
            margin-right: 10px;
            font-size: 16px;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        
        .google-btn {
            background-color: #ffffff;
            color: #4285F4;
            border-color: #dadce0;
        }
        
        .google-btn:hover {
            border-color: #c2c7cd;
        }
        
        .email-btn {
            background-color: #00A1F1;
            color: #ffffff;
        }
        
        .email-btn:hover {
            background-color: #0087c7;
        }
        
        .facebook-btn {
            background-color: #1877F2;
            color: #ffffff;
        }
        
        .facebook-btn:hover {
            background-color: #166fe5;
        }
        
        /* --- Register Link --- */
        .register-link {
            margin-top: 20px;
            font-size: 13px;
            color: #666;
        }
        
        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        /* --- Terms and Privacy Links --- */
        .terms-privacy {
            margin-top: 15px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
        .terms-privacy a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .terms-privacy a:hover {
            text-decoration: underline;
        }
        /* Media query for smaller screens */
        @media (max-width: 768px) {
            .main-container {
                flex-direction: column;
                width: 95%;
                max-height: 95vh;
            }
            
            .left-panel, .right-panel {
                width: 100%;
            }
            
            .left-panel {
                height: 30vh;
            }
            
            .right-panel {
                height: 70vh;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Left Panel with Image -->
        <div class="left-panel">
            <img class="left-panel-img" src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Filipino Food Adobo">
            <div class="left-panel-content">
                <!-- Logo  -->
                <div class="logo-container">
                    <div class="logo">
                         <img src="../images/logo.jpg" alt="PHFOODLOG Logo">
                    </div>
                    <div class="brand-text">PHFOODLOG</div>
                </div>
                <!-- Website Overview Description  -->
                <h2>JOIN OUR COMMUNITY</h2>
                <p>Discover authentic Filipino recipes. Share your culinary creations, explore traditional dishes, and connect with food enthusiasts who love Filipino cuisine.</p>
                <div class="art-by"></div>
            </div>
        </div>
        
        <!-- Right Panel with Login Form -->
        <div class="right-panel">      
            <div class="login-container">
                <h1>Welcome Back to PHFOODLOG!</h1>
                <p>Please login to your account</p>
                <?php if (!empty($error)): ?>
                    <div class="error"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <!-- Traditional Login Form -->
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" placeholder="Enter Password" required>
                            <i class="password-toggle fas fa-eye" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                    <button type="submit" name="login" class="main-btn">Login</button>
                </form>
                <!-- Social Login Divider -->
                <div class="divider"><span>OR</span></div>
                <!-- Social Login Buttons -->
                <button class="social-btn google-btn" onclick="handleGoogleLogin()">
                    <i class="fab fa-google"></i>
                    <span>Sign in with Google</span>
                </button>
                <button class="social-btn email-btn" onclick="handleEmailLogin()">
                    <i class="fas fa-envelope"></i>
                    <span>Sign in with Email</span>
                </button>
                <button class="social-btn facebook-btn" onclick="handleFacebookLogin()">
                    <i class="fab fa-facebook-f"></i>
                    <span>Sign in with Facebook</span>
                </button>
                <p class="terms-privacy">By logging in, I confirm that I have read and agree to the PHFOODLOG <a href="terms.php">Terms of Service</a> and <a href="privacy.php">Privacy Policy</a></p>
                <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
            </div>
        </div>
    </div>
    
    <script>
        function handleGoogleLogin() {
            alert("Google login not implemented yet.");
        }
        function handleEmailLogin() {
            alert("Email login not implemented yet.");
        }
        function handleFacebookLogin() {
            alert("Facebook login not implemented yet.");
        }
        
        // Password reveal functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        
        togglePassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
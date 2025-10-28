<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PHP Blog</title>
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
            /* Philippine food-related background from Unsplash */
            background-image: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80');
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
            max-height: 90vh;
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
            filter: brightness(0.6);
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
            position: relative;
            overflow-y: auto;
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
        /* --- Register Card Container --- */
        .register-container {
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box;
        }
        .register-container h1 {
            color: #333;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 20px;
        }
        .register-container p {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
        }
        /* --- Form Styling --- */
        .form-group {
            margin-bottom: 20px;
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
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        /* Error message styling */
        .error {
            color: #e74c3c;
            font-size: 14px;
            margin-bottom: 15px;
            font-weight: 500;
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
        /* --- Main Register Button --- */
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
            box-sizing: border-box;
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
        /* --- Social Register Buttons (Optional) --- */
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
            box-sizing: border-box;
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
        /* --- Login Link --- */
        .login-link {
            margin-top: 20px;
            font-size: 13px;
            color: #666;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
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
            <img class="left-panel-img" src="https://images.unsplash.com/photo-1569718212165-3a8278d5f624?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1770&q=80" alt="Filipino Food Adobo">
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
                <div class="art-by">PHOTO BY Kelsey Virchis</div>
            </div>
        </div>
        
        <!-- Right Panel with Login Form -->
        <div class="right-panel">
            <div class="register-container">
                <h1>Welcome to PHFOODLOG!</h1>
                <p>Join PHFoodblog today!</p>
                <!-- Registration Form -->
                <form action="register_process.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Choose a username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input type="password" id="password" name="password" placeholder="Create a password" required>
                            <i class="password-toggle fas fa-eye" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="password-field">
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                            <i class="password-toggle fas fa-eye" id="toggleConfirmPassword"></i>
                        </div>
                    </div>
                    <button type="submit" name="register" class="main-btn">Register</button>
                </form>
                <!-- Social Register Divider -->
                <div class="divider"><span>OR</span></div>
                <!-- Social Register Buttons -->
                <button class="social-btn google-btn" onclick="handleGoogleLogin()">
                    <i class="fab fa-google"></i>
                    <span>Sign up with Google</span>
                </button>
                <button class="social-btn email-btn" onclick="handleEmailLogin()">
                    <i class="fas fa-envelope"></i>
                    <span>Sign up with Email</span>
                </button>
                <button class="social-btn facebook-btn" onclick="handleFacebookLogin()">
                    <i class="fab fa-facebook-f"></i>
                    <span>Sign up with Facebook</span>
                </button>
                <p class="terms-privacy">By joining , I confirm that I have read and agree to the PHFOODLOG <a href="terms.php">Terms of Service</a> and <a href="privacy.php">Privacy Policy</a></p>
                <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </div>

    <!-- Optional: Basic JS handlers (can be expanded later) -->
    <script>
        function handleGoogleLogin() {
            alert("Google login not implemented yet.");
        }
         function handleEmailLogin() {
             alert("Email signup not implemented yet.");
         }
        function handleFacebookLogin() {
            alert("Facebook login not implemented yet.");
         }
         
        // Password reveal functionality for password field
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
        
        // Password reveal functionality for confirm password field
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('confirm_password');
        
        toggleConfirmPassword.addEventListener('click', function() {
            // Toggle the type attribute
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            
            // Toggle the eye icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
     </script>
</body>
</html>
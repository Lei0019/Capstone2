<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - InfluenceX</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #4CAF50, #2196F3);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.2);
      padding: 35px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 420px;
      text-align: center;
      backdrop-filter: blur(12px);
    }

    .login-container:hover {
      transform: scale(1.02);
      transition: 0.3s ease-in-out;
    }

    .login-container h2 {
      color: #222;
      margin-bottom: 25px;
      font-weight: 600;
    }

    .logo {
      font-size: 2em;
      margin-bottom: 10px;
      color: #fff;
    }

    .input-group {
      position: relative;
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .input-group input {
      width: 100%;
      padding: 10px 35px 10px 12px;
      font-size: 1em;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .input-group i {
      position: absolute;
      right: 10px;
      top: 37px;
      cursor: pointer;
      color: #555;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: linear-gradient(to right, #2196F3, #4CAF50);
      color: white;
      font-size: 1.1em;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .btn:hover {
      background: linear-gradient(to right, #4CAF50, #2196F3);
    }

    .signup-link {
      margin-top: 15px;
      font-size: 0.9em;
    }

    .signup-link a {
      color: #2196F3;
      font-weight: bold;
      text-decoration: none;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }

    .error-message {
      color: red;
      font-size: 0.85em;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="logo"><i"></i></div>
    <h2>Welcome Back</h2>

    <form action="process.php" method="POST">
      <!-- Example error message -->
      <!-- <div class="error-message">Invalid email or password</div> -->

      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" />
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password" />
        <i class="fas fa-eye toggle-password" onclick="togglePassword()"></i>
      </div>

      <button type="submit" name="login" class="btn">Login</button>
    </form>

    <div class="signup-link">
      <p>Don't have an account? <a href="register.html">Sign up here</a></p>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.querySelector('.toggle-password');
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
      toggleIcon.classList.toggle('fa-eye-slash');
    }
  </script>
</body>
</html>

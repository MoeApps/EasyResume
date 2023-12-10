<<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            background-image: url('./images/loginbg.jpg'); /* Replace 'your-background-image.jpg' with the actual path to your background image */
      background-size: cover;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            color: #333333;
        }

        .form-group {
            margin-bottom: 25px;
            
        }


        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666666;
        }

        .form-group input {
            width: 100%;
            padding: 9px;
            border-radius: 5px;
            border: 1px solid #cccccc;
            background-color: #f8f8f8;
            color: #333333;
            transition: border-color 0.3s ease-in-out;
        }

        .form-group input:focus {
            outline: none;
            border-color: #6c63ff;
        }

        .form-group .error {
            color: red;
            font-size: 12px;
        }

        .form-group button {
            display: block;
            width: 100%;
            padding: 12px;
            border-radius: 5px;
            border: none;
            background-color: #6c63ff;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .form-group button:hover {
            background-color: #4f4bd9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form id="signupForm" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error" id="passwordError"></span>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
                <span class="error" id="confirmPasswordError"></span>
            </div>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="login.html">Login</a></p>

        </form>
    </div>

    <script>
        const signupForm = document.getElementById('signupForm');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
    
        passwordInput.addEventListener('keyup', validatePassword);
        confirmPasswordInput.addEventListener('keyup', validateConfirmPassword);
    
        signupForm.addEventListener('submit', function(event) {
            if (!isPasswordValid()) {
                event.preventDefault();
                passwordError.textContent = 'Password must be at least 8 characters long and contain at least one letter and one number.';
            }
    
            if (!doPasswordsMatch()) {
                event.preventDefault();
                confirmPasswordError.textContent = 'Passwords do not match.';
            }
        });
    
        function validatePassword() {
            const password = passwordInput.value;
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            
            if (passwordRegex.test(password)) {
                passwordError.textContent = '';
            } else {
                passwordError.textContent = 'Password must be at least 8 characters long and contain at least one letter and one number.';
            }
        }
    
        function validateConfirmPassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
    
            if (password === confirmPassword) {
                confirmPasswordError.textContent = '';
            } else {
                confirmPasswordError.textContent = 'Passwords do not match.';
            }
        }
    
        function isPasswordValid() {
            const password = passwordInput.value;
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            return passwordRegex.test(password);
        }
    
        function doPasswordsMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            return password === confirmPassword;
        }


        
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Server-side validation
    if (isPasswordValid()) {
        // Perform authentication (checking if the user exists in the database)
        $db = new mysqli('localhost', 'root', '', 'cv_maker');

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $existingUser = $result->fetch_assoc();
        $stmt->close();

        if ($existingUser) {
            echo 'Username already exists. Please choose another username.';
        } else {
            // Store user in the database
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashedPassword);
            $stmt->execute();
            $stmt->close();

            echo 'Registration successful!';
        }
    } else {
        echo 'Invalid password. Password must be at least 8 characters long and contain at least one letter and one number.';
    }
}

function isPasswordValid() {
    $password = $_POST['password'];
    $passwordRegex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
    return preg_match($passwordRegex, $password);
}


    </script>
    
</body>
</html>>
<?php
// You can leave PHP code here if needed
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Home</title>
    <style>
        /* Apply box-sizing globally to include padding and borders within width/height */
        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        form {
            width: 500px;
            height: 500px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            margin: 0 auto;
            
        }

        input {
            width: 100%;  /* Ensures input takes 100% of the parent container's width */
            padding: 10px 20px;
            margin-bottom: 10px;
        }

        button {
            width: 100%;  /* Ensures button takes 100% of the parent container's width */
            padding: 10px 20px;
        }

        label {
            font-weight: bold;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div>
        
        <form action="./_actions/login.php" method="post">
        <h1 class="h3 mb-3">Login</h1>

<?php if (isset($_GET["incorrect"])): ?>
    <div class="error-message">Incorrect Email or Password</div>
<?php endif; ?>

            <label for="email">Email</label><br>
            <input type="email" name="email" required placeholder="Enter your email"/><br>
            
            <label for="password">Password</label><br>
            <input type="password" name="password" required placeholder="Enter your password"/><br>
            
            <button type="submit">Log In</button>
        </form>
    </div>
</body>
</html>

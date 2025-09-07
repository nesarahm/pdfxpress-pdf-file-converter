<?php
// Start the session at the beginning of the file
session_start();

// Password configuration
$adminPassword = 'admin@admin'; // Change this to a secure password

// Check if the password was entered correctly
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $enteredPassword = $_POST['password'];
    if ($enteredPassword === $adminPassword) {
        $_SESSION['authenticated'] = true;
    } else {
        $message = 'Incorrect password.';
    }
}

// Check if the user is authenticated
if (!isset($_SESSION['authenticated'])) {
    // If not authenticated, show the password form
    echo '<div class="password-form">
            <form method="POST">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <input type="submit" value="Access">
            </form>
          </div>';
    exit; // Stop the script here if not authenticated
}

// Include the SEO configuration file
$seoConfig = include('confiseo/seo.php');
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    // Get the form values and perform basic validation
    $newTitle = htmlspecialchars($_POST['title']);
    $newDescription = htmlspecialchars($_POST['description']);
    $newKeywords = htmlspecialchars($_POST['keywords']);
    $newAuthor = htmlspecialchars($_POST['author']);
    $newRobots = htmlspecialchars($_POST['robots']);
    $newOgTitle = htmlspecialchars($_POST['og_title']);
    $newOgDescription = htmlspecialchars($_POST['og_description']);
    $newOgImage = htmlspecialchars($_POST['og_image']);
    $newTwitterTitle = htmlspecialchars($_POST['twitter_title']);
    $newTwitterDescription = htmlspecialchars($_POST['twitter_description']);
    $newTwitterImage = htmlspecialchars($_POST['twitter_image']);

    if (!empty($newTitle) && !empty($newDescription) && !empty($newKeywords)) {
        // Save the new values to the seo-config.php file
        $newSeoConfig = [
            'title' => $newTitle,
            'description' => $newDescription,
            'keywords' => $newKeywords,
            'author' => $newAuthor,
            'robots' => $newRobots,
            'og:title' => $newOgTitle,
            'og:description' => $newOgDescription,
            'og:image' => $newOgImage,
            'twitter:title' => $newTwitterTitle,
            'twitter:description' => $newTwitterDescription,
            'twitter:image' => $newTwitterImage,
        ];

        // Write the new values to the file
        if (file_put_contents('confiseo/seo.php', '<?php return ' . var_export($newSeoConfig, true) . ';')) {
            $message = 'Changes saved successfully!';
            $seoConfig = $newSeoConfig; // Update the config after saving
        } else {
            $message = 'Error saving changes. Please try again.';
        }
    } else {
        $message = 'All fields are required.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage SEO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .message {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        form {
            margin-top: 20px;
        }
        .password-form {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SEO Configuration</h1>

        <?php if (isset($message)): ?>
            <div class="message <?php echo isset($seoConfig) && $message === 'Changes saved successfully!' ? 'success' : 'error'; ?>">
                <strong><?php echo $message; ?></strong>
            </div>
        <?php endif; ?>

        <form action="seo.php" method="POST">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($seoConfig['title']); ?>" required><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($seoConfig['description']); ?></textarea><br><br>

            <label for="keywords">Keywords:</label><br>
            <input type="text" id="keywords" name="keywords" value="<?php echo htmlspecialchars($seoConfig['keywords']); ?>" required><br><br>

            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($seoConfig['author']); ?>"><br><br>

            <label for="robots">Robots:</label><br>
            <input type="text" id="robots" name="robots" value="<?php echo htmlspecialchars($seoConfig['robots']); ?>"><br><br>

            <label for="og_title">Open Graph Title:</label><br>
            <input type="text" id="og_title" name="og_title" value="<?php echo htmlspecialchars($seoConfig['og:title']); ?>"><br><br>

            <label for="og_description">Open Graph Description:</label><br>
            <input type="text" id="og_description" name="og_description" value="<?php echo htmlspecialchars($seoConfig['og:description']); ?>"><br><br>

            <label for="og_image">Open Graph Image:</label><br>
            <input type="text" id="og_image" name="og_image" value="<?php echo htmlspecialchars($seoConfig['og:image']); ?>"><br><br>

            <label for="twitter_title">Twitter Title:</label><br>
            <input type="text" id="twitter_title" name="twitter_title" value="<?php echo htmlspecialchars($seoConfig['twitter:title']); ?>"><br><br>

            <label for="twitter_description">Twitter Description:</label><br>
            <input type="text" id="twitter_description" name="twitter_description" value="<?php echo htmlspecialchars($seoConfig['twitter:description']); ?>"><br><br>

            <label for="twitter_image">Twitter Image:</label><br>
            <input type="text" id="twitter_image" name="twitter_image" value="<?php echo htmlspecialchars($seoConfig['twitter:image']); ?>"><br><br>

            <input type="submit" value="Save Changes">
        </form>

        <h2>Preview of Changes</h2>
        <p><strong>Title:</strong> <?php echo htmlspecialchars($seoConfig['title']); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($seoConfig['description']); ?></p>
        <p><strong>Keywords:</strong> <?php echo htmlspecialchars($seoConfig['keywords']); ?></p>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($seoConfig['author']); ?></p>
        <p><strong>Robots:</strong> <?php echo htmlspecialchars($seoConfig['robots']); ?></p>
        <p><strong>Open Graph Title:</strong> <?php echo htmlspecialchars($seoConfig['og:title']); ?></p>
        <p><strong>Open Graph Description:</strong> <?php echo htmlspecialchars($seoConfig['og:description']); ?></p>
        <p><strong>Open Graph Image:</strong> <?php echo htmlspecialchars($seoConfig['og:image']); ?></p>
        <p><strong>Twitter Title:</strong> <?php echo htmlspecialchars($seoConfig['twitter:title']); ?></p>
        <p><strong>Twitter Description:</strong> <?php echo htmlspecialchars($seoConfig['twitter:description']); ?></p>
        <p><strong>Twitter Image:</strong> <?php echo htmlspecialchars($seoConfig['twitter:image']); ?></p>
    </div>
</body>
</html>

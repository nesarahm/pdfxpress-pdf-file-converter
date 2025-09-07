<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Generated</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">PDF Converter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#formats">Formats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#faq">FAQ</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="alert alert-success text-center">
            <h1>PDF Generated Successfully!</h1>
            <p>Your file has been converted and is ready to download.</p>
            <?php
            if (isset($_GET['file'])) {
                $file = htmlspecialchars($_GET['file']);
                echo '<a href="' . $file . '" class="btn btn-primary btn-lg" target="_blank">Download PDF</a>
                <a href="index.php" class="btn btn-primary btn-lg" target="_blank">Home</a>';
            } else {
                echo '<p class="text-danger">Error: File not found.</p>';
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

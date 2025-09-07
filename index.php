<?php
// Include the SEO configuration file
$seoConfig = include('confiseo/seo.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Dynamic title from the SEO config file -->
    <title><?php echo htmlspecialchars($seoConfig['title']); ?></title>

    <!-- Dynamic meta description from the SEO config file -->
    <meta name="description" content="<?php echo htmlspecialchars($seoConfig['description']); ?>">

    <!-- Dynamic keywords from the SEO config file -->
    <meta name="keywords" content="<?php echo htmlspecialchars($seoConfig['keywords']); ?>">

    <!-- Dynamic author from the SEO config file -->
    <meta name="author" content="<?php echo htmlspecialchars($seoConfig['author']); ?>">

    <!-- Meta robots for search engines -->
    <meta name="robots" content="<?php echo htmlspecialchars($seoConfig['robots']); ?>">

    <!-- Open Graph for social media -->
    <meta property="og:title" content="<?php echo htmlspecialchars($seoConfig['og:title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($seoConfig['og:description']); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($seoConfig['og:image']); ?>">

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="<?php echo htmlspecialchars($seoConfig['twitter:title']); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($seoConfig['twitter:description']); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($seoConfig['twitter:image']); ?>">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
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
                        <a class="nav-link active" aria-current="page" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#formats">Formats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="hero" class="hero-section">
            <h1 class="text-center">Convert Your Files to PDF</h1>
        <p class="text-center">Upload your file and convert it to PDF quickly and easily with our secure and efficient system.</p>
        <div class="circle-container">
            <div>

                <h2 class="mb-4">Convert Your File to PDF</h2>
                <form action="convert.php" method="post" enctype="multipart/form-data">
                    <label for="fileToUpload" class="file-label">Select Your File</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="file-input" required>
                    <button type="submit" class="upload-btn mt-3">Convert to PDF</button>
                </form>
            </div>
        </div>
    </div>
<section id="about" class="py-5 bg-light">
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h2 class="display-4 text-primary">About Our PDF System</h2>
        <p class="lead text-muted">We provide a reliable, secure, and easy-to-use PDF conversion platform for all your document needs.</p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 rounded">
          <img src="images/3.png" class="card-img-top" alt="Secure Conversion">
          <div class="card-body">
            <h5 class="card-title">Secure Conversion</h5>
            <p class="card-text">Your files are processed securely and deleted immediately after conversion to ensure your privacy.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 rounded">
          <img src="images/4.png" class="card-img-top" alt="Wide Format Support">
          <div class="card-body">
            <h5 class="card-title">Wide Format Support</h5>
            <p class="card-text">We support multiple file types, including Word, Excel, PowerPoint, and image formats like JPG and PNG.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 rounded">
          <img src="images/5.png" class="card-img-top" alt="Fast and Free">
          <div class="card-body">
            <h5 class="card-title">Fast and Free</h5>
            <p class="card-text">Enjoy quick conversions without any cost or hidden fees, perfect for personal or professional use.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <div class="container my-5">
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-file-earmark-text display-4 text-primary"></i>
          <h5 class="card-title mt-3">Free to Use</h5>
          <p class="card-text text-muted">Convert files to PDF at no cost, anytime, anywhere.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-shield-lock display-4 text-success"></i>
          <h5 class="card-title mt-3">Secure & Private</h5>
          <p class="card-text text-muted">Your files are deleted from our servers after conversion.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <i class="bi bi-lightning-charge display-4 text-warning"></i>
          <h5 class="card-title mt-3">Fast Conversion</h5>
          <p class="card-text text-muted">Experience lightning-fast file conversions with no delays.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container my-5">
  <div class="row align-items-center">
    <div class="col-md-6">
      <img src="images/1.png" class="img-fluid rounded" alt="About Our System">
    </div>
    <div class="col-md-6">
      <h2 class="text-primary">About Our System</h2>
      <p class="text-muted">
        Our PDF conversion system is designed to provide you with a fast, secure, and seamless experience. Whether you're converting documents, images, or presentations, our platform ensures top-quality results every time. 
      </p>
      <ul class="list-unstyled">
        <li><i class="bi bi-check-circle text-success"></i> Easy-to-use interface for all users.</li>
        <li><i class="bi bi-check-circle text-success"></i> Supports a wide range of file formats.</li>
        <li><i class="bi bi-check-circle text-success"></i> 100% free with no hidden fees.</li>
      </ul>
      <button class="btn btn-primary mt-3">Learn More</button>
    </div>
  </div>
</div>

<div class="container my-5">
  <h2 class="text-center text-primary mb-4">How It Works</h2>
  <div class="row align-items-center">
    <div class="col-md-6">
      <img src="images/2.png" class="img-fluid rounded" alt="How it works">
    </div>
    <div class="col-md-6">
      <ol class="list-group list-group-numbered">
        <li class="list-group-item">Upload your file (Word, Image, or more).</li>
        <li class="list-group-item">Click "Convert" and download your PDF instantly!</li>
      </ol>
    </div>
  </div>
</div>
<div id="formats" class="container my-5">
  <h2 class="text-center text-primary mb-4">Supported Formats</h2>
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="card-title">Document Formats</h5>
          <ul class="list-unstyled text-muted">
            <li><i class="bi bi-file-earmark-word"></i> Microsoft Word (.docx, .doc)</li>
           
           
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card shadow-sm border-0">
        <div class="card-body">
          <h5 class="card-title">Image Formats</h5>
          <ul class="list-unstyled text-muted">
            <li><i class="bi bi-image"></i> JPEG (.jpg, .jpeg)</li>
            <li><i class="bi bi-image"></i> PNG (.png)</li>
            <li><i class="bi bi-image"></i> GIF (.gif)</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg-light py-5">
  <div class="container">
    <h2 class="text-center text-primary mb-4">Why Choose Us?</h2>
    <div class="row">
      <div class="col-md-4 text-center">
        <i class="bi bi-cloud-upload display-4 text-info"></i>
        <h5 class="mt-3">Cloud-Based</h5>
        <p class="text-muted">No installations required, just upload and convert.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="bi bi-speedometer2 display-4 text-success"></i>
        <h5 class="mt-3">Optimized for Speed</h5>
        <p class="text-muted">Quick processing, even for large files.</p>
      </div>
      <div class="col-md-4 text-center">
        <i class="bi bi-globe display-4 text-warning"></i>
        <h5 class="mt-3">Accessible Worldwide</h5>
        <p class="text-muted">Convert files from any device with an internet connection.</p>
      </div>
    </div>
  </div>
</div>



<div id="faq" class="container my-5">
  <h2 class="text-center text-primary mb-4">Frequently Asked Questions</h2>
  <div class="accordion" id="faqAccordion">
    <div class="accordion-item">
      <h2 class="accordion-header" id="faq1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
          Is the conversion process secure?
        </button>
      </h2>
      <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Yes, your files are securely processed and deleted from our servers immediately after conversion.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="faq2">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
          What file formats are supported?
        </button>
      </h2>
      <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          We support Microsoft Word (.docx, .doc), and image formats like .jpg, .png, .gif, and more.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="faq3">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
          Is there a file size limit for uploads?
        </button>
      </h2>
      <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Yes, the maximum file size is 50MB per upload. For larger files, please contact support.
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="faq4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
          Can I convert multiple files at once?
        </button>
      </h2>
      <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
        <div class="accordion-body">
          Currently, we only support single-file uploads, but batch conversion is coming soon!
        </div>
      </div>
    </div>
  </div>
</div>

   


    <!-- Footer -->
    <div class="footer">
        &copy; 2025 PDF Converter. All rights reserved.
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

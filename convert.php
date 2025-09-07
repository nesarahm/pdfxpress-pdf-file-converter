<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES['fileToUpload']['name']);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if ($_FILES['fileToUpload']['size'] > 5000000) {
        header('Location: error.php?message=The file is too large. Maximum 5MB.');
        exit();
    }

    if (!in_array($fileType, ["jpg", "png", "jpeg", "gif", "docx", "xlsx"])) {
        header('Location: error.php?message=File type not allowed.');
        exit();
    }

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile)) {
        $outputFile = convertToPDF($targetFile);
        header('Location: success.php?file=' . urlencode($outputFile));
        exit();
    } else {
        header('Location: error.php');
        exit();
    }
}

function convertToPDF($file) {
    require('fpdf/fpdf.php');
    require('phpword/src/PhpWord/Autoloader.php');
    \PhpOffice\PhpWord\Autoloader::register();

    $pdf = new FPDF();
    $pdf->AddPage();
    $fileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $pdf->Image($file, 10, 10, 180);
    } elseif ($fileType == 'docx') {
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($file);
        $pdf->SetFont('Arial', '', 12);

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getText')) {
                    $pdf->MultiCell(0, 10, $element->getText());
                }
            }
        }
    }

    $outputFile = 'uploads/' . pathinfo($file, PATHINFO_FILENAME) . '.pdf';
    $pdf->Output('F', $outputFile);
    return $outputFile;
}
?>

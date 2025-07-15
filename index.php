<?php
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Picqer\Barcode\BarcodeGeneratorPNG;

function generateCode($type, $text)
{
    header('Content-Type: image/png');

    if ($type === 'qr') {
        $qr = QrCode::create($text);
        $writer = new PngWriter();
        $result = $writer->write($qr);
        echo $result->getString();
    } else {
        $generator = new BarcodeGeneratorPNG();
        echo $generator->getBarcode($text, $generator::TYPE_CODE_128);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'] ?? 'barcode';
    $text = $_POST['text'] ?? 'DefaultText';
    generateCode($type, $text);
}
?>


<!-- HTML Form UI -->
<!DOCTYPE html>
<html>

<head>
    <title>Generate Barcode / QR Code</title>
</head>

<body>
    <h2>Generate Barcode atau QR Code</h2>
    <form method="POST">
        <label>Teks:</label><br>
        <input type="text" name="text" required><br><br>

        <label>Tipe Kode:</label><br>
        <select name="type">
            <option value="barcode">Barcode</option>
            <option value="qr">QR Code</option>
        </select><br><br>

        <button type="submit">Generate</button>
    </form>

    <?php
    // Saat form disubmit, tampilkan hasil
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text']) && !empty($_POST['type'])) {
        $text = urlencode($_POST['text']);
        $type = $_POST['type'];
        echo "<h3>Hasil:</h3>";
        echo "<img src='?generate=1&text={$text}&type={$type}' alt='Generated Code'>";
    }
    ?>
</body>

</html>
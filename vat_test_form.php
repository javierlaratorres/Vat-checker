
<?php
require_once 'VatValidator.php';
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vatInput = $_POST['vat'];
    $validator = new VatValidator($vatInput);

    $result = "<p><strong>Status:</strong> {$validator->status}<br>" .
              "<strong>VAT:</strong> {$validator->correctedVat}<br>" .
              "<strong>Message:</strong> {$validator->message}</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test VAT Number</title>
</head>
<body>
    <h2>Test a VAT Number</h2>
    <form method="post">
        <input type="text" name="vat" placeholder="Enter VAT number" required>
        <button type="submit">Validate</button>
    </form>
    <hr>
    <?php echo $result; ?>
    <br><a href="index.php">← Back to main</a>
</body>
</html>

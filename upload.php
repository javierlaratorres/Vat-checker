
<?php
require_once 'VatValidator.php';

$csv = fopen("italian_vat_numbers.csv", "r");
$valid = fopen("results/valid.csv", "w");
$corrected = fopen("results/corrected.csv", "w");
$invalid = fopen("results/invalid.csv", "w");

while (($row = fgetcsv($csv)) !== false) {
    $vat = $row[0];
    $validator = new VatValidator($vat);

    switch ($validator->status) {
        case 'valid':
            fputcsv($valid, [$validator->correctedVat]);
            break;
        case 'corrected':
            fputcsv($corrected, [$validator->correctedVat, 'Prefix added: IT']);
            break;
        case 'invalid':
            fputcsv($invalid, [$vat, 'Invalid format']);
            break;
    }
}

fclose($csv);
fclose($valid);
fclose($corrected);
fclose($invalid);

header("Location: templates/results.html");
exit;
?>

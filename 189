
<?php
class VatValidator {
    private $rawVat;
    public $status;
    public $correctedVat;
    public $message;

    public function __construct($vat) {
        $this->rawVat = trim($vat);
        $this->validate();
    }

    private function validate() {
        if (preg_match('/^IT\d{11}$/', $this->rawVat)) {
            $this->status = 'valid';
            $this->correctedVat = $this->rawVat;
            $this->message = 'Valid VAT number';
        } elseif (preg_match('/^\d{11}$/', $this->rawVat)) {
            $this->status = 'corrected';
            $this->correctedVat = 'IT' . $this->rawVat;
            $this->message = 'Corrected by adding IT prefix';
        } else {
            $this->status = 'invalid';
            $this->correctedVat = $this->rawVat;
            $this->message = 'Invalid VAT number';
        }
    }
}
?>

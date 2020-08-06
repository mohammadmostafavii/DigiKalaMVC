<?php

class Payment
{

    private $zarinPalMerchantID = zarinPalMerchantID;
    private $CallbackURL = CallbackURL;

    function __construct()
    {
        require('public/nusoap/nusoap.php');
    }

    function zarinPalRequest($Amount, $Description, $Email, $Mobile)
    {
        $client = new nusoap_client(zarinPalWebAddress, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $params = [
            'MerchantID' => $this->zarinPalMerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $this->CallbackURL,
        ];
        $result = $client->call('PaymentRequest', $params);
        $Status = $result['Status'];
        $Authority = '';
        $Error = '';
        if ($Status != 100) {
            $errorArray = unserialize(zarinPalErrors);
            $Error = $errorArray[$Status];
        }
        if ($Status == 100) {
            $Authority = $result['Authority'];
        }

        $array = ['Status' => $Status, 'Authority' => $Authority, 'Error' => $Error];
        return $array;
    }

    function zarinPalVerify($Amount, $Authority)
    {
        $client = new nusoap_client(zarinPalWebAddress, 'wsdl');
        $client->soap_defencoding = 'UTF-8';
        $result = $client->call('PaymentVerification',
            [
                'MerchantID' => $this->zarinPalMerchantID,
                'Amount' => $Amount,
                'Authority' => $Authority
            ]);
        $Status = $result['Status'];
        $Error = '';
        $RefID = '';
        if ($Status != 100) {
            $errorArray = unserialize(zarinPalErrors);
            $Error = $errorArray[$Status];
        }
        if ($Status == 100) {
            $RefID = $result['RefID'];
        }

        $array = ['Status' => $Status, 'Error' => $Error, 'RefID' => $RefID];
        return $array;

    }

}
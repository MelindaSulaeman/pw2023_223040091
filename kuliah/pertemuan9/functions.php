<?php 
    define('BASE_URL', '/pw2023_223040091/kuliah/pertemuan9/');

    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        die();
    }

    function uriIs($Suri) {
        return ($_SERVER["REQUEST_URI"] === BASE_URL . $Suri ) ? 'active': '';
    }
?>
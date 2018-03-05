<?php
namespace App\Service\ImportExport;

interface ContactImporter
{

    /**
     * Imports a file of contacts to an account.
     *
     * @param string $temp_file
     * @param integer $id_account
     */
    function import($temp_file, $id_account);
}


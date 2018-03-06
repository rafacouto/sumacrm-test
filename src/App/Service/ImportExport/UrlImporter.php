<?php
namespace App\Service\ImportExport;

use App\Service\ImportExport\Csv\CsvContactImporter;
use GuzzleHttp\Client;

class UrlImporter
{

    public function importCsvContacts($url, $id_account)
    {
        // download
        $temp_file = tempnam(sys_get_temp_dir(), uniqid());
        $this->downloadFile($url, $temp_file);

        // import
        $csv_import = new CsvContactImporter();
        $csv_import->import($temp_file, $id_account);

        // delete the temporary file
        unlink($temp_file);
    }

    protected function downloadFile($url, $localFilePath)
    {
        $client = new Client();
        $response = $client->send($client->get($url));
        if ($response->getBody()->isReadable()) {
            if ($response->getStatusCode() == 200) {
                file_put_contents($localFilePath, $response->getBody()->getStream());
            }
        }
    }
}


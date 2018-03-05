<?php
namespace Service\ImportExport;

use GuzzleHttp\Client;
use Service\ImportExport\Csv\CsvContactImporter;

class UrlImporter
{

    public function __construct()
    {
    }

    public function importCsvContacts($url)
    {
        // download
        $temp_file = tempnam(sys_get_temp_dir(), uniqid());
        ;
        $this->downloadFile($url, $temp_file);

        $csv_import = new CsvContactImporter();
    }

    public function downloadFile($url, $localFilePath)
    {
        // TODO process line by l
        $client = new Client();
        $response = $client->send($client->get($url));
        if ($response->getBody()->isReadable()) {
            if ($response->getStatusCode() == 200) {
                file_put_contents($localFilePath, $response->getBody()->getStream());
            }
        }
    }
}


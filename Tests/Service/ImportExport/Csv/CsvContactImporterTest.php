<?php
use PHPUnit\Framework\TestCase;
use Service\ImportExport\Csv\CsvContactImporter;
use Tests\Repository\MockContactsRepository;

require_once 'Service/ImportExport/Csv/CsvContactImporter.php';

/**
 * CsvContactImporter test case.
 */
class CsvContactImporterTest extends TestCase
{

    /**
     *
     * @var CsvContactImporter
     */
    private $csvContactImporter;

    /**
     *
     * @var MockContactsRepository
     */
    private $contactsRepository;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->contactsRepository = new MockContactsRepository();
        $this->csvContactImporter = new CsvContactImporter($this->contactsRepository);
    }

    /**
     * Tests CsvContactImporter->import()
     */
    public function testImport()
    {
        $file = dirname(__DIR__) . '/../../../resources/mock/contacts_import_01.csv';
        $id_account = 1;

        // 2 contacts in file
        $this->csvContactImporter->import($file, $id_account);
        $this->assertSame(2, $this->contactsRepository->count());

        // contact data was imported
        $email = 'rafa@aplicacionesyredes.com';
        $contact = $this->contactsRepository->get($id_account, $email);
        $this->assertSame($email, $contact->getEmail());
    }
}


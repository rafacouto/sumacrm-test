<?php
namespace Tests\Service\ImportExport\Csv;

use App\Service\ImportExport\Csv\CsvContactImporter;
use PHPUnit\Framework\TestCase;
use Tests\Repository\MockContactsRepository;

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
        $file = dirname(__DIR__) . '/../../../../resources/mock/contacts_import_01.csv';
        $id_account = 1;

        // 2 contacts in file
        $this->csvContactImporter->import($file, $id_account);
        $this->assertSame(2, $this->contactsRepository->count());

        // first sample in the mock CSV file
        $test_contact = [
            'email' => 'rafa@aplicacionesyredes.com',
            'firstname' => 'Rafa',
            'lastname' => 'Couto',
            'phone' => '656123123'
        ];

        // contact exists
        $contact = $this->contactsRepository->findByEmail($test_contact['email']);
        $this->assertNotFalse($contact);

        // contact data was imported
        $this->assertSame($test_contact['email'], $contact->getEmail());
        $this->assertSame($test_contact['firstname'], $contact->getFirstname());
        $this->assertSame($test_contact['lastname'], $contact->getLastname());
        $this->assertSame($test_contact['phone'], $contact->getPhone());
    }
}


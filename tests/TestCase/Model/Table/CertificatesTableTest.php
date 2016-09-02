<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CertificatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CertificatesTable Test Case
 */
class CertificatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CertificatesTable
     */
    public $Certificates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.certificates',
        'app.trainers',
        'app.users',
        'app.cities',
        'app.states',
        'app.specialties',
        'app.trainers_specialties',
        'app.social_medias',
        'app.telephones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Certificates') ? [] : ['className' => 'App\Model\Table\CertificatesTable'];
        $this->Certificates = TableRegistry::get('Certificates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Certificates);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

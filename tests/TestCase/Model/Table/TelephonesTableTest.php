<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TelephonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TelephonesTable Test Case
 */
class TelephonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TelephonesTable
     */
    public $Telephones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.telephones',
        'app.trainers',
        'app.users',
        'app.cities',
        'app.states',
        'app.specialties',
        'app.trainers_specialties',
        'app.social_medias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Telephones') ? [] : ['className' => 'App\Model\Table\TelephonesTable'];
        $this->Telephones = TableRegistry::get('Telephones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Telephones);

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

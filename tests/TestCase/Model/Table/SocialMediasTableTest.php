<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SocialMediasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SocialMediasTable Test Case
 */
class SocialMediasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SocialMediasTable
     */
    public $SocialMedias;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.social_medias',
        'app.trainers',
        'app.users',
        'app.cities',
        'app.states',
        'app.specialties',
        'app.trainers_specialties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SocialMedias') ? [] : ['className' => 'App\Model\Table\SocialMediasTable'];
        $this->SocialMedias = TableRegistry::get('SocialMedias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SocialMedias);

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

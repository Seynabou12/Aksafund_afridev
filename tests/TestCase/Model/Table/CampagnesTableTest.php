<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CampagnesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CampagnesTable Test Case
 */
class CampagnesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CampagnesTable
     */
    public $Campagnes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Campagnes',
        'app.Categorys',
        'app.Users',
        'app.Fichiers',
        'app.Participations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Campagnes') ? [] : ['className' => CampagnesTable::class];
        $this->Campagnes = TableRegistry::getTableLocator()->get('Campagnes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Campagnes);

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

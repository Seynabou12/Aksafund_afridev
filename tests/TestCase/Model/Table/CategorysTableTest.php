<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorysTable Test Case
 */
class CategorysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorysTable
     */
    public $Categorys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Categorys',
        'app.Typecategorys',
        'app.Campagnes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Categorys') ? [] : ['className' => CategorysTable::class];
        $this->Categorys = TableRegistry::getTableLocator()->get('Categorys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categorys);

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

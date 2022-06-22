<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypecategorysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypecategorysTable Test Case
 */
class TypecategorysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypecategorysTable
     */
    public $Typecategorys;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Typecategorys'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Typecategorys') ? [] : ['className' => TypecategorysTable::class];
        $this->Typecategorys = TableRegistry::getTableLocator()->get('Typecategorys', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Typecategorys);

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
}

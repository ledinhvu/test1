<?php

use App\Models\menus;
use App\Repositories\menusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class menusRepositoryTest extends TestCase
{
    use MakemenusTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var menusRepository
     */
    protected $menusRepo;

    public function setUp()
    {
        parent::setUp();
        $this->menusRepo = App::make(menusRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatemenus()
    {
        $menus = $this->fakemenusData();
        $createdmenus = $this->menusRepo->create($menus);
        $createdmenus = $createdmenus->toArray();
        $this->assertArrayHasKey('id', $createdmenus);
        $this->assertNotNull($createdmenus['id'], 'Created menus must have id specified');
        $this->assertNotNull(menus::find($createdmenus['id']), 'menus with given id must be in DB');
        $this->assertModelData($menus, $createdmenus);
    }

    /**
     * @test read
     */
    public function testReadmenus()
    {
        $menus = $this->makemenus();
        $dbmenus = $this->menusRepo->find($menus->id);
        $dbmenus = $dbmenus->toArray();
        $this->assertModelData($menus->toArray(), $dbmenus);
    }

    /**
     * @test update
     */
    public function testUpdatemenus()
    {
        $menus = $this->makemenus();
        $fakemenus = $this->fakemenusData();
        $updatedmenus = $this->menusRepo->update($fakemenus, $menus->id);
        $this->assertModelData($fakemenus, $updatedmenus->toArray());
        $dbmenus = $this->menusRepo->find($menus->id);
        $this->assertModelData($fakemenus, $dbmenus->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletemenus()
    {
        $menus = $this->makemenus();
        $resp = $this->menusRepo->delete($menus->id);
        $this->assertTrue($resp);
        $this->assertNull(menus::find($menus->id), 'menus should not exist in DB');
    }
}

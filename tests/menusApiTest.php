<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class menusApiTest extends TestCase
{
    use MakemenusTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatemenus()
    {
        $menus = $this->fakemenusData();
        $this->json('POST', '/api/v1/menuses', $menus);

        $this->assertApiResponse($menus);
    }

    /**
     * @test
     */
    public function testReadmenus()
    {
        $menus = $this->makemenus();
        $this->json('GET', '/api/v1/menuses/'.$menus->id);

        $this->assertApiResponse($menus->toArray());
    }

    /**
     * @test
     */
    public function testUpdatemenus()
    {
        $menus = $this->makemenus();
        $editedmenus = $this->fakemenusData();

        $this->json('PUT', '/api/v1/menuses/'.$menus->id, $editedmenus);

        $this->assertApiResponse($editedmenus);
    }

    /**
     * @test
     */
    public function testDeletemenus()
    {
        $menus = $this->makemenus();
        $this->json('DELETE', '/api/v1/menuses/'.$menus->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/menuses/'.$menus->id);

        $this->assertResponseStatus(404);
    }
}

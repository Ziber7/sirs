<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dokumen_RS;

class Dokumen_RSApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dokumen__rs', $dokumenRS
        );

        $this->assertApiResponse($dokumenRS);
    }

    /**
     * @test
     */
    public function test_read_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dokumen__rs/'.$dokumenRS->id
        );

        $this->assertApiResponse($dokumenRS->toArray());
    }

    /**
     * @test
     */
    public function test_update_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->create();
        $editedDokumen_RS = Dokumen_RS::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dokumen__rs/'.$dokumenRS->id,
            $editedDokumen_RS
        );

        $this->assertApiResponse($editedDokumen_RS);
    }

    /**
     * @test
     */
    public function test_delete_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dokumen__rs/'.$dokumenRS->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dokumen__rs/'.$dokumenRS->id
        );

        $this->response->assertStatus(404);
    }
}

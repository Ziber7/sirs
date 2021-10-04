<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ruang;

class RuangApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ruang()
    {
        $ruang = Ruang::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ruangs', $ruang
        );

        $this->assertApiResponse($ruang);
    }

    /**
     * @test
     */
    public function test_read_ruang()
    {
        $ruang = Ruang::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ruangs/'.$ruang->id
        );

        $this->assertApiResponse($ruang->toArray());
    }

    /**
     * @test
     */
    public function test_update_ruang()
    {
        $ruang = Ruang::factory()->create();
        $editedRuang = Ruang::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ruangs/'.$ruang->id,
            $editedRuang
        );

        $this->assertApiResponse($editedRuang);
    }

    /**
     * @test
     */
    public function test_delete_ruang()
    {
        $ruang = Ruang::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ruangs/'.$ruang->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ruangs/'.$ruang->id
        );

        $this->response->assertStatus(404);
    }
}

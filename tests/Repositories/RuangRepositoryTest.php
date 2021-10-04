<?php namespace Tests\Repositories;

use App\Models\Ruang;
use App\Repositories\RuangRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RuangRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RuangRepository
     */
    protected $ruangRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ruangRepo = \App::make(RuangRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ruang()
    {
        $ruang = Ruang::factory()->make()->toArray();

        $createdRuang = $this->ruangRepo->create($ruang);

        $createdRuang = $createdRuang->toArray();
        $this->assertArrayHasKey('id', $createdRuang);
        $this->assertNotNull($createdRuang['id'], 'Created Ruang must have id specified');
        $this->assertNotNull(Ruang::find($createdRuang['id']), 'Ruang with given id must be in DB');
        $this->assertModelData($ruang, $createdRuang);
    }

    /**
     * @test read
     */
    public function test_read_ruang()
    {
        $ruang = Ruang::factory()->create();

        $dbRuang = $this->ruangRepo->find($ruang->id);

        $dbRuang = $dbRuang->toArray();
        $this->assertModelData($ruang->toArray(), $dbRuang);
    }

    /**
     * @test update
     */
    public function test_update_ruang()
    {
        $ruang = Ruang::factory()->create();
        $fakeRuang = Ruang::factory()->make()->toArray();

        $updatedRuang = $this->ruangRepo->update($fakeRuang, $ruang->id);

        $this->assertModelData($fakeRuang, $updatedRuang->toArray());
        $dbRuang = $this->ruangRepo->find($ruang->id);
        $this->assertModelData($fakeRuang, $dbRuang->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ruang()
    {
        $ruang = Ruang::factory()->create();

        $resp = $this->ruangRepo->delete($ruang->id);

        $this->assertTrue($resp);
        $this->assertNull(Ruang::find($ruang->id), 'Ruang should not exist in DB');
    }
}

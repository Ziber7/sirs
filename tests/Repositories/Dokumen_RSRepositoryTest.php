<?php namespace Tests\Repositories;

use App\Models\Dokumen_RS;
use App\Repositories\Dokumen_RSRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class Dokumen_RSRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var Dokumen_RSRepository
     */
    protected $dokumenRSRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dokumenRSRepo = \App::make(Dokumen_RSRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->make()->toArray();

        $createdDokumen_RS = $this->dokumenRSRepo->create($dokumenRS);

        $createdDokumen_RS = $createdDokumen_RS->toArray();
        $this->assertArrayHasKey('id', $createdDokumen_RS);
        $this->assertNotNull($createdDokumen_RS['id'], 'Created Dokumen_RS must have id specified');
        $this->assertNotNull(Dokumen_RS::find($createdDokumen_RS['id']), 'Dokumen_RS with given id must be in DB');
        $this->assertModelData($dokumenRS, $createdDokumen_RS);
    }

    /**
     * @test read
     */
    public function test_read_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->create();

        $dbDokumen_RS = $this->dokumenRSRepo->find($dokumenRS->id);

        $dbDokumen_RS = $dbDokumen_RS->toArray();
        $this->assertModelData($dokumenRS->toArray(), $dbDokumen_RS);
    }

    /**
     * @test update
     */
    public function test_update_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->create();
        $fakeDokumen_RS = Dokumen_RS::factory()->make()->toArray();

        $updatedDokumen_RS = $this->dokumenRSRepo->update($fakeDokumen_RS, $dokumenRS->id);

        $this->assertModelData($fakeDokumen_RS, $updatedDokumen_RS->toArray());
        $dbDokumen_RS = $this->dokumenRSRepo->find($dokumenRS->id);
        $this->assertModelData($fakeDokumen_RS, $dbDokumen_RS->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dokumen__r_s()
    {
        $dokumenRS = Dokumen_RS::factory()->create();

        $resp = $this->dokumenRSRepo->delete($dokumenRS->id);

        $this->assertTrue($resp);
        $this->assertNull(Dokumen_RS::find($dokumenRS->id), 'Dokumen_RS should not exist in DB');
    }
}

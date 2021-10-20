<?php

namespace App\Repositories;

use App\Models\Dokumen_RS;
use App\Repositories\BaseRepository;

/**
 * Class Dokumen_RSRepository
 * @package App\Repositories
 * @version October 20, 2021, 3:50 pm UTC
*/

class Dokumen_RSRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor',
        'nama',
        'deskripsi',
        'file'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Dokumen_RS::class;
    }
}

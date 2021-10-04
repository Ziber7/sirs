<?php

namespace App\Repositories;

use App\Models\Ruang;
use App\Repositories\BaseRepository;

/**
 * Class RuangRepository
 * @package App\Repositories
 * @version October 4, 2021, 11:07 am UTC
*/

class RuangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode_ruang',
        'nama_ruang',
        'jenis_ruang',
        'keterangan'
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
        return Ruang::class;
    }
}

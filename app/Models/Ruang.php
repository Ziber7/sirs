<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ruang
 * @package App\Models
 * @version October 4, 2021, 11:07 am UTC
 *
 * @property string $kode_ruang
 * @property string $nama_ruang
 * @property string $jenis_ruang
 * @property string $keterangan
 */
class Ruang extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ruangs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'kode_ruang',
        'nama_ruang',
        'jenis_ruang',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'kode_ruang' => 'string',
        'nama_ruang' => 'string',
        'jenis_ruang' => 'string',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kode_ruang' => 'required',
        'nama_ruang' => 'required',
        'jenis_ruang' => 'required',
        'keterangan' => 'required'
    ];

    
}

<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dokumen_RS
 * @package App\Models
 * @version October 20, 2021, 3:50 pm UTC
 *
 * @property string $nomor
 * @property string $nama
 * @property string $deskripsi
 * @property string $file
 */
class Dokumen_RS extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dokumen__rs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nomor',
        'nama',
        'deskripsi',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomor' => 'string',
        'nama' => 'string',
        'deskripsi' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'file' => 'required'
    ];

    
}

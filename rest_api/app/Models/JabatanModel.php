<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class JabatanModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_jabatan_pegawai';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_jabatan',
    ];

}
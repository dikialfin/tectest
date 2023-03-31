<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class KontrakModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_kontrak';

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
        'id_pegawai', 
        'join_date',
        'end_date',
    ];

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $primaryKey = 'id_ruangan';

    protected $table = 'ruangan';

    protected $fillable = ['jurusan_id','nama_ruangan'];

     public function jurusan(){

    	return $this->belongsTo('App\Jurusan','jurusan_id','id_jurusan');
    }
}

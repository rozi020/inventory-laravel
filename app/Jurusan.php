<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{

	protected $primaryKey = 'id_jurusan';
	
    protected $table = 'jurusan';

    protected $fillable = ['id_fakultas','nama_jurusan'];

    public function fakultas(){

    	return $this->belongsTo('App\Fakultas','id_fakultas','id');
    }


}



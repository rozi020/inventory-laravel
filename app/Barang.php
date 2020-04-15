<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'id_barang';

     protected $table = 'barang';

     protected $fillable = ['ruangan_id','nama_barang','total','broken','created_by','updated_by'];

     public function ruangan(){

    	return $this->belongsTo('App\Ruangan','ruangan_id','id_ruangan');
    }

    public function users(){
    	return $this->belongsTo('App\User','created_by','id');
    }

}

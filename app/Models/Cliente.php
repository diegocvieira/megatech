<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'clientes';
    protected $fillable = ['nome', 'fone'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function servicos()
    {
        return $this->hasMany('App\Models\Servico');
    }
}

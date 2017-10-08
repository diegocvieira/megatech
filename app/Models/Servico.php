<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'servicos';
    protected $fillable = ['valor', 'descricao', 'cliente_id', 'data_fechamento'];
    protected $dates = ['created_at', 'updated_at', 'data_fechamento'];
    public $timestamps = true;

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function scopeCliente($servicos, $filtro)
    {
        if($filtro != '')
            return $servicos->where('cliente_id', $filtro);
    }

    public function scopeStatus($servicos, $filtro)
    {
        if($filtro != '')
        {
            if($filtro == 1)
                return $servicos->where('data_fechamento', null);

            else
            return $servicos->where('data_fechamento', '!=', null);
        }
    }
}

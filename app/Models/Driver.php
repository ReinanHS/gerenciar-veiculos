<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable = [
        'nome', 'rg', 'cpf', 'cnh', 'validadeCNH', 'status'
    ];

    protected $dates = [
        'validadeCNH',
    ];

    protected $appends = [
      'sobrenome',
    ];

    /**
     * Função para definir o nome
     *
     * @param string $value
     * @return void
     */
    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = mb_convert_case($value,MB_CASE_TITLE,'UTF-8');
    }

    /**
     * Função para pegar o avatar
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        return $this->attributes['avatar'] ? $this->attributes['avatar'] : "https://avatars.dicebear.com/api/avataaars/{$this->nome}.svg";
    }

    /**
     * Função para pegar o primeiro nome
     *
     * @return string
     */
    public function getNomeAttribute()
    {
        $nome = explode(' ', $this->attributes['nome']);
        return sizeof($nome) > 0 ? $nome[0] : $this->attributes['nome'];
    }

    /**
     * Função para pegar o sobrenome
     *
     * @return string
     */
    public function getSobrenomeAttribute()
    {
        $nome = explode(' ', $this->attributes['nome']);
        return sizeof($nome) > 0 ? $nome[1] : '';
    }
}

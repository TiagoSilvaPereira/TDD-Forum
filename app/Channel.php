<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{   
    // Este método retorna o field padrão que será utilizado no binding parâmetro/model da rota
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}

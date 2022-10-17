<?php

namespace App\Casts;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PgsqlArray implements CastsAttributes
{
    public function get($model, string $key , $value , array $attributes){
        return str_replace(['{', '}'], ['[', ']'], $value);
    }
    public function set($model, string $key , $value , array $attributes){
        $this->attributes['document_id'] = str_replace(['[', ']'], ['{', '}'], json_encode($value));
    }
}

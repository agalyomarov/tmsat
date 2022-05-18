<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $guarded = [];
    public $timestamps = null;
    protected function diller(): Attribute
    {
        return Attribute::make(
            get: fn () => User::find($this->diller_id)
        );
    }
}

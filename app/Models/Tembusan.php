<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tembusan extends Model
{
    use HasFactory;

    protected $table = 'tembusan';

    protected $guarded = [
        'id'
    ];

    public function surat()
    {
        return $this->hasMany(Surat::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = "surat";

    protected $guarded = [
        'id'
    ];

    public function scopeFilter($query, array $filters)
    {

        // if (request("search")) {
        //     return $query->where('nama_surat', 'like', '%' . request('search') . '%')
        //         ->orWhere('no_surat', 'like', "%" . request('search') . "%");
        // }

        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('nama_surat', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('nama_surat', 'like', '%' . $search . '%')
                    ->orWhere('no_surat', 'like', '%' . $search . '%');
            });
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employer extends Model
{
    //pozwala na wykorzystanie modelu w factory
    use HasFactory;

    //metoda określająca relacje one-to-many pomiędzy tabelą employer, a tabelą jobs
    //oznacza to iż jeden pracodawca może posiadać wiele ofert
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    //odwołanie do konkretnej tabeli w bazie danych, którą reprezentuje model
    protected $table = 'job_listing';

    //właściowość modelu Eloquent określająca, które atrybuty mogą być przypisywane masowo
    protected $fillable = ['title', 'salary'];
}

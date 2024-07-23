<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model
{
    use HasFactory;

    //odwołanie do konkretnej tabeli w bazie danych, którą reprezentuje model
    protected $table = 'job_listings';

    //właściowość modelu Eloquent określająca, które atrybuty mogą być przypisywane masowo
    protected $fillable = ['employer_id', 'title', 'salary'];

    //metoda określająca relacje one-to-one pomiędzy rekordem tabeli jobs, a kluczem obcym tabeli employer
    //oznacza to, że jedna oferta pracy posiada jednego pracowdawcę
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, table: "job_tags", foreignPivotKey: "job_listings_id");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
        'active',
        'status'
    ];

    //Relationships
    //Pet has one adoption

    public function adoptions(){
        return $this->hasOne(Adoption::class);
    }
    //search by scope
    public function scopeNames($query, $search) {
    return $query->where('name', 'like', '%' . $search . '%')
                 ->orWhere('kind', 'like', '%' . $search . '%')
                 ->orWhere('breed', 'like', '%' . $search . '%')
                 ->orWhere('location', 'like', '%' . $search . '%');
}   
}

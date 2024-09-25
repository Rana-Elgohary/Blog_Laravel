<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'xyz',
        'user_id'
    ];

    // Eloquent Relationships
    public function user(){
        return $this->belongsTo(User::class);
        // NOTE: if the foriegnkey name isn't as followed --> (className_id), so we have to write the name of the column (return $this->belongsTo(User::class, 'foreign_key');)
    }
}

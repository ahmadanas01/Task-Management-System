<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel assumes plural of model name)
    protected $table = 'tasks';

    // Define the fillable fields (so you can mass assign data)
    protected $fillable = [
        'title', 'description', 'status', 'due_date', 'user_id',
    ];

    // Define the relationship with the User model (assuming a task belongs to a user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


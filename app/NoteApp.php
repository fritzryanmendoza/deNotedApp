<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteApp extends Model
{
    protected $fillable = ['title', 'body', 'completed'];
}

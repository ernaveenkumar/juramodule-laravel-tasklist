<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    use HasFactory;

    //define all the filed taht could be mass assigned
    //Fillable is most secured
    protected $fillable=['title', 'description', 'long_description'];

    //guarded is opposite of fillable

    //protected $guarded=['secret'];

    public function toggleCompleted(){
        $this->completed = !$this->completed;
        $this->save();
    }

}

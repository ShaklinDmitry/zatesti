<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Question extends Model
{
    use HasFactory;

    /**
     * Create new question
     * @param Request $request
     */
    public function create(Request $request){
        $this->text = $request->text;

        $this->save();
    }

    /**
     * Get all questions
     * @return Question[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(){
        return $this->all();
    }

}

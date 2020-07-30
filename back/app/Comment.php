<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Republic;
use App\User;


class Comment extends Model
{
    public function createComment(Request $request)    {
        
        $this->date = $request->date;
        $this->commentary = $request->commentary;
        $this->valueOffer = $request->valueOffer;
        $this->save();      
    }
    public function updateComment(Request $request, $id)
    {        
        if ($request->date) {
            $this->date = $request->date;
        }
        if ($request->commentary) {
            $this->commentary = $request->commentary;
        }
        if ($request->valueOffer) {
            $this->valueOffer = $request->valueOffer;
        }
        $this->save();    
    }
}

<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Republic;
use App\User;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function republic()
    {
        return $this->belongsTo('App\Republic');
    }
    public function createComment(CommentRequest $request)    {
        
        $this->date = $request->date;
        $this->commentary = $request->commentary;
        $this->valueOffer = $request->valueOffer;
        $this->save();      
    }
    public function updateComment(CommentRequest $request, $id)
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
    public function comentar($user_id, $republic_id)
    {
        $user = User::findOrFail($user_id);
        $user = Republic::findOrFail($republic_id);
        $this->user_id = $user_id;
        $this->republic_id = $republic_id;
        $this->save();
    } 
}

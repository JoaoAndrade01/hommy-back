<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function createComment(Request $request){
        $comment = new Comment;
        $comment->date = $request->date;
        $comment->note = $request->note;
        $comment->question = $request->question;
        $comment->answer = $request->answer;      
        $comment->valueOffer = $request->valueOffer;
        $comment->value = $request->value;   
        $comment->save();
        return response()->json($comment);
    }
    public function showComment($id){
        $comment = Comment::findOrFail($id);
        return response()->json($comment);
    }
    public function listComment(){
        $comment = Comment::all();
        return response()->json([$comment]);
    }
    public function updateComment(Request $request, $id){
        $comment = Comment::findOrFail($id);
            if($request->date){
                $comment->date =$request->date;
            }
            if($request->question){
                $comment->question =$request->question;
            }
            if($request->answer){
                $comment->answer =$request->answer;
            }
            if($request->valueOffer){
                $comment->valueOffer =$request->valueOffer;
            }    
            if($request->value){
                $comment->value =$request->value;
            }
            $comment->save();
            return response()->json($comment);           
    }
    public function deleteComment($id){
        Comment::destroy($id);
        return response()->json(['comentario deletado']);
    }
}

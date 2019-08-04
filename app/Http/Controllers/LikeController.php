<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }

    public function likeIt(Reply $reply)
    {
        $reply->likes()->create([
            'user_id' => auth()->user()->id
        ]);
        return response('Created',Response::HTTP_CREATED);
    }

    public function unLikeIt(Reply $reply) 
    {
        $reply->likes()->where('user_id',auth()->id())->first()->delete();
        return response('Deleted',Response::HTTP_NO_CONTENT);
    }
}

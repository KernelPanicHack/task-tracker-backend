<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(CommentRequest $request, string $taskId)
    {
        $comment = Comment::create([
            'user_id' => $request->user_id,
            'task_id' => $taskId,
            'text' => $request->text
        ]);
        if (!$comment){
            return response([
                'message' => 'error create'
            ], 401);
        }
        return response([
            'message' => 'comment created'
        ]);
    }
}

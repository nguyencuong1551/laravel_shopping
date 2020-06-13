<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Repository\Comment\CommentEloquentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentRepository;
    public function __construct(CommentEloquentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        $comments = $this->commentRepository->getAll();

        return view('Admin.Comment.home', [
            'comments' => $comments
        ]);
    }
}


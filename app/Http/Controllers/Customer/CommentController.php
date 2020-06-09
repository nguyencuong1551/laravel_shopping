<?php

namespace App\Http\Controllers\Customer;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = Session::get('user');
        $comment = new Comment();
        $comment->description = $request->get('description');
        $comment->name_user = $user['name'];
        $comment->id_product = $id;
        $comment->roleUser = $user['role'];
        $comment->vote = $request->get('vote');
        $comment->save();

        return redirect('customer/product/' . $id)->with('mess', "{{ __('SUCCESS!!!') }}");
    }

    public function destroy($id, $idComment)
    {
        $comment = Comment::find($idComment);
        $comment->delete();

        return redirect('customer/product/' . $id)->with('mess', "{ __('SUCCESS!!') }");
    }

}



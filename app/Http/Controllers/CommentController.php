<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $comicId)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        // Simpan komentar ke database
        Comment::create([
            'user_id' => auth()->user()->id,
            'comic_id' => $comicId,
            'comment' => $request->input('comment'),
        ]);

        // Ambil komentar terbaru dari database
        $comments = Comment::where('comic_id', $comicId)->get();

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses dan komentar terbaru
        return redirect()->back()->with(['success' => 'Comment added successfully', 'comments' => $comments]);
    }
}

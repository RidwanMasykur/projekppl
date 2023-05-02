<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Komentar;

class ForumController extends Controller
{
    function index() {
        return view ('2forum',[
            "title" => "Grooms Forum",
            'forums' => Forum::paginate(6)
        ]);
    }

    function lihat(Forum $forum) {
        $forum->with('komentar');

        return view('lihat', [
            'title' => 'Grooms Forum',
            'forum' => $forum
        ]);
    }

    function komentar(Request $request, $id) {
        $validated = $request->validate([
            'nama' => 'required',
            'komentar' => 'required',
        ]);

        $validated['waktu'] = date('Y-m-d');
        $validated['forum_id'] = $id;

        Komentar::create($validated);

        return redirect("/forum/$id/lihat");
    }
}

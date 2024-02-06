<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    public function index()
    {
        return inertia("Index");
    }

    public function show(Paste $paste)
    {
        return inertia("Index", ["paste" => $paste->content]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "content" => "required|min:1"
        ]);

        $paste = Paste::create($data);

        return redirect(route("show", ["paste" => $paste]));
        // return route("show", ["paste" => $paste]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use Illuminate\Support\Facades\DB;


class ArtController extends Controller
{
    public function __invoke()
    {
        $arts = Art::all();
    }

    public function index()
    {
        $arts = Art::orderBy('id', 'asc')->paginate(9);

        return view('arts.index', compact('arts'));
    }

    public function show(Art $art)
    {
        $critics = $art->critics;
        $actors_actresses = $art->actor_actresses;

        return view('arts.show', compact('art', 'actors_actresses', 'critics'));
    }

    public function edit(Art $art)
    {
        $type = [
            'episode' => 'episode',
            'movie' => 'movie',
            'series' => 'series',
        ];
        return view('arts.edit', compact('art', 'type'));
    }

    public function update(Request $request, Art $art)
    {
        $request->validate([
            'imdb_id' => 'nullable|alpha_num|unique:arts,imdb_id,',
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'type' => 'required|alpha_num|max:255',
            'year' => 'required|integer|max:255',
            'releaseDate' => 'required|date|max:255',
            'duration' => 'required|integer|max:255',
            'plot' => 'required|alpha_num|max:255',
            'userRating' => 'nullable|integer|max:255',
            'imdbRating' => 'nullable|integer|max:255',
            'director' => 'required|alpha_num|max:255',
            'videoLink' => 'nullable|alpha_dash|max:255',

        ]);
        $art->update(request()->all());
        if ($request->file('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $image_content = base64_encode(file_get_contents(($request->file('file')->path())));
            if ($art->image) {

                $art->image->image_content = $image_content;
                $art->image->extension = 'data:image/' . $file_extension . ';base64,';
                $art->image->save();
            } else
                $art->image()->create([
                    'image_content' => $image_content,
                    'extension' => 'data:image/' . $file_extension . ';base64,'
                ]);
        }
        return redirect()->route('arts.edit', compact('art'))->with('info', 'art updated successfully');
    }

    public function destroy(Art $art)
    {
        $art->delete();

        return redirect()->route('arts.index')->with('danger', 'art removed successfully');
    }

    public function create()
    {
        $type = [
            'episode' => 'episode',
            'movie' => 'movie',
            'series' => 'series',
        ];
        return view('arts.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'imdb_id' => 'nullable|alpha_num|unique:arts,imdb_id,',
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'type' => 'required|alpha_num|max:255',
            'year' => 'required|integer|max:255',
            'releaseDate' => 'required|date|max:255',
            'duration' => 'required|integer|max:255',
            'plot' => 'required|alpha_num|max:255',
            'userRating' => 'nullable|integer|max:255',
            'imdbRating' => 'nullable|integer|max:255',
            'director' => 'required|alpha_num|max:255',
            'videoLink' => 'nullable|alpha_dash|max:255',

        ]);
        $art = Art::create($request->all());
        if ($request->file('file')) {


            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
            $image_content = base64_encode(file_get_contents(($request->file('file')->path())));

            $art->image()->create([
                'image_content' => $image_content,
                'extension' => 'data:image/' . $file_extension . ';base64,'
            ]);
        }
        return redirect()->route('arts.index')->with('success', 'Art added successfully');
    }
}

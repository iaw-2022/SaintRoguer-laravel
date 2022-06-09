<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;
use App\Models\ActorActress;
use App\Models\Critic;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ArtController extends Controller
{
    public function __invoke()
    {
        $arts = Art::all();
    }

    public function index()
    {
        $arts = Art::orderBy('id', 'desc')->paginate(9);

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
            'movie' => 'movie',
            'series' => 'series',
        ];
        return view('arts.edit', compact('art', 'type'));
    }

    public function update(Request $request, Art $art)
    {
        $request->validate([
            'imdb_id' => "nullable|alpha_num|unique:arts,imdb_id,$art->id",
            'title' => "required|max:255|unique:arts,title,$art->id",
            'slug' => "required|max:255|unique:arts,slug,$art->id",
            'type' => 'required|alpha_num',
            'year' => 'required|integer',
            'releaseDate' => 'required|date',
            'duration' => 'required|integer',
            'plot' => 'required',
            'userRating' => 'nullable|integer|max:100',
            'imdbRating' => 'nullable|integer|max:100',
            'director' => 'required',
            'videoLink' => 'nullable|url',


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
            'movie' => 'movie',
            'series' => 'series',
        ];
        return view('arts.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'imdb_id' => 'nullable|alpha_num|unique:arts,imdb_id',
            'title' => 'required|max:255|unique:arts,title',
            'slug' => 'required|max:255|unique:arts,slug',
            'type' => 'required|alpha_num',
            'year' => 'required|integer',
            'releaseDate' => 'required|date',
            'duration' => 'required|integer',
            'plot' => 'required',
            'userRating' => 'nullable|integer|max:100',
            'imdbRating' => 'nullable|integer|max:100',
            'director' => 'required',
            'videoLink' => 'nullable|url',

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

    public function apiSearch(){
        return view('arts.api-search');
    }

    public function apiSearching(Request $request){
        $request->validate([
            'title' => 'required|max:255',
        ]);

        $key = env('IMDB_API_KEY');
        $url = "https://imdb-api.com/en/API/Search/" . $key . "/" . $request->title;
        $imdb_json = file_get_contents($url);
        if($imdb_json == null){
            return redirect()->route('arts.api-search')->with('danger', 'No results found');
        }
        $imdb_array = json_decode($imdb_json, true);
        return view('arts.api-select', compact('imdb_array'));
    }

    public function apiSave(Request $request){

        $art = Art::where('imdb_id', $request->imdb_id)->first();
        if($art){
            return redirect()->route('arts.show', $art->id);
        }

        $key = env('IMDB_API_KEY');
        $url = "https://imdb-api.com/en/API/Title/" . $key . "/" . $request->imdb_id;
        $url_video = "https://imdb-api.com/en/API/YouTubeTrailer/" . $key . "/" . $request->imdb_id;
        $url_critic = "https://imdb-api.com/en/API/MetacriticReviews/" . $key . "/" . $request->imdb_id;


        $imdb_json = file_get_contents($url);
        if($imdb_json == null){
            return redirect()->route('arts.api-search')->with('danger', 'No results found');
        }
        $imdb_array = json_decode($imdb_json, true);

        $imdb_video_json = file_get_contents($url_video);
        if($imdb_video_json == null){
            return redirect()->route('arts.api-search')->with('danger', 'No results found');
        }
        $imdb_video_array = json_decode($imdb_video_json, true);

        $imdb_critic_json = file_get_contents($url_critic);
        if($imdb_critic_json == null){
            return redirect()->route('arts.api-search')->with('danger', 'No results found');
        }
        $imdb_critic_array = json_decode($imdb_critic_json, true);

        if($imdb_array['runtimeMins'] == null){
            $imdb_array['runtimeMins'] = 0;
        }
        /* Art creation */
        $art = Art::create([
            'imdb_id' => $imdb_array['id'],
            'title' => $imdb_array['fullTitle'],
            'slug' => Str::slug($imdb_array['fullTitle']),
            'type' => $imdb_array['type'],
            'year' => $imdb_array['year'],
            'releaseDate' => $imdb_array['releaseDate'],
            'duration' => $imdb_array['runtimeMins'],
            'plot' => $imdb_array['plot'],
            'director' => $imdb_array['directors'],
        ]);

        /* Art image */
        $art->Image()->create([
            'image_content' => base64_encode(file_get_contents($imdb_array['image'])),
            'extension' => 'data:image/jpg;base64,'
        ]);

        /* Video Link */
        $art->update([
            'videoLink' => $imdb_video_array['videoUrl'],
        ]);
        /* Cast*/
        foreach($imdb_array['actorList'] as $cast){
            $artist = ActorActress::where('name', $cast['name'])->first();
            if(!$artist){
                $artist = ActorActress::create([
                    'name' => $cast['name']
                ]);
                $artist->Image()->create([
                    'image_content' => base64_encode(file_get_contents($cast['image'])),
                    'extension' => 'data:image/jpg;base64,'
                ]);
            } 
            $role = Str::after($cast['asCharacter'], 'as ');
            $art->actor_actresses()->attach([
                $artist->id => ['role' => $role]
            ]);           
        }

        /* Critics */
        foreach($imdb_critic_array['items'] as $critic){
            if($critic['author'] == ''){
                Critic::create([
                    'from' => $critic['publisher'],
                    'art_id' => $art->id,
                    'comment' => $critic['content'],
                    'rating' => $critic['rate']
                ]);
            }
            else{
                Critic::create([
                    'from' => $critic['author'],
                    'art_id' => $art->id,
                    'comment' => $critic['content'],
                    'rating' => $critic['rate']
                ]);
            }
        }

        /*Tags */
        foreach($imdb_array['genreList'] as $genre){
            $tag = Tag::where('name', $genre['value'])->first();
            if(!$tag){
                $tag = Tag::create([
                    'name' => $genre['value'],
                    'slug' => $genre['value']
                ]);
            }
            $art->tags()->attach($tag->id);
        }

        return redirect()->route('arts.show', $art->id);
    }
}

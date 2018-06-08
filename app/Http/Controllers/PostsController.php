<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $songs = Post::all();

        return view('songs', ['songs' => $songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Link to create a new title, song, lyrics
        return "success";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'title' => 'required',
        'artist' => 'required',
        'lyrics' => 'required'
        ]);

        $song = new Post();
        //On left field name in DB and on right field name in Form/view
        $song->title = $request->input('title');
        $song->artist = $request->input('artist');
        $song->lyrics = $request->input('lyrics');
        $song->save();

        return back()->with('message', 'Song successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show datas
        $songs = Post::where('id', $id);

        foreach($songs as $row)
        {
            $html =
                  '<tr>
                     <td>' . $row->title . '</td>' .
                     '<td>' . $row->artist . '</td>' .
                     '<td>' . $row->lyrics . '</td>' .
                  '</tr>';
        }
        //var_dump($songs);
        return "here";

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit
        $songs = Post::where('id', $id)->get();
        return view('editsong', ['songs' => $songs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update
      //  return $request;

        Post::where('id', $request->id)->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'lyrics' => $request->lyrics

        ]);

        $songs = Post::all();

        return view('songs', ['songs' => $songs])->with('message', 'Song successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        Post::where('id', $id)->delete();

        $songs = Post::all();

        return view('songs', ['songs' => $songs]);
    }
}

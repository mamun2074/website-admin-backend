<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Blog;

class BlogController extends Controller
{


//    Important Variable
    public $subModel = '';

    public $parentModel = Blog::class;

    public $parentRoute = 'blog';
    public $parentView = "admin.blog";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->parentModel::orderBy('created_at', 'desc')->paginate(60);
        return view($this->parentView . '.index')->with('items', $items);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->parentView . '.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'post_content' => 'required',
            'featured' => 'required',
        ]);


        $featured = $request->featured;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('upload/post/featured', $featured_new_name);


        $thumbnail_new_name = "";
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->thumbnail;
            $thumbnail_new_name = time() . $thumbnail->getClientOriginalName();
            $thumbnail->move('upload/post/thumbnail', $thumbnail_new_name);
        }

        $user = auth()->user();
        $this->parentModel::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'author_id' => $user->id,
            'post_content' => $request->post_content,
            'featured' => "upload/post/featured/" . $featured_new_name,
            'thumbnail' => "upload/post/thumbnail/" . $thumbnail_new_name,
            'slug' => str_slug($request->title),
        ]);

        Session::flash('success', 'Successfully Created');
        return redirect()->route($this->parentRoute);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = $this->parentModel::find($id);
        return view($this->parentView . '.edit')->with('item', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'post_content' => 'required',
        ]);

        $item = $this->parentModel::find($id);

        if ($request->hasFile('featured')) {

            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('upload/post/featured', $featured_new_name);

            $item->featured= 'upload/post/featured/'.$featured_new_name;
        }

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->thumbnail;
            $thumbnail_new_name = time() . $thumbnail->getClientOriginalName();
            $thumbnail->move('upload/post/thumbnail', $thumbnail_new_name);
            $item->thumbnail='upload/post/thumbnail/'.$thumbnail_new_name;
        }

        $user = auth()->user();

        $item->title=$request->title;
        $item->category_id=$request->category_id;
        $item->post_content=$request->post_content;
        $item->slug=str_slug($request->title);
        $item->author_id=$user->id;

        $item->save();
        Session::flash('success', 'Successfully Updated');
        return redirect()->route($this->parentRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->parentModel::find($id)->delete();
        Session::flash('success', "Successfully Destroy");
        return redirect()->back();
    }


    public function trashed()
    {
        $items = $this->parentModel::onlyTrashed()->paginate(60);
        return view($this->parentView . '.trashed')->with("items", $items);
    }

    public function trashedShow()
    {
        $id = $_POST["id"];
        $trashedItem = $this->parentModel::withTrashed()->where('id', $id)->first();
        return response()->json($trashedItem);
    }

    public function restore($id)
    {
        $project = $this->parentModel::withTrashed()->where('id', $id)->first();

        $project->restore();
        Session::flash('success', 'Successfully Restore');
        return redirect()->back();
    }

    public function kill($id)
    {
        $project = $this->parentModel::withTrashed()->where('id', $id)->first();
        $project->forceDelete();
        Session::flash('success', 'Parmanently Delete');
        return redirect()->back();
    }


    public function activeSearch(Request $request)
    {
        $request->validate([
            'search' => 'min:1'
        ]);

        $search = $request["search"];
        $items = $this->parentModel::where('title', 'like', '%' . $search . '%')
            ->paginate(60);

        return view($this->parentView . '.index')
            ->with('items', $items);
    }

    public function trashedSearch(Request $request)
    {
        $request->validate([
            'search' => 'min:1'
        ]);

        $search = $request["search"];

        $items = $this->parentModel::onlyTrashed()
            ->where('title', 'like', '%' . $search . '%')
            ->paginate(60);

        return view($this->parentView . '.trashed')
            ->with('items', $items);

    }


    public function activeAction(Request $request)
    {

        $request->validate([
            'project' => 'required'
        ]);

        if ($request->apply_comand_top == 1 || $request->apply_comand_bottom == 1) {
            foreach ($request->project["project_id"] as $id) {
                $this->destroy($id);
            }

            return redirect()->route($this->parentRoute);

        } else {
            Session::flash('error', "Something is wrong.Try again");
            return redirect()->back();
        }
    }


    public function trashedAction(Request $request)
    {
        $request->validate([
            'project' => 'required'
        ]);

        if ($request->apply_comand_top == 1 || $request->apply_comand_bottom == 1) {

            foreach ($request->project["project_id"] as $id) {
                $this->restore($id);
            }

        } elseif ($request->apply_comand_top == 2 || $request->apply_comand_bottom == 2) {

            foreach ($request->project["project_id"] as $id) {

                $this->kill($id);
            }
            return redirect()->back();

        } else {
            Session::flash('error', "Something is wrong.Try again");
            return redirect()->back();
        }
        return redirect()->back();
    }


}

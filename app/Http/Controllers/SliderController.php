<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Slider;

class SliderController extends Controller
{



//    Important Variable
    public $transaction = '';

    public $parentModel = Slider::class;

    public $parentRoute = 'slider';
    public $parentView = "admin.slider";



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
            'link' => 'required',
        ]);

        $featured = $request->link;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('upload/slider/featured', $featured_new_name);

        $this->parentModel::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => 'upload/slider/featured/'.$featured_new_name,
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

        $item = $this->parentModel::find($id);

        if ($request->hasFile('link')) {
            $featured = $request->link;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('upload/slider/featured', $featured_new_name);
            $item->link= 'upload/slider/featured/'.$featured_new_name;

        }

        $item->title = $request->title;
        $item->description = $request->description;
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

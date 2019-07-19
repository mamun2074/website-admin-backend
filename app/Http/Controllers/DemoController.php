<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{


//    Important Variable
    public $transaction = '';

    public $parentModel = Category::class;

    public $parentRoute = 'category';
    public $parentView = "admin.category";

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


    /** Get products
     *  Against project_id
     * Via Ajax
     */

    public function getProducts(Request $request)
    {
        $products = Product::where('project_id', $request->project_id)->get();
        $ProductInfo = array();
        foreach ($products as $product) {
            $name = Product::find($product->id)->product_name->name;
            $ProductInfo[$product->id] = $name;

        }
        return response()->json($ProductInfo);
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
            'project_id' => 'required',
            'head_of_account_id' => 'required',
            'date' => 'required',
            'amount' => 'required',

        ]);

        $date = new \DateTime($request->date);
        $NewDate = $date->format('Y-m-d'); // 31-07-2012 '2008-11-11'

        $LastCrDetails = $this->parentModel::create([
            'project_id' => $request->project_id,
            'head_of_account_id' => $request->head_of_account_id,
            'date' => $NewDate,
            'amount' => $request->amount,
            'particulars' => $request->particulars,
            'confirm' => $request->confirm,

        ]);

        if ($request->confirm == 1) {
            $this->transaction::create([
                'voucher_no' => $LastCrDetails->id,
                'voucher_type' => 'Initial Head Balance',
                'project_id' => $request->project_id,

                'head_of_account_id' => $request->head_of_account_id,
                'date' => $NewDate,
                'dr' => 0,
                'cr' => $request->amount,
                'particulars' => $request->particulars,
            ]);
        }

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

        $item = $this->parentModel::withTrashed()->find($request->id);

        $items = array();

        $items["voucher_no"] = $item->id;

        $items["project_name"] = $this->parentModel::withTrashed()->find($item->id)->project->name;

        if (!empty($item->customer_id)) {
            $items["customer_name"] = $this->parentModel::withTrashed()->find($item->id)->Customer->name;
        }

        if (!empty($item->product_id)) {
            $product_name_id = $this->parentModel::withTrashed()->find($item->id)->Product->id;
            $items["product_name"] = Product::withTrashed()->find($product_name_id)->product_name->name;
        }

        $items["bankcash_name"] = $this->parentModel::withTrashed()->find($item->id)->BankCash->name;

        $items["cheque_number"] = $item->cheque_number;
        $items["head_of_account_name"] = $this->parentModel::withTrashed()->find($item->id)->HeadOfAccount->name;

        $items["mr_bill_no"] = $item->mr_bill_no;

        $date = new \DateTime($item->date);
        $NewDate = $date->format('M d, Y'); // 31-07-2012 '2008-11-11'

        $items["date"] = $NewDate;
        $items["amount"] = $item->amount;
        $items["particulars"] = $item->particulars;


        return response()->json($items);
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
            'project_id' => 'required',
            'head_of_account_id' => 'required',
            'date' => 'required',
            'amount' => 'required',

        ]);


        $date = new \DateTime($request->date);
        $NewDate = $date->format('Y-m-d'); // 31-07-2012 '2008-11-11'


        $item = $this->parentModel::find($id);

        $item->project_id = $request->project_id;
        $item->head_of_account_id = $request->head_of_account_id;
        $item->date = $NewDate;
        $item->amount = $request->amount;
        $item->particulars = $request->particulars;
        $item->confirm = $request->confirm;
        $item->save();


        if ($request->confirm == 1) {

            $this->transaction::create([
                'voucher_no' => $id,
                'voucher_type' => 'Initial Head Balance',
                'project_id' => $request->project_id,

                'head_of_account_id' => $request->head_of_account_id,
                'date' => $NewDate,
                'dr' => 0,
                'cr' => $request->amount,
                'particulars' => $request->particulars,
            ]);
        }

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
        $items = $this->parentModel::where('amount', 'like', '%' . $search . '%')
            ->orWhereHas('HeadOfAccount', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('Project', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })

            ->orWhere('date', 'like', '%' . $search . '%')
            ->orWhere('particulars', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
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
            ->where('HeadOfAccount', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('Project', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhere('date', 'like', '%' . $search . '%')
            ->orWhere('amount', $search)
            ->orWhere('particulars', 'like', '%' . $search . '%')
            ->orWhere('id', $search)
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

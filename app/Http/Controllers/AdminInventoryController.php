<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class AdminInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        //
        $inventories = Inventory::latest()->paginate(5);
        return view('inventory', compact('inventories'))
            ->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        switch ($request->input('action')) {
            case 'confirm':
                $inventory = Inventory::find($id);
                $inventory->status = "Approved";
                $inventory->save();
                return redirect()->route('admin.inventory')
                                ->with('success', 'Inventory approved successfully');
                
                break;
    
            case 'reject':
                $inventory = Inventory::find($id);
                $inventory->status = "Rejected";
                $inventory->save();
                return redirect()->route('admin.inventory')
                                ->with('success', 'Inventory rejected successfully');
                
                break;
    
        }
        
        //
        // $inventory = Inventory::find($id);
        // $inventory->status = "Approved";
        // $inventory->save();
        // return redirect()->route('admin.inventory')
        //                 ->with('success', 'Inventory approved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

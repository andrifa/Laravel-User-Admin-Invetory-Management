<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Inventory;
use Auth;
use Mail;



class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_datatable()
    {
        $userEmail = Auth::user()->email;

        return Datatables::of(Inventory::where('email',$userEmail))
        ->addColumn('action',function($inventory){
            $x='';
            if ($inventory->status=="needApproval") {
                # code...
                $x.= 'Waiting for confirmation';

            } elseif ($inventory->status=="Rejected") {
                
                $x.= 'Your Item Rejected';

            } else {
                # code...
                $x.= '<a class="btn btn-sm btn-warning" href="'.route("inventory.edit", $inventory->id).'">Edit</a>
                <button class="btn-delete btn-sm btn-danger" data-remote="/inventory/' . $inventory->id . '">Delete</button>';
            }

            return $x;
            
            
            
        })
        ->make(true);
    }

    public function index()
    {
        $userStatus = Auth::user()->status;
        if ($userStatus=="active") {
            return view('inventory.index');
            // $userEmail = Auth::user()->email;
            // $inventories = Inventory::where('email',$userEmail)->paginate(5);
            // $inventories = Inventory::latest()->paginate(5);
            // return view('inventory.index', compact('inventories'))
            //     ->with('i',(request()->input('page',1)-1)*5);
            # code...
        } else {
            return view('home');
            # code...
        }
        
        //  
         
    }

    // public function send()
    // {
    //     Mail::send(['text'=>'mail'],['name','Admin'],function($message){
    //         $message->to('notenter19@gmail.com','To Notenter19')->subject('Submission Notification');
    //         $message->from('notenter19@gmail.com','Notenter19');
    //     });
    // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('inventory.create');
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
            'email' => 'required|email',
            'product' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        Mail::send(['text'=>'inventory.mail'],['name','Admin'],function($message){
            $message->to('notenter19@gmail.com','To Notenter19')->subject('Submission Notification');
            $message->from('notenter19@gmail.com','Notenter19');
        });

        Inventory::create($request->all());
        return redirect()->route('inventory.index')
                        ->with('success','new inventory created successfully');


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
        $inventory = Inventory::find($id);
        return view('inventory.edit', compact('inventory'));
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
        //
        $this->validate($request, [
            // 'email' => 'required|email',
            'product' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            // 'status' => 'required',
        ]);
        $inventory = Inventory::find($id);
        $inventory->product = $request->get('product');
        $inventory->quantity = $request->get('quantity');
        $inventory->description = $request->get('description');
        $inventory->save();
        return redirect()->route('inventory.index')
                        ->with('success', 'Inventory updated successfully');
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
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->route('inventory.index')
                        ->with('success', 'Inventory deleted successfully');
    }
}

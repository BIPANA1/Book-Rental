<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Services\MemberServices;

;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(
        protected MemberServices $memberServices
      ) {
      }


    public function index()
    {
        $member = $this->memberServices->all();
        return view('admin.pages.member.index', compact('member'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:5,15'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        $member = $this->memberServices->create($data);
        return redirect()->route('member.index',['id' =>$member->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = $this->memberServices->find($id);
        return view('admin.pages.member.edit',compact('member'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:5,15'],
            'address' => ['required', 'string', 'max:255'],
        ]);
        $member = $this->memberServices->update($data,$id);
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->memberServices->delete($id);
        return redirect()->route('member.index');
    }
}

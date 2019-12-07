<?php

namespace App\Http\Controllers;

use App\nickNameUser;
use App\User;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nickNameUsers = nickNameUser::all();
        return view('memberList', compact('nickNameUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membrerRegistration');
    }

    public function showQr(Request $request)
    {
        $nickNameUser = nickNameUser::find($request->id);
        return view('qrcodeDisplay', compact('nickNameUser'));
    }

    public function stampPush()
    {
        $nickNameUsers = nickNameUser::all();
        return view('stampPush', compact('nickNameUsers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nickNameUser = new nickNameUser;
        $nickNameUser->fill($request->all());
        $nickNameUser->save();
        return redirect('/groups');
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
    public function edit(Request $request)
    {
        $nickNameUser = nickNameUser::find($request->id);
        return view('memberEdit', compact('nickNameUser'));
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
        $nickNameUser = nickNameUser::find($request->id);
        $nickNameUser->fill($request->all());
        $nickNameUser->save();
        return redirect('/groups');
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

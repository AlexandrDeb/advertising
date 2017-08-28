<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Ad;

class AdsController extends Controller
{
    /**
     * Show the form for creating a new Ad.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        return view('create_ad', ['page_title' => 'Create Ad', 'form_route' => 'edit/store', 'button' => 'Create']);
    }

    /**
     * Store a newly created row in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $ad = new Ad();
        $ad->title = $request['title'];
        $ad->description = $request['description'];
        $ad->author_name = Auth::user()->username;
        $ad->save();
        return redirect()->route('show', [$ad]);
    }

    /**
     * Validate fields
     *
     * @param array $data
     * @return mixed
     */
    private function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|filled|max:100|min:3',
            'description' => 'required|string|filled|max:350',
        ]);
    }

    /**
     * Show Ad by id
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        return view('show_ad', compact('ad'));
    }

    /**
     * Delete Ad
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        Ad::destroy($id);
        return redirect('/');
    }

    /**
     * Show the form for creating a updating Ad.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUpdate($id)
    {
        return view('create_ad', ['page_title' => 'Update Ad', 'form_route' => "edit/$id/update", 'button' => 'Save']);
    }

    /**
     * Update the specified row in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $ad = Ad::find($id);
        $ad->title = $request['title'];
        $ad->description = $request['description'];
        $ad->author_name = Auth::user()->username;
        $ad->save();
        return redirect()->route('show', [$ad]);
    }

}

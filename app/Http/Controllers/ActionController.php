<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Advt;

class ActionController
{
    public function show($id)
    {
        $ad = Advt::find($id);

        return view('actions.show', compact('ad'));
    }

    public function update_or_create(Request $request)
    {

        if ($request->method() == 'POST') {
            $request -> validate([
                'title' => ['required'],
                'description' => ['required'],
            ]);
            Advt::updateOrCreate(
                ['id' => $request->get('id') ?? null],
                [
                    'title' => $request->get('title'),
                    'description' => $request->get('description'),
                    'user_id' => Auth::id(),
                ]);

            return redirect('/');
        }

        $data = [];

        if (!empty($id = $request->route()->parameter('id'))) {
            $data['ad'] = Advt::find($id);

        }

        return view('actions.form', $data);
    }

    public function delete(Request $request)
    {
        $ad = Advt::find($request->route()->parameter('id'));
        if($ad->user_id !== Auth::id()){
            return redirect()->route('warning');
        }

        $ad->delete();
        return redirect('/');
    }

    public function warning ()
    {
        return view('warning');
    }

}

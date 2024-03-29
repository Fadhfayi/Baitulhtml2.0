<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\group;
use App\Models\Member;
use App\Models\quize;
use Illuminate\Http\Request;

class quizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $quizes = quize::where('group_id', 'LIKE', "%$keyword%")
                ->orWhere('quiz', 'LIKE', "%$keyword%")
                ->orWhere('opsi1', 'LIKE', "%$keyword%")
                ->orWhere('opsi2', 'LIKE', "%$keyword%")
                ->orWhere('opsi3', 'LIKE', "%$keyword%")
                ->orWhere('opsi4', 'LIKE', "%$keyword%")
                ->orWhere('answer', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quizes = quize::latest()->paginate($perPage);
        }

        return view('quiz.quizes.index', compact('quizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $group = group::all();
        return view('quiz.quizes.create',compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        quize::create($requestData);

        return redirect('quiz/quizes')->with('flash_message', 'quize added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $quize = quize::findOrFail($id);

        return view('quiz.quizes.show', compact('quize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quize = quize::findOrFail($id);

        return view('quiz.quizes.edit', compact('quize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $quize = quize::findOrFail($id);
        $quize->update($requestData);

        return redirect('quiz/quizes')->with('flash_message', 'quize updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        quize::destroy($id);

        return redirect('quiz/quizes')->with('flash_message', 'quize deleted!');
    }
    public function bankSoal()
    {
        $group=group::where('user_id', auth()->user()->id)->first()->id;
        $quiz=quize::where ('group_id', $group)->get();
        return view();
    }
    
}

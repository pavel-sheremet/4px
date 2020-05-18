<?php

namespace App\Http\Controllers;

use App\Events\SectionCreated;
use App\Http\Requests\SectionRequest;
use App\Section;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('section.index', [
            'sections' => Section::orderBy('id', 'desc')->with('users')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Section::class);

        return view('section.edit', [
            'section' => new Section(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SectionRequest $request
     * @return Response
     * @throws AuthorizationException
     */
    public function store(SectionRequest $request)
    {
        $this->authorize('create', Section::class);

        $section = Section::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        event(new SectionCreated($section, $request));

        return redirect()->route('section.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Section $section
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Section $section)
    {
        $this->authorize('create', Section::class);

        return view('section.edit', [
            'section' => $section,
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SectionRequest $request
     * @param Section $section
     * @return Response
     * @throws AuthorizationException
     */
    public function update(SectionRequest $request, Section $section)
    {
        $this->authorize('update', $section);

        $section->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        event(new SectionCreated($section, $request));

        return redirect()->route('section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Section $section
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy(Section $section)
    {
        $this->authorize('delete', $section);

        $section->delete();

        return redirect()->route('section.index');
    }
}

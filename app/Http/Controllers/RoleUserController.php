<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;

/**
 * Class RoleUserController
 * @package App\Http\Controllers
 */
class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleUsers = RoleUser::paginate();

        return view('role-user.index', compact('roleUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $roleUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleUser = new RoleUser();
        return view('role-user.create', compact('roleUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RoleUser::$rules);

        $roleUser = RoleUser::create($request->all());

        return redirect()->route('role-users.index')
            ->with('success', 'RoleUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roleUser = RoleUser::find($id);

        return view('role-user.show', compact('roleUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roleUser = RoleUser::find($id);

        return view('role-user.edit', compact('roleUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RoleUser $roleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleUser $roleUser)
    {
        request()->validate(RoleUser::$rules);

        $roleUser->update($request->all());

        return redirect()->route('role-users.index')
            ->with('success', 'RoleUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $roleUser = RoleUser::find($id)->delete();

        return redirect()->route('role-users.index')
            ->with('success', 'RoleUser deleted successfully');
    }
}

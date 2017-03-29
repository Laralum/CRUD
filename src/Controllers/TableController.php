<?php

namespace Laralum\CRUD\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laralum\Users\Models\User;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = array_map('reset', \DB::select('SHOW TABLES'));
        return view('laralum_CRUD::index', ['tables' => $tables]);
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
        $tables = array_map('reset', \DB::select('SHOW TABLES'));
        if (! in_array($id, array_keys($tables))) {
            return redirect()->route('laralum::CRUD.tables.index')
                ->with('error', __('laralum_CRUD::general.table_not_exists'));
        }
        $rows = \DB::table($tables[$id])->get();
        $columns = \DB::connection()
            ->getSchemaBuilder()
            ->getColumnListing($tables[$id]);

        return view('laralum_CRUD::show', [
            'id' => $id,
            'name' => $tables[$id],
            'columns' => $columns,
            'rows' => $rows
        ]);
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
        //
    }

    /**
     * Confirm remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmDestroy($id)
    {
        //
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

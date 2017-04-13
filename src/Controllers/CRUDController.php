<?php

namespace Laralum\CRUD\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laralum\CRUD\Models\Table;
use DB;
use Schema;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tables()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        return view('laralum_CRUD::tables', ['tables' => $tables]);
    }

    /**
     * Display the rows from the table
     *
     * @param string $table
     * @return \Illuminate\Http\Response
     */
    public function rows($table)
    {
        $rows = with(new Table)->setTable($table)->get();
        $columns = Schema::getColumnListing($table);

        return view('laralum_CRUD::rows', ['table' => $table, 'rows' => $rows, 'columns' => $columns]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $table
     * @return \Illuminate\Http\Response
     */
    public function create($table)
    {
        $columns = Schema::getColumnListing($table);

        return view('laralum_CRUD::create', ['table' => $table, 'columns' => $columns]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param string $table
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $table)
    {
        $row = with(new Table)->setTable($table);
        $columns = Schema::getColumnListing($table);

        foreach ($columns as $c) {
            $type = Schema::getColumnType($table, $c);

            if ($type == 'boolean') {
                $row->$c = $request->$c && $request->$c;
            } else {
                $row->$c = $request->$c;
            }
        }

        $row->save();

        return redirect()->route('laralum::CRUD.row.index', ['table' => $table])->with('success', __('laralum_CRUD::general.row_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $table
     * @param  int  $key
     * @return \Illuminate\Http\Response
     */
    public function show($table, $key)
    {
        $r = self::getRowAndColumns($table, $key);

        return view('laralum_CRUD::show', ['table' => $table, 'row' => $r[0], 'columns' => $r[1]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $table
     * @param  int  $key
     * @return \Illuminate\Http\Response
     */
    public function edit($table, $key)
    {
        $r = self::getRowAndColumns($table, $key);

        return view('laralum_CRUD::edit', ['table' => $table, 'row' => $r[0], 'columns' => $r[1]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $table
     * @param  int  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $table, $key)
    {
        $r = self::getRowAndColumns($table, $key);

        $row = $r[0]->setTable($table);
        $columns = $r[1];

        foreach ($columns as $c) {
            $type = Schema::getColumnType($table, $c);

            if ($type == 'boolean') {
                $row->$c = $request->$c && $request->$c;
            } else {
                $row->$c = $request->$c;
            }
        }

        $row->save();

        return redirect()->route('laralum::CRUD.row.index', ['table' => $table])->with('success', __('laralum_CRUD::general.row_edited'));;
    }

    /**
     * Confirm remove the specified resource from storage.
     *
     * @param string $table
     * @param int $key
     * @return \Illuminate\Http\Response
     */
    public function confirmDelete($table, $key)
    {
        return view('laralum::pages.confirmation', [
            'method' => 'DELETE',
            'action' => route('laralum::CRUD.row.destroy', ['table' => $table, 'key' => $key]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($table, $key)
    {
        $r = self::getRowAndColumns($table, $key);

        $row = $r[0]->setTable($table);

        $row->delete();

        return redirect()->route('laralum::CRUD.row.index', ['table' => $table])->with('success', __('laralum_CRUD::general.row_deleted'));
    }

    /**
     * Get the row and the columns of the specified table key
     *
     * @param string $table
     * @param  int  $key
     * @return array
     */
    public function getRowAndColumns($table, $key)
    {
        $raw_row = with(new Table)->setTable($table);
        $row = $raw_row->where($raw_row->getKeyName(), $key)->first();
        $columns = Schema::getColumnListing($table);

        return [$row, $columns];
    }
}

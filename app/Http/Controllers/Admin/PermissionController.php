<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Rows Per page.
     *
     * @var int
     */
    private $per_page;

    /**
     * Default Sort Column.
     *
     * @var string
     */
    private $sort = 'created_at';

    /**
     * Default Sort Order.
     *
     * @var string
     */
    private $order;

    /**
     * PermissionController constructor.
     */
    public function __construct()
    {
        $this->order    = get_option('default-order');
        $this->per_page = get_option('default-pagination');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Permission::orderBy($this->sort, $this->order)->paginate($this->per_page);
        $total   = Permission::all()->count();

        $data = array(
            'results' => $results,
            'total'   => $total,
            'columns' => array('name', 'display_name', 'description', 'action'),
        );

        return view('backend.permission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permission.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields   = array();
        $validate = array();

        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;
            $validate[$key] = 'required';
            $fields[$key]   = $value;
        }

        $this->validate($request, $validate);

        try {
            $object = new Permission();
            foreach ($fields as $key => $value) {
                $object->$key = $value;
            }
            if ($object->save()) {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'permission.add.success'), 'success');
            } else {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'permission.add.error'), 'danger');
            }
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('access/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Permission::orderBy($this->sort, $this->order)->paginate($this->per_page);
        $result  = Permission::find($id);
        $total   = Permission::all()->count();

        $data = array(
            'results' => $results,
            'result'  => $result,
            'total'   => $total,
            'columns' => array('name', 'display_name', 'description', 'action'),
        );

        return view('backend.permission.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields   = array();
        $validate = array();

        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;
            $validate[$key] = 'required';
            $fields[$key]   = $value;
        }

        $this->validate($request, $validate);

        try {
            $object = Permission::find($id);
            foreach ($fields as $key => $value) {
                $object->$key = $value;
            }
            if ($object->save()) {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'permission.edit.success'), 'success');
            } else {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'permission.edit.error'), 'danger');
            }
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('access/permissions');
    }

    /**
     * Remove permanently the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ids = explode(',', $id);
            foreach ($ids as $id) {
                Permission::where('id', $id)->forceDelete();
            }
            $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'permission.edit.success'), 'success');
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
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
     * RoleController constructor.
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
        $results = Role::orderBy($this->sort, $this->order)->paginate($this->per_page);
        $total   = Role::all()->count();

        $data = array(
            'results' => $results,
            'total'   => $total,
            'columns' => array('name', 'display_name', 'description', 'action'),
        );

        return view('backend.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.index');
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
            $object = new Role();
            foreach ($fields as $key => $value) {
                $object->$key = $value;
            }
            if ($object->save()) {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.add.success'), 'success');
            } else {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.add.error'), 'danger');
            }
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('access/role');
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
        $results = Role::orderBy($this->sort, $this->order)->paginate($this->per_page);
        $result  = Role::find($id);
        $total   = Role::all()->count();

        $data = array(
            'results' => $results,
            'result'  => $result,
            'total'   => $total,
            'columns' => array('name', 'display_name', 'description', 'action'),
        );

        return view('backend.role.index', $data);
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
            $object = Role::find($id);
            foreach ($fields as $key => $value) {
                $object->$key = $value;
            }
            if ($object->save()) {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.edit.success'), 'success');
            } else {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.edit.error'), 'danger');
            }
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('access/role');
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
                Role::where('id', $id)->forceDelete();
            }
            $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.edit.success'), 'success');
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect()->back();
    }

}

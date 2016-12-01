<?php

namespace App\Http\Controllers\Admin;

use App\Model\AssignRole;
use App\Model\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
        $results = User::orderBy($this->sort, $this->order)->paginate($this->per_page);
        $total   = User::all()->count();

        $data = array(
            'results' => $results,
            'total'   => $total,
            'columns' => array('name', 'email', 'action'),
        );

        return view('backend.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles   = Role::all();
        $current = [];
        $data    = array(
            'roles'   => $roles,
            'current' => $current,
        );

        return view('backend.user.create', $data);
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
        $validate = array(
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        );

        $this->validate($request, $validate);

        try {
            $object = new User();

            $object->name     = $request->name;
            $object->email    = $request->email;
            $object->password = bcrypt($request->password);

            if ($object->save()) {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.add.success'), 'success');
            } else {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.add.error'), 'danger');
            }
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('user/create');
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
        $roles    = Role::all();
        $assigned = AssignRole::where('user_id', $id)->get();

        $result = User::find($id);
        $total  = User::all()->count();

        $data = array(
            'roles'   => $roles,
            'assigned' => $assigned,
            'result'  => $result,
            'total'   => $total,
        );

        return view('backend.user.create', $data);
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
        $validate = array(
            'name'  => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,id,' . $id,
            'password' => 'required|min:6',
        );

        $this->validate($request, $validate);

        try {
            $object = User::where('id', $id)->first();

            $object->name  = $request->name;
            $object->email = $request->email;
            $object->password = bcrypt($request->password);

            if ($object->save()) {
                foreach ($request->roles as $key => $value) {
                    $assign          = new AssignRole();
                    $assign->user_id = $object->id;
                    $assign->role_id = $value;
                    $assign->save();
                }
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.edit.success'), 'success');
            } else {
                $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'role.edit.error'), 'danger');
            }
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('user/create');
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

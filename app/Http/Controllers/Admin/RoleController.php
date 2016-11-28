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
    private $order = 'desc';


    /**
     * RoleController constructor.
     */
    public function __construct()
    {
        $this->per_page = get_option('default-pagination');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$page = isset($request->page) ? intval($request->page) : $this->page;
        $rows = isset($request->rows) ? intval($request->rows) : $this->rows;
        $sort = isset($request->sort) ? strval($request->sort) : $this->sort;
        $order = isset($request->order) ? strval($request->order) : $this->order;
        $offset = ($page - 1) * $rows;*/

        $results = Role::orderBy($this->sort, $this->order)->paginate($this->per_page);
        $total   = Role::all()->count();
        //dd($results);
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
        return view('backend.role.create');
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

}

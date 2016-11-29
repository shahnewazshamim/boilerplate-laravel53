<?php

namespace App\Http\Controllers\Admin;

use App\Model\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.preference.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields     = array();
        $validate   = array();
        $checkboxes = array('logo-text', 'carousel');

        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;
            $validate[$key] = 'required';
            $fields[$key]   = $value;
        }

        foreach ($checkboxes as $checkbox) {
            if (!array_key_exists($checkbox, $fields)) {
                $fields[$checkbox] = 'disable';
            }
        }

        $this->validate($request, $validate);

        try {
            foreach ($fields as $key => $value) {
                update_option($key, $value);
            }

            $flash = set_flash_message(trans('backend' . DIRECTORY_SEPARATOR . 'preference.update.success'), 'success');
        } catch (\Exception $e) {
            $flash = set_flash_message($e->getMessage(), 'warning');
        }

        session_set_flash($flash);

        return redirect('preference/site');
    }

}

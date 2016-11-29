<?php

use App\Model\Option;

if (!function_exists('get_option')) {
    /**
     * Get the value of an option.
     *
     * @param $key
     *
     * @return mixed
     */
    function get_option($key)
    {
        $option = Option::where('key', $key)->first();

        return ($option != NULL) ? $option->value : '';
    }
}

if (!function_exists('update_option')) {
    /**
     * Update the value of an option.
     *
     * @param $key
     *
     * @return mixed
     */
    function update_option($key, $value)
    {
        $option = Option::where('key', $key)->first();

        if ($option != NULL) {
            $option->value = $value;

            return $option->save();
        } else {
            $option = new Option();

            $option->key   = $key;
            $option->value = $value;

            return $option->save();
        }
    }
}

if (!function_exists('set_flash_message')) {
    /**
     * Return flash message array.
     *
     * @param $message
     * @param $status
     *
     * @return mixed
     */
    function set_flash_message($message, $status)
    {
        $flash['alert']   = 'alert-' . $status;
        $flash['status']  = $status;
        $flash['message'] = $message;

        return $flash;
    }
}

if (!function_exists('session_set_flash')) {
    /**
     * Set flash message array into session flash method.
     *
     * @param $flash
     */
    function session_set_flash($flash)
    {
        foreach ($flash as $key => $value) {
            session()->flash($key, $value);
        }
    }
}

if (!function_exists('checked')) {
    /**
     * Return checked status for selected items.
     *
     * @param $current
     * @param $checked
     *
     * @return string
     */
    function checked($current, $checked)
    {
        $status = '';
        if ($current == $checked) {
            $status = 'checked';
        }

        return $status;
    }
}

if (!function_exists('selected')) {
    /**
     * Return selected status for selected items.
     *
     * @param $current
     * @param $selected
     *
     * @return string
     */
    function selected($current, $selected)
    {
        $status = '';
        if ($current == $selected) {
            $status = 'selected';
        }

        return $status;
    }
}

if (!function_exists('parse_snake_case')) {
    /**
     * Return String with space instead of underscore.
     *
     * @param $string
     *
     * @return string
     */
    function parse_snake_case($string)
    {
        $array  = explode('_', $string);
        $string = implode(' ', $array);

        return ucfirst($string);
    }
}

if (!function_exists('render_grid')) {
    /**
     * Return selected status for selected items.
     *
     * @param $results
     * @param $total
     *
     * @return string
     */
    function render_grid($columns, $results, $url)
    {
        if(count($results) > 0) {
            $grid = '<table class="table table-hover">';
            $grid .= "<thead>";
            $grid .= "<tr>";
            $grid .= "<th><div class='checkbox-custom'><input class='check-all' type='checkbox' id='master-check'><label for='master-check'></label></th>";
            foreach ($columns as $column) {
                $grid .= "<th>" . parse_snake_case($column) . "</th>";
            }
            $grid .= "</tr>";
            $grid .= "</thead>";
            $grid .= "<tbody>";
            foreach ($results as $result) {
                $grid .= "<tr>";
                $grid .= "<td><div class='checkbox-custom'><input id='check-" . $result->id . "' class='check' type='checkbox'><label for='check-" . $result->id . "'></label></td>";
                foreach ($columns as $column) {
                    if ($column == 'action') continue;
                    $grid .= "<td>" . $result->$column . "</td>";
                }
                if (in_array('action', $columns)) {
                    $grid .= "<td>";
                    $grid .= "<a href='javascript:void(0)' data-url='" . $url . "/edit/" . $result->id . "' class='btn btn-default btn-xs text-white edit' data-toggle='tooltip' data-title='Edit'><span class='fa fa-pencil'></span></a>&nbsp;";
                    $grid .= "<a href='javascript:void(0)' data-url='" . $url . "/delete/" . $result->id . "' class='btn btn-default btn-xs text-white delete' data-toggle='tooltip' data-title='Delete'><span class='fa fa-remove'></span></a>";
                    $grid .= "</td>";
                }
                $grid .= "<tr>";
            }
            $grid .= "</tbody>";
            $grid .= '</table>';
        } else {
            $grid = "<br><div class='alert alert-info text-center'>" . trans('backend' . DIRECTORY_SEPARATOR . 'role.grid.noresult') . "</div>";
        }
        echo $grid;
    }
}

if (!function_exists('render_pagination')) {
    /**
     * Return selected status for selected items.
     *
     * @param $results
     * @param $total
     *
     * @return string
     */
    function render_pagination($results)
    {
        $total  = $results->total();
        $limit  = (($results->currentpage() - 1) * $results->perpage()) + $results->count();
        $offset = ($results->currentpage() - 1) * $results->perpage() + 1;

        if(count($results) > 0) {
            if ($total < get_option('default-pagination')) {
                $pagination = '<div class="pull-right pagination-block">';
                $pagination .= '<ul class="pagination pagination-sm">';
                $pagination .= '<li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>';
                $pagination .= '<li class="disabled"><a href="#"><span class="sr-only">(current)</span>1</a></li>';
                $pagination .= '<li class="disabled"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>';
                $pagination .= '</ul>';
                $pagination .= '</div>';
                echo $pagination;
            } else {
                echo "<div class='pull-right pagination-block'>" . $results->render() . "</div>";
            }
            $block = '<div class="pull-left counter-block">';
            $block .= "<em>" . trans('backend' . DIRECTORY_SEPARATOR . 'role.grid.counting', ['offset' => $offset, 'limit' => $limit, 'total' => $total]) . "</em>";
            $block .= '</div>';
            $block .= '<div class="clearfix"></div>';
            echo $block;
        } else {
            echo '';
        }
    }
}
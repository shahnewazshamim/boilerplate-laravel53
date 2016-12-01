<?php

return [
    'page'    => [
        'title' => 'Role Manager',
    ],
    'section' => [
        'title' => 'List of Roles',
    ],
    'form'    => [
        'title'       => 'Add New Role',
        'label'       => [
            'name'         => 'Name',
            'display_name' => 'Display Name',
            'description'  => 'Description',
            'modules'      => 'Assign Modules',
            'actions'      => 'Set Ability',
        ],
        'placeholder' => [
            'name'         => 'Enter Role Name',
            'display_name' => 'Enter Role Display Name',
            'description'  => 'Short Description',
        ],
        'button'      => [
            'submit' => 'Save',
        ],
    ],
    'grid'    => [
        'columns'  => [
            'actions' => 'Actions',
        ],
        'button'   => [
            'edit'   => 'Edit',
            'delete' => 'Delete',
        ],
        'counting' => 'Showing :offset to :limit of :total Items.',
        'noresult' => 'No result found.',
    ],
    'add'     => [
        'success' => 'Save successful!',
        'error'   => 'Save failed!',
    ],
    'edit'    => [
        'success' => 'Update successful!',
        'error'   => 'Update failed!',
    ],
    'delete'  => [
        'success' => 'Delete successful!',
        'error'   => 'Delete failed!',
    ],
];
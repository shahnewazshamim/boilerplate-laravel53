<?php

return [
    'page'    => [
        'title' => 'User Manager',
    ],
    'section' => [
        'title' => 'List of Users',
    ],
    'form'    => [
        'title'       => 'Add New User',
        'label'       => [
            'name'                  => 'Full Name',
            'email'                 => 'Email',
            'password'              => 'Password',
            'password_confirmation' => 'Confirm Password',
            'update_password'       => 'Update Password ?',
            'assigned_roles'        => 'Assigned Roles',
        ],
        'placeholder' => [
            'name'                  => 'Enter Full Name',
            'email'                 => 'Enter Email Address',
            'password'              => 'Enter Password',
            'password_confirmation' => 'Repeat Above Password',
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
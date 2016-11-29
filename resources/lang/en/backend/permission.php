<?php

return [
    'page'    => [
        'title' => 'Permission Manager',
    ],
    'section' => [
        'title' => 'List of Permissions',
    ],
    'form'    => [
        'title' => 'Add New Permission',
        'label'       => [
            'name'         => 'Name',
            'display_name' => 'Display Name',
            'description'  => 'Description',
        ],
        'placeholder' => [
            'name'         => 'Enter Permission Name',
            'display_name' => 'Enter Permission Display Name',
            'description'  => 'Short Description',
        ],
        'button'      => [
            'submit' => 'Save',
        ],
    ],
    'grid' => [
        'columns' => [
            'actions' => 'Actions'
        ],
        'button'      => [
            'edit' => 'Edit',
            'delete' => 'Delete',
        ],
        'counting' => 'Showing :offset to :limit of :total Items.',
        'noresult' => 'No result found.',
    ],
    'add'  => [
        'success' => 'Save successful!',
        'error' => 'Save failed!',
    ],
    'edit'  => [
        'success' => 'Update successful!',
        'error' => 'Update failed!',
    ],
    'delete'  => [
        'success' => 'Delete successful!',
        'error' => 'Delete failed!',
    ],
];
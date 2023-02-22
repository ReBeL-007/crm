<?php

return [

    'user'              => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'sn'                       => 'S.N',
            'sn_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => 'Leave the field empty, if you do not want to change it.',
            'isAdmin'                  => 'Is Admin?',
            'isAdmin_helper'           => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
        ],
    ],

    'company'              => [
        'title'          => 'Companies',
        'title_singular' => 'Company',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'sn'                       => 'S.N',
            'sn_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'logo'                     => 'Logo',
            'logo_helper'              => '',
            'website'                  => 'Website',
            'website_helper'           => '',
        ],
    ],


    'employee'              => [
        'title'          => 'Employees',
        'title_singular' => 'Employee',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'sn'                       => 'S.N',
            'sn_helper'                => '',
            'firstname'                     => 'First Name',
            'firstname_helper'              => '',
            'lastname'                     => 'Last Name',
            'lastname_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'phone'                     => 'Phone',
            'phone_helper'              => '',
            'company'                  => 'Company',
            'company_helper'           => '',
        ],
    ],
];

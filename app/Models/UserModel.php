<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'name',
        'username',
        'email',
        'password',
        'role_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'name'     => 'required|min_length[3]|max_length[255]',
        'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[8]',
        'role_id' => 'required|integer'
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'The name field is required.',
            'min_length' => 'The name must be at least {param} characters long.',
            'max_length' => 'The name cannot exceed {param} characters in length.'
        ],
        'username' => [
            'required' => 'The username field is required.',
            'min_length' => 'The username must be at least {param} characters long.',
            'max_length' => 'The username cannot exceed {param} characters in length.',
            'is_unique' => 'The username is already taken, please choose another one.'
        ],
        'email' => [
            'required' => 'The email field is required.',
            'valid_email' => 'Please enter a valid email address.',
            'is_unique' => 'The email is already registered, please choose another one.'
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min_length' => 'The password must be at least {param} characters long.'
        ],
        'role_id' => [
            'required' => 'The role field is required.',
            'integer' => 'The role must be an integer.'
        ]
    ];


    public function getRole()
    {
        return $this->belongsTo('App\Models\RoleModel', 'role_id', 'id');
    }

    protected $skipValidation = false;
}

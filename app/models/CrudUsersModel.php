<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class CrudUsersModel extends Model
{
    protected $table = 'crud_users';
    protected $primary_key = 'id';
    protected $fillable = ['username', 'password', 'role'];
    protected $guarded = ['id', 'created_at'];
}
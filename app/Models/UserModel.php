<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'lname', 'email', 'password', 'gender', 'phone_number', 'subject', 'profile_images'];
}
?>
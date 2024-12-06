<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function formPage()
    {
        return view('user_form');
    }

    public function tablePage()
    {
        return view('user_table');
    }

    public function fetchUsers()
    {
        $users = $this->userModel->findAll();
        return $this->response->setJSON($users);
    }

    public function createUser()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_space|min_length[3]',
            'lname' => 'required|alpha|min_length[3]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'gender' => 'required|in_list[Male,Female]',
            'phone_number' => 'required|numeric|min_length[10]',
            'subject' => 'required|in_list[MBA,MCA,BCA,BBA]',
            'profile_images' => 'uploaded[profile_images]|mime_in[profile_images,image/jpg,image/jpeg,image/png,image/webp]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ]);
        }

        $profileImage = $this->request->getFile('profile_images');
        $profileImageName = null;

        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            $profileImageName = $profileImage->getRandomName();
            $profileImage->move(ROOTPATH .'public/uploads/', $profileImageName);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'lname' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'gender' => $this->request->getPost('gender'),
            'phone_number' => $this->request->getPost('phone_number'),
            'subject' => $this->request->getPost('subject'),
            'profile_images' => $profileImageName,
        ];

        if ($this->userModel->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Record inserted successfully.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to insert record.',
            ]);
        }
    }
    public function deleteUser($id)
    {;
        if ($this->userModel->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User Delete Successfully.']);
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'failed to delete user.']);
    }

    public function updateUser()
    {
        $userModel = new UserModel();
        $id = $this->request->getPost('userId');

        $data = [
            'username' => $this->request->getPost('username'),
            'lname' => $this->request->getPost('lname'),
            'email' => $this->request->getPost('email'),
            'gender' => $this->request->getPost('gender'),
            'phone_number' => $this->request->getPost('phone_number'),
            'subject' => $this->request->getPost('subject'),
        ];

        if ($file = $this->request->getFile('profile_images')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move(ROOTPATH . 'public/uploads/', $fileName);
                $data['profile_images'] = $fileName;
            }
        }

        if ($userModel->update($id, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'User updated successfully']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update user']);
        }
    }


    public function fetchUser($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);
        if ($user) {
            return $this->response->setJSON(['status' => 'success', 'data' => $user]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
        }
    }
}
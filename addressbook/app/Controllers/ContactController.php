<?php

namespace App\Controllers;
use App\Models\ContactModel;

class ContactController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $model = new ContactModel();
        $data['contacts'] = $model->findAll();
        return view('contacts/index', $data);
    }

    public function create()
    {
        $data = [];
        $data['validation'] = \Config\Services::validation();
        return view('contacts/create', $data);
    }

    public function store()
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Name is required',
                    'min_length' => 'Name must be at least 3 characters long',
                    'max_length' => 'Name cannot exceed 100 characters'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please enter a valid email address',
                    'max_length' => 'Email cannot exceed 100 characters'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[20]',
                'errors' => [
                    'required' => 'Phone number is required',
                    'min_length' => 'Phone number must be at least 10 characters long',
                    'max_length' => 'Phone number cannot exceed 20 characters'
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Address is required',
                    'min_length' => 'Address must be at least 10 characters long'
                ]
            ],
            'location' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select a location'
                ]
            ],
            'job_position' => [
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required' => 'Job position is required',
                    'min_length' => 'Job position must be at least 2 characters long',
                    'max_length' => 'Job position cannot exceed 100 characters'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return view('contacts/create', [
                'validation' => $this->validator
            ]);
        }

        $model = new ContactModel();
        $model->save($this->request->getPost());
        return redirect()->to('/')->with('success', 'Contact added successfully');
    }

    public function edit($id)
    {
        $model = new ContactModel();
        $data['contact'] = $model->find($id);
        $data['validation'] = \Config\Services::validation();
        return view('contacts/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Name is required',
                    'min_length' => 'Name must be at least 3 characters long',
                    'max_length' => 'Name cannot exceed 100 characters'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|max_length[100]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please enter a valid email address',
                    'max_length' => 'Email cannot exceed 100 characters'
                ]
            ],
            'phone' => [
                'rules' => 'required|min_length[10]|max_length[20]',
                'errors' => [
                    'required' => 'Phone number is required',
                    'min_length' => 'Phone number must be at least 10 characters long',
                    'max_length' => 'Phone number cannot exceed 20 characters'
                ]
            ],
            'address' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Address is required',
                    'min_length' => 'Address must be at least 10 characters long'
                ]
            ],
            'location' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select a location'
                ]
            ],
            'job_position' => [
                'rules' => 'required|min_length[2]|max_length[100]',
                'errors' => [
                    'required' => 'Job position is required',
                    'min_length' => 'Job position must be at least 2 characters long',
                    'max_length' => 'Job position cannot exceed 100 characters'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return view('contacts/edit', [
                'contact' => $this->request->getPost(),
                'validation' => $this->validator
            ]);
        }

        $model = new ContactModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/')->with('success', 'Contact updated successfully');
    }

    public function delete($id)
    {
        $model = new ContactModel();
        $model->delete($id);
        return redirect()->to('/');
    }
}
<?php

namespace App\Controllers;
use App\Models\ContactModel;

class ContactController extends BaseController
{
    public function index()
    {
        $model = new ContactModel();
        $data['contacts'] = $model->findAll();
        return view('contacts/index', $data);
    }

    public function create()
    {
        return view('contacts/create');
    }

    public function store()
    {
        $model = new ContactModel();
        $model->save($this->request->getPost());
        return redirect()->to('/');
    }

    public function edit($id)
    {
        $model = new ContactModel();
        $data['contact'] = $model->find($id);
        return view('contacts/edit', $data);
    }

    public function update($id)
    {
        $model = new ContactModel();
        $model->update($id, $this->request->getPost());
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $model = new ContactModel();
        $model->delete($id);
        return redirect()->to('/');
    }
}


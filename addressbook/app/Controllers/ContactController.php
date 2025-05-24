<?php

namespace App\Controllers;
use App\Models\ContactModel;
use Dompdf\Dompdf;
use Dompdf\Options;

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
        return view('contacts/create');
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'required|min_length[10]|max_length[20]',
            'address' => 'required|min_length[10]',
            'location' => 'required',
            'job_position' => 'required|min_length[2]|max_length[100]'
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
        return view('contacts/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]',
            'phone' => 'required|min_length[10]|max_length[20]',
            'address' => 'required|min_length[10]',
            'location' => 'required',
            'job_position' => 'required|min_length[2]|max_length[100]'
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

    public function exportPDF()
    {
        $model = new ContactModel();
        $contacts = $model->findAll();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
        
        $html = view('contacts/pdf_template', ['contacts' => $contacts]);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        return $dompdf->stream('address_book.pdf', ['Attachment' => 0]);
    }
}
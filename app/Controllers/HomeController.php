<?php
namespace App\Controllers;

use App\Models\Contact;


class HomeController  extends Controller
{
    public function index() 
    {  
        $contact = new Contact();

        $contact->query('SELECT * FROM contacts');

        return $contact->fetchAll();

        return $this->view('home', [
            'title' => 'Home Page',
            'content' => 'Welcome to the home page!'
        ]);
    }
}

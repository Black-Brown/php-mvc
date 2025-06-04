<?php
namespace app\Controllers;

class HomeController  extends Controller
{
    public function index() 
    {
        return $this->view('home', [
            'title' => 'Home Page',
            'content' => 'Welcome to the home page!'
        ]);
    }
}
<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller
{
    public function index()
    {
        $this->call->view('student_home');
    }

    public function profile()
    {
        $student = [
    'student_id' => '2026-12345',
    'name' => 'Kathleen Rose Mercado',
    'course' => 'BS Information Technology',
    'year' => '3rd Year',
    'section' => 'BSIT 3F4',
    'email' => 'rosekathmercado@gmail.com'
];

        $this->call->view('student_profile', $student);
    }
}
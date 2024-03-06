<?php

class Home extends Controller
{
    public function Index()
    {
        $model = new Model();
        $data = $model->findAll();
        show($data);

        $this->view('home');
    }
}
<?php
namespace  Controllers;

require_once __DIR__ . '/../Models/User.php';

use Models\User;

class UserController
{
    public function register()
    {
        //$userName = 'John Doe';
        include __DIR__ . '/../Views/register.php'; // include the view file
        $view_content = ob_get_clean(); // get the contents of the output buffer and clean it
        echo $view_content; // echo the contents
    }

    public function store($request)
    {
        $user = new User();
        $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => password_hash($request['password'], PASSWORD_DEFAULT)
        ]);

        session_start();
        $_SESSION['success'] = 'User created successfully';
        header('Location: /');
        exit();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-user', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->save();

        return redirect('/users');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }
}
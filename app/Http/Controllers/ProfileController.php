<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
}

// function update(Request $request, $id)
// {
//     $profile = Profile::find($id);
// }
?>
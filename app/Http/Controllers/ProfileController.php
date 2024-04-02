<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->hasFile('image')) {
            $avatar = request()->file('image')->getClientOriginalName();
            request()->file('image')->storeAs('public/images', $avatar);
            $user->avatar = $avatar;
        }

        $user->update();
        return back();
    }
}

// function update(Request $request, $id)
// {
//     $profile = Profile::find($id);
// }
?>
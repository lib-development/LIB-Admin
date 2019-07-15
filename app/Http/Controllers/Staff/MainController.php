<?php

namespace App\Http\Controllers\Staff;

use DB;

use App\Models\User;
use App\Models\UserType;
use App\Mail\NewStaff;

use App\Http\Requests\AddStaff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class MainController extends Controller
{

    public function addStaff()
    {
        $user_types = ['Select staff role'] + UserType::pluck('name', 'id')->toArray();
        return view('pages.add_staff')->with(compact('user_types'));
    }

    public function removeStaff($staffId)
    {
        $id = encrypt_decrypt('decrypt', $staffId);
        if ($id === auth()->user()->id) {
            session()->flash('alert-warning', 'You cannot remove yourself, contact Admin for assistance!');
            return back();
        }
        $deleteStaff = User::where('id', $id)->first();
        $staffName = $deleteStaff->name;

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $deleteStaff->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        session()->flash('alert-success', "You removed $staffName as a staff of LIB.");
        return redirect('/staffs');
    }

    public function addStaffComplete(AddStaff $request)
    {
        $data = $request->all();
        $user = User::create($data);
        //send email to the use r
        $type = UserType::where('id', $data['user_type_id'])->first();
        $mailMessage = "<h3 style='font-size: 16px;'>Hi " . $data['name'] . ",</h3>\n<h5 style='font-size: 14px;'>You have been invited as an " . strtoupper($type->name) . " on LIB.\nFollow thw link below to
        activate your account.</h5><br/> <br/><center> <a href='http://" . $_SERVER['HTTP_HOST'] . "/auth' style='padding: 10px 20px;border-radius: 5px;background: #811;text-decoration: none; color: #fff;'>Go to Dashboard</a></center>";

        $info = [
            'email' => $data['email'],
            'subject' => "Invitation to join Linda Ikeji's Blog",
            'message' => $mailMessage,
            'from' => "LIB"
        ];

        Mail::to($info['email'])->send(new NewStaff($info));

        session()->flash('alert-info', $data['name'] . ' has been invited to join LIB');
        return redirect()->to('/staffs');
    }

    public function staffs()
    {
        $staffs = User::where("email", "!=", "")->paginate(20);
        return view('pages.staffs')->with(compact('staffs'));
    }

    public function staffRoleAssign($staffId, $role)
    {
        $id = encrypt_decrypt('decrypt', $staffId);
        if ($id === auth()->user()->id) {
            session()->flash('alert-warning', 'You cannot manage your role at this time, kindly contact the Admininstrator!');
            return back();
        }
        User::where("id", $id)->update(['user_type_id' => $role]);
        return back();
    }
}

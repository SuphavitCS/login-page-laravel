<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // สร้างฟังก์ชันสำหรับแสดงหน้ารีจิสเตอร์
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        // ตรวจสอบข้อมูลที่ได้รับจากฟอร์มรีจิสเตอร์
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        // สร้างผู้ใช้ใหม่ในฐานข้อมูล
        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        // ส่งอีเมลยืนยันการลงทะเบียน
        $user->sendEmailVerificationNotification();
        // เปลี่ยนเส้นทางผู้ใช้ไปยังหน้าอื่นหลังจากลงทะเบียนสำเร็จ
        return redirect()->route('verification.notice');
    }
    // store 1. ตรวจสอบข้อมูลที่ได้รับจากฟอร์มรีจิสเตอร์ 2. สร้างผู้ใช้ใหม่ในฐานข้อมูล 3. ส่งอีเมลยืนยันการลงทะเบียน 4. เปลี่ยนเส้นทางผู้ใช้ไปยังหน้าอื่นหลังจากลงทะเบียนสำเร็จ
    // คืนค่าไปหน้าอื่นหลังจากลงทะเบียนสำเร็จ
}

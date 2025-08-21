@extends('layouts.app')

@section('content')
<div class="container" style="max-width:420px">
  <h1 class="mb-3">สมัครสมาชิก</h1>

  @if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
  @endif

  <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">ชื่อ</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="mb-3">
      <label class="form-label">อีเมล</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">รหัสผ่าน</label>
      <input type="password" name="password" class="form-control" required>
      <small class="text-muted">อย่างน้อย 8 ตัวอักษร</small>
    </div>

    <div class="mb-3">
      <label class="form-label">ยืนยันรหัสผ่าน</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100">สมัครสมาชิก</button>
  </form>
</div>
@endsection

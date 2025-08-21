@extends('layouts.app')

@section('content')
<div class="container" style="max-width:520px">
  <h1 class="mb-3">ยืนยันอีเมลของคุณ</h1>
  <p>เราได้ส่งลิงก์ยืนยันไปที่อีเมลของคุณแล้ว หากยังไม่ได้รับ คลิกปุ่มด้านล่างเพื่อส่งอีกครั้ง</p>

  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button class="btn btn-primary">ส่งอีเมลยืนยันอีกครั้ง</button>
  </form>
</div>
@endsection

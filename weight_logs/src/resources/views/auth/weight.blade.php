@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('link')
<a class="header__link" href="/login">login</a>
@endsection

@section('content')
<div class="register-form">
  <h2 class="register-form__heading content__heading">新規会員登録</h2>
  <h3 class="register-form__heading content__heading">STEP2 体重データの入力</h3>
  <div class="register-form__inner">
    <form class="register-form__form" action="/register/step2" method="post">
      @csrf
      <div class="register-form__group">
        <label class="register-form__label">現在の体重</label>
        <input class="register-form__input" type="text" name="name" placeholder="現在の体重を入力">
        <p class="register-form__error-message">
          @error('weight')
          {{ $message }}
          @enderror
        </p>
      </div>
      <div class="register-form__group">
        <label class="register-form__label" for="target_weight">目標の体重</label>
        <input class="register-form__input" type="text" name="trget_weight" placeholder="目標の体重を入力">
        <p class="register-form__error-message">
          @error('target_weight')
          {{ $message }}
          @enderror
        </p>
      </div>
      <input class="register-form__btn btn" type="submit" value="登録">
    </form>
  </div>
</div>
@endsection('content')

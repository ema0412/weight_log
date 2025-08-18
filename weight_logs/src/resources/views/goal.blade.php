@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/goal.css')}}">
@endsection

@section('link')
<a class="header__link" href="/weight_logs/goal_setting">目標体重設定</a>
<input class="header__link" type="submit" value="logout">
@endsection

@section('content')
<div class="goal-form">
  <h2 class="goal-form__heading content__heading">目標体重設定</h2>
  <div class="goal-form__inner">
    <form class="goal-form__form" action="/weight_logs" method="post">
      @csrf
    <div class="goal-form__group">
        <label class="goal-form__label" for="target_weight">目標の体重</label>
        <input class="goal-form__input" type="text" name="trget_weight" placeholder="目標の体重を入力">
        <p class="goal-form__error-message">
          @error('target_weight')
          {{ $message }}
          @enderror
        </p>
      </div>
      <input class="goal-form__btn btn" type="submit" value="更新">
      <input class="confirm-form__back-btn" type="submit" value="戻る">
    </form>
  </div>
</div>
@endsection('content')

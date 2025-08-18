@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <a class="header__link" href="/weight_logs/goal_setting">目標体重設定</a>
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="contents" id="{{'$WeightLog->id'}}">
  <div class="contents__inner">
  <div class="contents__content">
   <form class="contents__contents-form" action="/weight_logs/{:weightLogId}/update" method="post">
    @csrf
    <div class="contents-form__group">
     <label class="contents-form__label" for="">日付
     <span class="contents-form__required">
     </label>
     <input class="contents-form__input" type='date' name="date" id="date" value="{{old('date')}}"</input>
      <p class="contents-form__error-message">
       @error('date')
        {{ $message }}
       @enderror
      </p>
   </div>

    <div class="contents-form__group">
     <span class="contents-form__label" for="">体重
     <span class="contents-form__required">
     <input class="contents-form__input" type='text' name="weight" id="weight" value="{{old('weight')}}"
      placeholder="50.0" >{{ old('weight') }}</input>
     <p class="contents-form__error-message">
      @error('weight')
       {{ $message }}
      @enderror
      </p>
    </div>

    <div class="contents-form__group">
     <label class="contents-form__label" for="">摂取カロリー</label>
       <span class="contents-form__required">
     </label>
     <input class="contents-form__input" type='text' name="calories" id="calories" value="{{old('calories')}}"
      placeholder="50.0" >{{ old('calories') }}</input>
      <p class="contents-form__error-message">
        @error('calories')
         {{ $message }}
        @enderror
    </div>

    <div class="contents-form__group">
     <label class="contents-form__label" for="">運動時間</label>
       <span class="contents-form__required">
     </label>
     <input class="contents-form__input" type='text' name="exercise_time" id="exercise_time" value="{{old('exercise_time')}}"
      placeholder="00.00" >{{ old('exercise_time') }}</input>
     <p class="contents-form__error-message">
        @error('exercise_time')
         {{ $message }}
        @enderror
     </p>
    </div>

    <div class="contents-form__group">
    <label class="contents-form__label" for="">運動内容</label>
     <span class="contents-form__required">
    </label>
    <input class="contents-form__input" type='text' name="exercise_content" id="exercise_content" value="{{old('exercise_content')}}"
     placeholder="運動内容を入力" >{{ old('exercise_content') }}</input>
     <p class="contents-form__error-message">
       @error('exercise_content')
         {{ $message }}
       @enderror
     </p>
    </div>

              
    <div class="button-content">
     <a href="/weight_logs" class="back">戻る</a>
     <button type="submit" class="button-change">更新</button>
     <div class="trash-can-content">
        <a href="/weight_logs">
          <img src="{{ asset('/images/trash-can.png') }}" alt="ゴミ箱の画像" class="img-trash-can" />
       </a>
     </div>
    </div>
</div>
@endsection
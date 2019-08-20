<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Settings Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link href="{{ asset('css/board.css') }}" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<header>
  <h1>Settings</h1>
</header>
<div class='container'>
  <div class='sidebar'>
    <div class='sidebar__header'>
      <img alt='' class='sidebar__avatar' src='https://unsplash.it/30/?image=209'>
      <p>Profile</p>
    </div>
    {{-- <div class='sidebar__menu-item'>
      <i class='fa fa-university'></i>
      Balance
      <div class='sidebar__label'>
        800
      </div>
    </div>
    <div class='sidebar__menu-item'>
      <i class='fa fa-bar-chart'></i>
      Statistics
    </div> --}}
    <div class='sidebar__menu-item sidebar__menu-item--active'>
      <i class='fa fa-cog'></i>
      Settings
    </div>
    {{-- <div class='sidebar__menu-item'>
      <i class='fa fa-suitcase'></i>
      Transactions
    </div> --}}
    {{-- <div class='sidebar__menu-item'>
      <i class='fa fa-envelope-o'></i>
      Help
      <div class='sidebar__badge'>
        3
      </div>
    </div>
    <div class='sidebar__menu-item'>
      <i class='fa fa-user-plus'></i>
      Referals
    </div> --}}
  </div>
  <div class='main'>
    <div class='main__header'>
      <h2>Your Settings</h2>
    </div>
    <div class='main__content'>
      <div class='main__avatar'>
        <div class='main__avatar--overlay'>
          Settings
        </div>
      </div>
      <div class='main__settings-form'>
                  @include('partials.error')
                  
                  <form action="{{ route('settings.update') }}" method="post">
                              {{ csrf_field()}}
          <label class='main__input-label'>Your name:</label>
          <input class='main__input' placeholder='' type='text' name="name" value="{{ $settings -> name }}">
          <label class='main__input-label'>Your e-mail:</label>
          <input class='main__input'  type='text' name="email" value="{{ $settings -> email }}">
          <label class='main__input-label'>Address:</label>
          <input class='main__input' placeholder='' type='text' name="address" value="{{ $settings -> address  }}">
          <label class='main__input-label'>Contact:</label>
          <input class='main__input' placeholder='' type='number' name="number" value="{{ $settings -> number }}">
      
        <button class='btn main__save-button' type="submit">Save</button>
        <button class='btn main__cancel-button'>Cancel</button>
      </form>
      </div>
    </div>
  </div>
</div>
<footer>
  2015 &copy; App. All rights reserved.
</footer>
<!-- partial -->
  
</body>
</html>
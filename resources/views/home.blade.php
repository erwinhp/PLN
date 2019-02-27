@extends('layouts.dash')
@section('content')

<span class="a">
<img src="http://3.bp.blogspot.com/-svhCMHuqHkY/VEZ1gCZD5FI/AAAAAAAAAS4/ADq4LZnUVkU/s1600/kntr.jpg">
<img src="http://3.bp.blogspot.com/-svhCMHuqHkY/VEZ1gCZD5FI/AAAAAAAAAS4/ADq4LZnUVkU/s1600/kntr.jpg">
<img src="http://3.bp.blogspot.com/-svhCMHuqHkY/VEZ1gCZD5FI/AAAAAAAAAS4/ADq4LZnUVkU/s1600/kntr.jpg">
</span>

    <ul class="slides">
    <input type="radio" name="radio-btn" id="img-1" checked />
    <li class="slide-container">
        <div class="slide">
        <img class="irc_mi" src="https://1.bp.blogspot.com/-7OR6DBO_1ak/V-Qqb3Ik-SI/AAAAAAAAAIE/QtAveRh1JegcNKUmPZAEHgNr6cgyAwq3QCLcB/s1600/  PETA%2BKAL%2BSEL.jpg"/>
        <div class="sb-description">
        <h4>PETA KALSEL</h4>
    </div>
        <div class="nav">
            <label for="img-6" class="prev">&#x2039;</label>
            <label for="img-2" class="next">&#x203a;</label>
        </div>
    </li>
        
    <input type="radio" name="radio-btn" id="img-2" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://3.bp.blogspot.com/-svhCMHuqHkY/VEZ1gCZD5FI/AAAAAAAAAS4/ADq4LZnUVkU/s1600/kntr.jpg" />
        </div>
        <div class="nav">
            <label for="img-1" class="prev">&#x2039;</label>
            <label for="img-3" class="next">&#x203a;</label>
        </div>
    </li>

    <input type="radio" name="radio-btn" id="img-3" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8068/8250438572_d1a5917072_z.jpg" />
        </div>
        <div class="nav">
            <label for="img-2" class="prev">&#x2039;</label>
            <label for="img-4" class="next">&#x203a;</label>
        </div>
    </li>

    <input type="radio" name="radio-btn" id="img-4" />
    <li class="slide-container">
        <div class="slide">
          <img src="http://farm9.staticflickr.com/8061/8237246833_54d8fa37f0_z.jpg" />
        </div>
        <div class="nav">
            <label for="img-3" class="prev">&#x2039;</label>
            <label for="img-5" class="next">&#x203a;</label>
        </div>
    </li>

   <input type="radio" name="radio-btn" id="img-5" />
    <li class="slide-container">
        <div class="slide">
          <img src="https://images7.alphacoders.com/686/thumb-1920-686798.jpg" />
        </div>
        <div class="nav">
            <label for="img-4" class="prev">&#x2039;</label>
            <label for="img-6" class="next">&#x203a;</label>
        </div>
    </li>

    <input type="radio" name="radio-btn" id="img-6" />
    <li class="slide-container">
        <div class="slide">
          <img src="https://ak1.picdn.net/shutterstock/videos/15961801/thumb/11.jpg" />
        </div>
        <div class="nav">
            <label for="img-5" class="prev">&#x2039;</label>
            <label for="img-1" class="next">&#x203a;</label>
        </div>
    </li>

    <li class="nav-dots">
      <label for="img-1" class="nav-dot" id="img-dot-1"></label>
      <label for="img-2" class="nav-dot" id="img-dot-2"></label>
      <label for="img-3" class="nav-dot" id="img-dot-3"></label>
      <label for="img-4" class="nav-dot" id="img-dot-4"></label>
      <label for="img-5" class="nav-dot" id="img-dot-5"></label>
      <label for="img-6" class="nav-dot" id="img-dot-6"></label>
    </li>
</ul>
</ul>


<link rel="stylesheet" href="{{URL::to('/')}}/assets/libs/css/Home.css">
@endsection
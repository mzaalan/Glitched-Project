@extends('layouts.app')

@section('content')

<div class="container">

  

        <div data-tockify-component="calendar" data-tockify-calendar="appnaga"></div>

        <script data-cfasync="false" data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>

   

        <button data-toggle="collapse" class="btn btn-info" data-target="#prev-events" style="margin: 20px">Archived Events</button>

        <div id="prev-events" class="collapse">

        <h2>Previous Events:</h2>

        <span>

                <ul>
                        <li><u>06/16/18 - EID Dinner</u></li>

                        <li><u>04/29/18 - Spring Bazar with Physicians Lunch and Learn</u></li>

                        <li><a href="http://appna.org/" target="_blank">APPNA&nbsp; 40th ANNUAL CONVENTION JULY 5TH TO 9TH, ORLANDO , FLORIDA</a></li>

                        <li><u>AUGUST 13TH . 2ND BUSINESS MEETING</u>&nbsp;</li>

                        <li><u>GA-APPNA HEALTH FAIR 2017 october 8th at Global Mall</u></li>

                        <li><a href="http://ga-appna.org/" target="_blank">GA-APPNA ANNUAL FUNCTION OCTOBER 28TH 2017</a></li>

                        <li>GA-APPNA CRICKET MATCH AND MELA</li>

                        <li><a href="https://photos.app.goo.gl/KKulHBbOF8SNeQUp1"><u>Fashion Show and Cultural Event</u></a></li>

                </ul>

        </div>

        <br>

        </span>

        <span> 



                <!-- <h4></h4> <p>APRIL 16TH, 2017​</p><p style="color:blue">Venue:​ Renaissance Atlanta Waverly</p>

        <img src ="/img/event/fs.png" class="col-md-3 image-responsive pull-left" style=" margin:10px;"> -->

        </span>

        

</div>

@endsection
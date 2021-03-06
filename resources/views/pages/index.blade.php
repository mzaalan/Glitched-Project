@extends('layouts.app')
@section('content')
    @include('inc.carousel')
    
     <!-- Grey box -->
    <div class="header-box">    </div>

    <!-- Left Container -->
     
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-xs-3 col-md-1">
                
            </div>


        <!-- Center Container -->

            <div class="col-md-7 col-xs-6">
                <h1 class="text-center" style=" margin-bottom:50px;">Welcome to GA-APPNA Chapter</h1>
                <hr>
                <h3 class="text-left" style="color: #6cbd45; font-weight:700;">PRESIDENT/EC STATEMENT</h3>
                <p class="text-left">Welcome to 2018 and welcome to the new Executive committee of GA-APPNA.  GA-APPNA new executive committee is looking forward to serve not only its physician community but also to become the voice of the entire Pakistani community living in Georgia and far. Our previous cabinets have done a wonderful job to expand membership, further community work and organize exciting entertainment programs. We plan to have some of the previous well-received programs, but also to bring some exciting changes. As with any other organization, GA APPNA's strength lies within its members. The bigger the membership base, the more strength. So, please renew your memberships, encourage your friends and colleagues to become GA APPNA members and simply get involved to make a difference. Together we can make GA APPNA the most vibrant chapter of APPNA. Our motto for this year is “<strong>together we can</strong>”. We are looking forward to serve you all and have a great and a productive year.</p>
                <p class="text-left">I wish all of you a very happy prosperous year.</p>
                <p class="text-left">Regards,<br />Dr. Saeed Zafar<br />President GA-APPNA 2018</p>    
            </div>
        <!-- Right Container -->
            <div class="col-md-3 executives">
                <div class="row ">
                    <div class="box"><h4>Events</h4></div>
                    <iframe src="https://calendar.google.com/calendar/embed?src=41hu6irabhjesl75ja6s93p2ls%40group.calendar.google.com&ctz=America%2FNew_York" style="border: 0; height:400px; width:100%"  frameborder="0" scrolling="no"></iframe>
                    <div class = "right-container">
                        <div data-tockify-component="mini" data-tockify-calendar="appnaga"></div>
                        <script data-cfasync="false" data-tockify-script="embed" src="https://public.tockify.com/browser/embed.js"></script>   
                    </div>
                </div>                
            </div>         
            
        </div>
        <div class="row executives">
                    <hr>
                    <h3 class="text-center" style="font-weight:700; color: #6cbd45;"> EXECUTIVE MEMBERS</h3>
                    <div class="column">
                        <div class="card">
                        <img src="/img/SaeedPresident.JPG" alt="Jane" style="width:200px; height:200px;">
                        <div class="team-container">
                            <h3>Dr. Saeed Zafar</h3>
                            <p class="title">President</p>
                        </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                        <img src="/img/Syed.jpg" alt="Jane" style="width:200px; height:200px;">
                        <div class="team-container">
                            <h3>Dr. Shaukat Ali</h3>
                            <p class="title">General Secretary</p>
                        </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                        <img src="/img/SaadiaTreasurer.JPG" alt="Jane" style="width:200px; height:200px;">
                        <div class="team-container">
                            <h3>Dr. Saadia Khizer</h3>
                            <p class="title">Treasurer</p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <img src="/img/president.jpg" alt="Jane" style="width:200px; height:200px;">
                        <div class="team-container">
                            <h3>Dr. Asher Niazi</h3>
                            <p class="title">Immediate Past President</p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <img src="/img/RoohiPresident2019.jpg" alt="Jane" style="width:200px; height:200px;">
                        <div class="team-container">
                            <h3>Dr. Roohi Abubaker </h3>
                            <p class="title">President Elect 2018</p>
                        </div>
                        </div>
                    </div>
                {{--  <div class="wrapper">
                    <img src="http://via.placeholder.com/200x200" alt="Avatar" class="image">
                    <div class="overlay">
                        <p class="text"><a href="mailto:saeeduzafar@yahoo.com"><strong>Dr. Saeed Zafar</strong></a><br><small>President</small></p>
                    </div>
                </div>
                <div class="wrapper">
                    <img src="http://via.placeholder.com/200x200" alt="Avatar" class="image">
                    <div class="overlay">
                        <p div class="text"><a href="#"><strong>Dr. Shaukat Ali</strong></a><br><small>Secretary</small></p>
                    </div>
                </div>
                <div class="wrapper">
                    <img src="http://via.placeholder.com/200x200" alt="Avatar" class="image">
                    <div class="overlay">
                        <p div class="text"><a href="mailto:sasha91443@aol.com"><strong>Dr. Saadia Khizer</strong></a><br><small>Treasurer</small></p>
                    </div>
                </div>  --}}
                </div>  
            </div>
    </div>
@endsection
@extends('home.layouts.body')

@section('slide-shows')
    <div class="row carousel-row" style="margin-top: 80px">
        <div class="slide-row">
            <div class="carousel slide slide-carousel" id="carousel-1" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($carousel as $ind=>$img)
                    <li data-target="#carousel-1" data-slide-to="{{ $ind }}" class="{{ $ind === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach($carousel as $ind=>$img)
                    <div class="item {{ $ind === 0 ? 'active' : '' }}" style="max-height: 630px; height: 630px;">
                        <img class="img-responsive" src="{{asset($img)}}" alt="Image" style="min-width: 100%; height: 100%">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('why-jil')
    <div class="row text-center">
        <br><br>
        <p>THIS SITE IS CURRENTLY UNDER DEVELOPMENT</p>
        <h1>Why JIL?</h1>
        <br><br>
        <!-- images -->
        <div class="col-sm-4">
            <div class="form-group">
                <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/why/character.png")}}"
                                 alt="Image"></a>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
            <p><a class="btn btn-info" href="#" role="button">Learn more &raquo;</a></p>
        </div>

        <div class=" hidden-md hidden-lg">
            <br><br>
        </div>


        <!-- images -->
        <div class="col-sm-4">
            <div class="form-group">
                <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/why/driven.png")}}"
                                 alt="Image"></a>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
            <p><a class="btn btn-info" href="#" role="button">Learn more &raquo;</a></p>
        </div>

        <div class=" hidden-md hidden-lg">
            <br><br>
        </div>

        <!-- images -->
        <div class="col-sm-4">
            <div class="form-group">
                <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/why/leaders.png")}}"
                                 alt="Image"></a>
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
            <p><a class="btn btn-info" href="#" role="button">Learn more &raquo;</a></p>
        </div>

    </div>
@endsection

@section('tracks')
    <div class="row text-center" id="tracks">
        <br><br>

        <h1>Offered Tracks</h1>
        <p class="text-muted">Lists of available tracks</p>
        <br><br>

        <!-- images -->
        @foreach($tracks as $title=>$img)
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{ asset($img) }}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track1</a>
                <p>{{ $title }}</p>
            </div>
        </div>
        @endforeach

    </div>
@endsection

@section('about')
    <div class="row text-center" id="about">
        <br><br>

        <h1>About Us</h1>
        <p class="text-muted">The History within us</p>
        <br><br>
    </div>

    <!-- left -->
    <div class="row text-center">
        <div class="col-sm-4 col-xs-12 text-right">
            <p><strong>2009-2011</strong></p>
            <p><strong>Our Success</strong></p>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-sm-4">
            <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/5.jpg")}}" alt="Image"></a>
        </div>
    </div>

    <div class="row">
        <div class="vertical-line"></div>
    </div>

    <!-- right -->
    <div class="row text-center">
        <div class="col-sm-4 col-xs-12 text-left pull-right">
            <p><strong>2005-2009</strong></p>
            <p><strong>Expansion</strong></p>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-sm-offset-4 col-sm-4">
            <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/5.jpg")}}" alt="Image"></a>
        </div>
    </div>

    <div class="row">
        <div class="vertical-line"></div>
    </div>

    <!-- left -->
    <div class="row text-center">
        <div class="col-sm-4 col-xs-12 text-right">
            <p><strong>1990-2005</strong></p>
            <p><strong>Transition to full service</strong></p>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-sm-4">
            <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/5.jpg")}}" alt="Image"></a>
        </div>
    </div>

    <div class="row">
        <div class="vertical-line"></div>
    </div>

    <!-- right -->
    <div class="row text-center">
        <div class="col-sm-4 col-xs-12 text-left pull-right">
            <p><strong>1980-1990</strong></p>
            <p><strong>Our Humble Beginnings</strong></p>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="col-sm-offset-4 col-sm-4">
            <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/5.jpg")}}" alt="Image"></a>
        </div>
    </div>

    <div class="row">
        <div class="vertical-line"></div>
    </div>

    <div class="row text-center">
        <div class="col-sm-offset-4 col-sm-4">
            <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/5.jpg")}}" alt="Image"></a>
        </div>
    </div>
@endsection

@section('sponsors')
    <br><br><br><br>
    <div class="row">
        @foreach($sponsors as $img)
        <div class="col-sm-3">
            <img class="img-sponsors" src="{{asset($img)}}">
        </div>
        @endforeach
    </div>
@endsection

@section('contact')
    <div class="container-contact" id="contact">
        <div class="text-center">

            <div class="footer-text">
                <h1>Contact Us</h1>
                <p class="text-muted">Join Us</p>
                <div class="row">
                    <form class="form-horizontal">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="phone" placeholder="Your Phone Number">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <textarea rows="6" class="form-control" placeholder="Your Message"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <div class="col-sm-4 col-sm-offset-4">
                            <br>
                            <a class="btn btn-default btn-lg center-block" href="#">Send Message</a>
                        </div>

                    </form>

                </div>

            </div>

            <img class="img-footer" src="{{asset("images/school/feedback.jpeg")}}" alt="image">

        </div>
    </div>
@endsection
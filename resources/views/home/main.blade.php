@extends('home.layouts.body')

@section('slide-shows')
    <div class="row carousel-row" style="margin-top: 80px;">
        <div class="slide-row">
            <div class="carousel slide slide-carousel" id="carousel-1" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset('images/1.jpg')}}" alt="Image">
                    </div>
                    <div class="item">
                        <img src="{{asset('images/1.jpg')}}" alt="Image">
                    </div>
                    <div class="item">
                        <img src="{{asset('images/1.jpg')}}" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('why-jil')
    <div class="row text-center">
        <br><br>

        <h1>Why JIL?</h1>
        <br><br>
        <!-- images -->
        <div class="col-sm-4">
            <div class="form-group">
                <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/2.png")}}"
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
                <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/2.png")}}"
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
                <a href="#"><img class="img-responsive img-rounded-super" src="{{asset("images/2.png")}}"
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
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{asset("images/4.jpg")}}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track1</a>
                <p>Lorem ipsum</p>
            </div>
        </div>

        <!-- images -->
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{asset("images/4.jpg")}}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track2</a>
                <p>Lorem ipsum</p>
            </div>
        </div>

        <!-- images -->
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{asset("images/4.jpg")}}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track3</a>
                <p>Lorem ipsum</p>
            </div>
        </div>

        <div class="clearfix"></div>
        <br>

        <!-- images -->
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{asset("images/4.jpg")}}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track4</a>
                <p>Lorem ipsum</p>
            </div>
        </div>

        <!-- images -->
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{asset("images/4.jpg")}}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track5</a>
                <p>Lorem ipsum</p>
            </div>
        </div>

        <!-- images -->
        <div class="col-sm-4">
            <p><a href="#"><img class="img-responsive" src="{{asset("images/4.jpg")}}" alt="Image"></a></p>
            <div class="col-sm-10 col-sm-offset-1">
                <a href="#">Track6</a>
                <p>Lorem ipsum</p>
            </div>
        </div>

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
        <div class="col-sm-3">
            <img class="img-sponsors" src="{{asset('images/6.jpg')}}" alt="">
        </div>

        <div class="col-sm-3">
            <img class="img-sponsors" src="{{asset('images/6.jpg')}}" alt="">
        </div>

        <div class="col-sm-3">
            <img class="img-sponsors" src="{{asset('images/6.jpg')}}" alt="">
        </div>

        <div class="col-sm-3">
            <img class="img-sponsors" src="{{asset('images/6.jpg')}}" alt="">
        </div>
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

            <img class="img-footer" src="{{asset("images/6.jpg")}}" alt="image">

        </div>
    </div>
@endsection
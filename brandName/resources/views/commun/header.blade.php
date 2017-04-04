<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="./index.html">Helium</a>
            </div>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="#page-top">Home</a></li>
                    <li><a class="page-scroll" href="#services">Services</a></li>
                    <li><a class="page-scroll" href="#testimonial">Testimonial</a></li>
                    <li><a class="page-scroll" href="#features">Features</a></li>
                    <li><a class="page-scroll" href="#team">Team</a></li>
                    <li><a class="page-scroll" href="#pricing">Pricing</a></li>
                    <li><a class="page-scroll" href=".contact">Contact</a></li>
                    <li>
                        @if(Auth::check() )
                            <li class="dropdown">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->email }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @if(Auth::user()->accout == 1)
                                    <li><a href="{{url('products')}}">Add Domain</a></li>
                                    <li><a href="{{url('domainRequest')}}">Domain Request</a></li>
                                    <li role="separator" class="divider"></li>
                                @endif

                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                            </li>
                        @else <a class="" href="javascript:;" data-toggle="modal" data-target="#loginModal"> Login</a>
                        @endif

                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
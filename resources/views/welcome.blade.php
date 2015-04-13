@extends('app')

@section('content')

<body id="cta-image">

<!-- Primary Page Layout
================================================== -->
<header class="block-row">
    <div class="container">
        <div class="four columns"><a href="#" id="header-logo">Total Gig</a></div>
        <div class="twelve columns">
            @include('partials.navbar')
        </div>
    </div>
</header>

<div id="cta">
    <div class="container">
        <div class="eight columns">
            <ul class="block-text">
                <li>Premium Office</li>
                <li>Management</li>
                <li>for the</li>
                <li>Creative Mind</li>
            </ul><!-- block-text -->
        </div><!-- eight columns -->
        <div class="offset-by-three  five columns">
            <button value="Get Started" class="modal-trigger sign-up-trigger">Get Started</button>
        </div><!-- five columns -->
    </div><!-- container -->
</div><!-- CTA -->

<div class="content-container">
    <div class="container">
        <div class="block-row center-row offset-by-one fourteen columns">
            <h1 class="graphic-underline">The All in One Office Management Solution</h1>
            <h2>It's time to get out of the office and spend more time doing what you love. You focus on creativity, we'll focus on the tedious.</h2>
        </div>
        <div class="block-row sixteen columns alpha">
            <h1>The Features You Need to Succeed</h1>

            <div class="feature columns">
                <img src="img/gigs.png" alt="Gigs" /><br>
                <h3>Gigs</h3>
                <p>Every bit of information you could want for a single gig, all in one spot.</p>
            </div><!-- feature gig -->

            <div class="feature columns">
                <img src="img/clients.png" alt="Clients" /><br>
                <h3>Clients</h3>
                <p>Keep track of your clients, their contact information, and location.</p>
            </div><!-- feature clients -->

            <div class="feature columns">
                <img src="img/calendar.png" alt="Calendar View" /><br>
                <h3>Calendar View</h3>
                <p>View all gigs on a calendar, making it easier to schedule future appointments.</p>
            </div><!-- feature calendar -->

            <div class="feature columns">
                <img src="img/invoices.png" alt="Invoices" /><br>
                <h3>Invoices</h3>
                <p>Make charging your clients simpler with downloadable invoices.</p>
            </div><!-- feature invoices -->

            <div class="feature columns">
                <img src="img/contracts.png" alt="Contracts" /><br>
                <h3>Contracts</h3>
                <p>Generate contracts to get things rolling between you and a client.</p>
            </div><!-- feature contracts -->

            <div class="feature columns">
                <img src="img/employees.png" alt="Employees" /><br>
                <h3>Employees</h3>
                <p>Don’t go into a gig alone! Easily keep track of your employees for future work.</p>
            </div><!-- feature employees -->

            <div class="feature columns">
                <img src="img/gear.png" alt="Gear" /><br>
                <h3>Gear</h3>
                <p>Be prepared for gigs by knowing exactly what gear you need to bring.</p>
            </div><!-- feature gear -->

            <div class="feature columns">
                <img src="img/packages.png" alt="Packages" /><br>
                <h3>Service Packages</h3>
                <p>Use packages to easily charge clients according to the services performed.</p>
            </div><!-- feature packages -->

        </div><!-- block-row -->
    </div><!-- container -->

    <div id="testimonials" class="block-row">
        <div class="container">
            <h1>What Our Clients Have to Say</h1>
            <span class="mega-quote one column alpha">&ldquo;</span>
            <p class="offset-by-one twelve columns">When I built Total Gig, the most I'’d have hoped for was a moderate return on
                investment. I figured I would spend a few hours making a program to help me save a couple of minutes a day. I was wrong. The time saved and increased
                production are simply side effects, I have improved my life with Total Gig. I'm able to spend more time with my wife and children.<br>
                <span class="highlight-text"> - Daniel Carroll</span></p>
            <span class="mega-quote offset-by-one one column omega">&rdquo;</span>
        </div><!-- container -->
    </div><!-- testimonials -->

    <div class="container center-row">
        <h1>100% Free!</h1>
        <h2>No credit card subscriptions, no one-time only fees, just sign up and get to work!</h2>
        <div id="get-started-container">
            <button value="Get Started" class="modal-trigger sign-up-trigger">Get Started</button>
        </div><!-- get-started-container -->
    </div><!-- container -->
</div><!-- content-container -->

<footer>
    <div class="container">
        <img src="img/main-logo.png" alt="Total Gig" />
        <a class="highlight-text" href="mailto:support@totalgig.com">support@totalgig.com</a><br>
        <span class="copyright">Copyright &copy; 2015 Total Gig<br>All rights reserved</span>
    </div><!-- container -->
</footer>

<div class="hide fill-background">
</div><!--fill-background -->

<div class="hide modal" id="sign-in-modal">
    <img src="img/main-logo.png" alt="Total Gig" />
    <h1>Sign In</h1>
    <form action="{{ url('/auth/login') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-row">
            <img class="form-icon" src="img/form-email.png" alt="Email" />
            <input type="email" name="email" id="email" placeholder="Email" required />
        </div>

        <div class="form-row">
            <img class="form-icon" src="img/form-password.png" alt="Password" />
            <input type="password" name="password" id="password" placeholder="Password" required />
        </div>

        <input type="submit" value="Sign In" />
    </form>

    <p><span class="modal-trigger sign-up-trigger highlight-text">Register</span> | <span class="modal-trigger sign-up-trigger highlight-text">Forgot your password?</span></p>
</div><!-- sign-in-modal -->

<div class="hide modal" id="sign-up-modal">
    <img src="img/main-logo.png" alt="Total Gig" />
    <h1>Sign Up</h1>
    <form action="{{ url('/auth/register') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-row">
            <img class="form-icon" src="img/form-user.png" alt="Full Name" />
            <input type="text" name="name" id="full-name" placeholder="Full Name" required />
        </div>

        <div class="form-row">
            <img class="form-icon" src="img/form-business.png" alt="Business" />
            <input type="text" name="company_name" id="business" placeholder="Business" required />
        </div>

        <div class="form-row">
            <img class="form-icon" src="img/form-email.png" alt="Email" />
            <input type="email" name="email" id="email" placeholder="Email" required />
        </div>

        <div class="form-row">
            <img class="form-icon" src="img/form-password.png" alt="Password" />
            <input type="password" name="password" id="password" placeholder="Password" required />
        </div>

        <div class="form-row">
            <img class="form-icon" src="img/form-password.png" alt="Confirm Password" />
            <input type="password" name="password_conformation" id="confirm-password" placeholder="Confirm Password" required />
        </div>

        <input type="submit" value="Sign Up" />
    </form>

    <p>Already a memeber? <span class="modal-trigger sign-up-trigger highlight-text">Login</span></p>
</div><!-- sign-up-modal -->


<!-- End Document
================================================== -->
</body>
@stop

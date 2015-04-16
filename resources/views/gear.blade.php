@extends('app')

@section('content')
<!---->
<!--<h1>Gear Page</h1>-->
<!---->
<!--@foreach($gear as $gear)-->
<!---->
<!--<div>-->
<!--    <p>{{ $gear->item_name }}</p>-->
<!--    {!! Form::open(['route'=> ['gear.destroy', $gear->id], 'method'=>'DELETE']) !!}-->
<!--    {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}-->
<!--    {!! Form::close() !!}-->
<!---->
<!--    {!! Form::open(['route'=> ['gear.update', $gear->id], 'method'=>'PUT']) !!}-->
<!--    {!! Form::text('item_name') !!}-->
<!--    {!! Form::submit('Edit', array('class' => 'btn btn-danger')) !!}-->
<!--    {!! Form::close() !!}-->
<!--    <hr>-->
<!--</div>-->
<!--@endforeach-->
<!---->
<!--<form action="{{ action('GearController@store') }}" method="POST">-->
<!--    <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
<!--    <div class="form-row">-->
<!--        <input type="item_name" name="item_name" id="item_name" placeholder="Item name" required />-->
<!--    </div>-->
<!---->
<!--    <input type="submit" value="Create" />-->
<!--</form>-->
<body>

<!-- Primary Page Layout
================================================== -->
<header>
    <div class="container">
        <div class="four columns"><a href="/dashboard" id="header-logo">Total Gig</a></div>
        <div class="twelve columns">
           @include('partial.nav')
        </div>
    </div>
</header>

<div class="content-container">
    <div class="container">

        <div class="breadcrumbs row">
            <h1>Business Name > <span class="page-title">Gear</span></h1>
        </div>

        <div class="row">
            <button class="sort three columns alpha" type="button" onclick="toggleSort()" data-status="closed">Sort By<div class="arrow-down" ></div>
					<span class="hide sort-options">
						<a href="#" class="active">Name</a>
						<a href="#">Gig Category</a>
					</span>
            </button>
            <button class="add-item three columns omega modal-trigger" data-modal="add-gear">Add Item</button>
        </div>

        <div class="gear row">

            <div class="row">
                <div class="gear-item" data-gear-id="0">
                    <img class="gear-icon" data-category-id="1" src="img/web-development.png" alt="Gear Name" />
                    <div data-id="1" class="content">
                        <h1>Macbook</h1>
                        <img class="edit modal-trigger" data-modal="edit-gear" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-gear" src="img/delete.png" alt="Delete" />
                        <h6>Item Type</h6>
                        <p class="mCustomScrollbar" data-mcs-theme="dark">Needed simply to get stuff done! Use primarily for web development, I should take it with me to any web dev. meeting.</p>
                    </div>
                </div>

                <div class="gear-item" data-gear-id="0">
                    <img class="gear-icon" data-category-id="1" src="img/photographer.png" alt="Gear Name" />
                    <div data-id="2" class="content">
                        <h1>Camera</h1>
                        <img class="edit modal-trigger" data-modal="edit-gear" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-gear" src="img/delete.png" alt="Delete" />
                        <h6>Item Type</h6>
                        <p class="mCustomScrollbar" data-mcs-theme="dark">Pretty important tool for any camera shoots. This would also be a great place for me to put the specs of my camera, if I only I kneweeded simply to get stuff done!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="gear-item" data-gear-id="0">
                    <img class="gear-icon" data-category-id="1" src="img/other.png" alt="Gear Name" />
                    <div data-id="3" class="content">
                        <h1>Backpack</h1>
                        <img class="edit modal-trigger" data-modal="edit-gear" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-gear" src="img/delete.png" alt="Delete" />
                        <h6>Item Type</h6>
                        <p class="mCustomScrollbar" data-mcs-theme="dark">Columbia brand, several pouches including protected laptop sleeve. Great for putting stuff in.</p>
                    </div>
                </div>

                <div class="gear-item" data-gear-id="0">
                    <img class="gear-icon" data-category-id="1" src="img/photographer.png" alt="Gear Name" />
                    <div data-id="4" class="content">
                        <h1>Mini Camera</h1>
                        <img class="edit modal-trigger" data-modal="edit-gear" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-gear" src="img/delete.png" alt="Delete" />
                        <h6>Item Type</h6>
                        <p class="mCustomScrollbar" data-mcs-theme="dark">Compact Fujifilm camera. Ideal for capturing inspiration in the wild for graphic arts. Of course, also of great use in photography gigs</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="gear-item" data-gear-id="0">
                    <img class="gear-icon" data-category-id="1" src="img/dj.png" alt="Gear Name" />
                    <div data-id="5" class="content">
                        <h1>Headphones</h1>
                        <img class="edit modal-trigger" data-modal="edit-gear" src="img/edit.png" alt="Edit" />
                        <img class="delete modal-trigger"  data-modal="delete-gear" src="img/delete.png" alt="Delete" />
                        <h6>Item Type</h6>
                        <p class="mCustomScrollbar" data-mcs-theme="dark">Sennheiser studio quality headphones. Shoudl be used at DJ gigs only unless truely needed in other gigs.</p>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">$(".services").mCustomScrollbar({scrollInertia: 75});</script>
    </div><!-- container -->
</div><!-- content-container -->

<footer>
    <div class="container">
        <img src="img/main-logo.png" alt="Total Gig" />
        <a class="highlight" href="mailto:admin@totalgig.com">admint@totalgig.com</a><br>
        <span class="copyright">Copyright &copy; 2015 Total Gig<br>All rights reserved</span>
    </div><!-- container -->
</footer>

<div class="hide fill-background">
</div><!--fill-background -->
<!-- End Document
================================================== -->
</body>


@endsection

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>

        h1 { font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; }

        /* table */

        table { font-size: 75%; table-layout: fixed; width: 100%; }
        table { border-collapse: separate; border-spacing: 2px; }
        th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
        th, td { border-radius: 0.25em; border-style: solid; }
        th { background: #EEE; border-color: #BBB; }
        td { border-color: #DDD; }

        /* page */

        html { font: 16px/1 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; }
        html { background: #999; cursor: default; }

        body { box-sizing: border-box; height: 11in; margin: 0 auto; overflow: hidden; padding: 0.5in; }
        body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }
        img {width:150px; }
        /* header */

        header { margin: 0 0 3em; }
        header:after { clear: both; content: ""; display: table; }

        header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
        header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
        header address p {position:relative; left:160px; top:-70px; margin: 0 0 0.25em; }
        header span { display: block; float: right; margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
        header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }


    </style>
    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</head>
<body>
<header>
    <h1>Invoice</h1>
    <address contenteditable>
        <img alt="Logo" src={{ asset('img/main-logo.png') }}>
        <p>{{$data['user_name']}}</p>
        <p>Company: {{$data['user_business']}}</p>
        <p>{{$data['user_email']}}</p>
    </address>
</header>
<article>
    <h1>Recipient</h1>
    <address contenteditable>
        <p>{{$data['client_name']}}<br>{{$data['client_location']}}<br>{{$data['client_number']}}</p>
    </address>
    <table class="meta">
        <tr>
            <th><span contenteditable>Invoice #</span></th>
            <td><span contenteditable>{{$data['invoice_number']}}</span></td>
        </tr>
        <tr>
            <th><span contenteditable>Date</span></th>
            <td><span contenteditable>{{$data['invoice_date']}}</span></td>
        </tr>
        <tr>
            <th><span contenteditable>Amount Due</span></th>
            <td><span id="prefix" contenteditable>$</span><span>{{$data['total_due']}}.00</span></td>
        </tr>
    </table>
    <table class="inventory">
        <thead>
        <tr>
            <th><span contenteditable>Item</span></th>
            <th><span contenteditable>Rate</span></th>
            <th><span contenteditable>Quantity</span></th>
            <th><span contenteditable>Price</span></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['services'] as $service)
        <tr>
            <td><span contenteditable>{{ $service->service_name }}</span></td>
            <td><span data-prefix>$</span><span contenteditable>{{ $service->service_price }}</span></td>
            <td><span contenteditable>{{ $service->service_qty }}</span></td>
            <td><span data-prefix>$</span><span><?php $serviceTotal = $service->service_qty * $service->service_price; echo $serviceTotal; ?></span></td>
        </tr>
        @endforeach

        </tbody>
    </table>
    </hr>
    <table class="balance">
        <tr>
            <th><span contenteditable>Total</span></th>
            <td><span data-prefix>$</span><span>{{$data['total_due']}}.00</span></td>
        </tr>
        <tr>
            <th><span contenteditable>Amount Paid</span></th>
            <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
        </tr>
        <tr>
            <th><span contenteditable>Balance Due</span></th>
            <td><span data-prefix>$</span><span>{{$data['total_due']}}.00</span></td>
        </tr>
    </table>
</article>
<aside>
    <h1><span contenteditable>Additional Notes</span></h1>
    <div contenteditable>
        <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
    </div>
</aside>
</body>
</html>
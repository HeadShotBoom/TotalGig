<h3>Contract for Services Rendered</h3>

<p>This is a contract entered into by {{ $user_name }} of {{ $user_business }} (hereinafter referred to as "the Provider") and {{ $client_name }} (hereinafter referred to as "the Client") on this date, {{ $created_date }} .</p>

<p>The Client hereby engages the Provider to provide services described herein under "Scope and Manner of Services." The Provider hereby agrees to provide the Client with such services in exchange for consideration described herein under "Payment for Services Rendered."</p>

<h4>Scope and Manner of Services</h4>

<h4>Services To Be Rendered By Provider:</h4>

@foreach($services as $service)

{{ $service->service_name }}

@endforeach

<p>Payment for Services Rendered</p>

<p>The Client shall pay the Provider for services rendered according to the invoice delivered to them electronically, within 10 calendar days of the date on any invoice for services rendered from the Provider.</p>

<p>Should the Client fail to pay the Provider the full amount specified in any invoice within 10 calendar days of the invoice's date, a late fee equal to $25 shall be added to the amount due and interest of $5 per day shall accrue from the calendar day following the invoice's date.</p>

<h4>Applicable Law</h4>

<p>This contract shall be governed by the laws of the County of Orange in the State of Florida and any applicable Federal law.</p>

<h4>Signatures</h4>

<p>In witness of their agreement to the terms above, the parties or their authorized agents hereby affix their signatures:</p>

<p>____________________________________ _________________________________</p>

<p>(Printed Name of Client or agent) (Printed Name of Provider or agent)</p>

<p>____________________________________ _________________________________</p>

<p>(Signature of Client or agent) (Date) (Signature of Provider or agent) (Date)</p>
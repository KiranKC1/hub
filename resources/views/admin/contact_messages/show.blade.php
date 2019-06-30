 @extends('layouts.admin')

@section('body')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Message #{{ $contact->id }}</h2>
        </div>
        <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <a class="btn btn-primary btn-min-width mr-1 mb-1 " href="{{ route('contact-us-messages.index') }}">See all messages</a>
                    <a class="btn btn-success mr-1 mb-1 " href="{{ route('contact-us-messages.reply',$contact->id) }}" title="Reply">Reply</a>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section class="card">
            <div id="invoice-template" class="card-block">
                <!-- Invoice Company Details -->
                <div id="invoice-company-details" class="row">
                    <div class="col-md-6 col-sm-12 text-xs-center text-md-left">
                        <ul class="px-0 list-unstyled">
                            <li><strong>Name      : </strong>{{ $contact->name }}</li>
                            <li><strong>Email     : </strong>{{ $contact->email }}</li>                                
                            <li><strong>Phone No. : </strong>{{ $contact->phone }}</li><br>
                            <li><span class="text-muted">Received Date :</span> {{ date('M j, Y', strtotime($contact->created_at)) }}</li>
                        </ul>
                    </div>
                </div>
                <!--/ Invoice Company Details -->

                <!-- Invoice Footer -->
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-xs-center">
                                <strong>Subject : </strong>{{ $contact->subject }}
                            </div><br>
                            <p class="lead">Message:</p>
                            <p>{{ $contact->message }}</p>
                        </div>
                    </div>
                </div>
                <!--/ Invoice Footer -->

            </div>
        </section>
    </div>

@endsection

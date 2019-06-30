 @extends('layouts.admin')

 @section('body')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="text-xs-right">
            @if($state == 'all')
                <a class="btn btn-primary btn-min-width mr-1 mb-1 " href="{{ route('contact-us-messages.unseen') }}">See all unseen messages</a>
            @else
                <a class="btn btn-primary btn-min-width mr-1 mb-1 " href="{{ route('contact-us-messages.index') }}">See all messages</a>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contact Messages</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                @if(!$contact->seen && $state == 'all')
                                    <tr style="background:#d6d3d3">
                                @else
                                    <tr>
                                @endif
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm" title="View" href="{{ route('contact-us-messages.show',$contact->id) }}"><i class="icon-eye"></i></a>
                
                                        <form action="{{ route('contact-us-messages.destroy',$contact->id) }}" method="POST" style="display:inline">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" >

                                            <button id='deleteContact' title="delete" type="button" class="btn btn-outline-danger btn-sm"><i class="icon-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(count($contacts)==0)
                            <p class="font-medium-3 text-muted text-xs-center" style="margin:100px">No {{ $state == 'all'?'':'New'}} Messages</p>
                        @endif
                        <div class="text-xs-center mb-3">
                            <nav aria-label="Page navigation">
                                {{ $contacts->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@extends('layouts.admin')

@section('body')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Testimonials</h2>
        </div>
    </div>
    <div class="row match-height">
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-block">
                    @if($state == 'Add')
                        <form class="form" method="POST" action="{{ route('testimonials.store') }}"  enctype="multipart/form-data">
                    @else
                        <form class="form" method="POST" action="{{ route('testimonials.update',$testimonial_->id) }}"  enctype="multipart/form-data">                            
                        <input type="hidden" name="_method" value="PATCH" >
                    @endif
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="name"><strong>Name:</strong></label>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger no-border mb-2">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                                <input type="text" id="name" class="form-control" name="name" value="{{ $testimonial_->name }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="profession"><strong>Profession:</strong></label>
                                @if ($errors->has('profession'))
                                    <div class="alert alert-danger no-border mb-2">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </div>
                                @endif
                                <input type="text" id="profession" class="form-control" name="profession" value="{{ $testimonial_->profession }}" required/>
                            </div>

                            <div class="form-group">
                                <label for="photo"><strong>{{ $state=='Add'?'':'Current ' }}Image <span class="text-muted">(Optional)</span>: </strong></label> {{ $testimonial_->photo }}
                                @if ($errors->has('photo'))
                                    <div class="alert alert-danger no-border mb-2">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </div>
                                @endif
                                <input type="file" id="photo" class="form-control" name="photo"/>
                            </div>
                            <div class="form-group">
                                <label><strong>New Testimonial:</strong></label>
                                @if ($errors->has('content'))
                                    <div class="alert alert-danger no-border mb-2">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </div>
                                @endif
                            
                                <textarea class="form-control" rows='6' id="content" name="content" required>{{ $testimonial_->content }}</textarea>

                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icon-check2"></i> {{ $state=="Add"?"Add New":"Save" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($testimonials as $testimonial)
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-block">
                            <h4 class="card-title">{{ $testimonial->name }}</h4>
                            <h6 class="card-subtitle text-muted">{{ $testimonial->profession }}</h6>
                            @if($testimonial->photo)
                                <img class="img-fluid my-1" src="{{ route('asset', ['landing_images',$testimonial->photo,290,290]) }}" alt="Card image cap">
                            @else
                                <img class="img-fluid my-1" src="{{ route('asset2', ['img','avatar.png','png',290,290]) }}" alt="{{ $testimonial->name }}"/>
                            @endif
                            <p class="card-text">{{ $testimonial->content }}</p>

                            <a href="{{ route('testimonials.edit',$testimonial->id) }}" class="btn btn-outline btn-warning">Edit</a>
                            
                            <form action="{{ route('testimonials.destroy',$testimonial->id) }}" style="display:inline" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" >
                                <button id='deleteTestimonial' type="button" class="btn btn-outline btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
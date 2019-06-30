@extends('layouts.admin')
@section('body')
@if (count($errors)>0 )
<div class="alert alert-dismissible fade in mb-2">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" style="color:black">&times;</span>
    </button>
    <ul class="list-group">
        @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
        @endforeach
    </ul>
</div>	
@endif
<style>
        .search-form .form-group {
            float: right !important;
            transition: all 0.35s, border-radius 0s;
            width: 32px;
            height: 32px;
            background-color: #fff;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.075) inset;
            border-radius: 25px;
            border: 1px solid #967adc;
          }
          .search-form .form-group input.form-control {
            padding-right: 20px;
            border: 0 none;
            background: transparent;
            box-shadow: none;
            display:block;
          }
          .search-form .form-group input.form-control::-webkit-input-placeholder {
            display: none;
          }
          .search-form .form-group input.form-control:-moz-placeholder {
            /* Firefox 18- */
            display: none;
          }
          .search-form .form-group input.form-control::-moz-placeholder {
            /* Firefox 19+ */
            display: none;
          }
          .search-form .form-group input.form-control:-ms-input-placeholder {
            display: none;
          }
          .search-form .form-group:hover,
          .search-form .form-group.hover {
            width: 100%;
            border-radius: 4px 25px 25px 4px;
          }
          .search-form .form-group span.form-control-feedback {
            position: absolute;
            top: -1px;
            right: -2px;
            z-index: 2;
            display: block;
            width: 34px;
            height: 34px;
            line-height: 34px;
            text-align: center;
            color: #3596e0;
            left: initial;
            font-size: 14px;
          }
          
        .mce-panel {
            border: 0 solid #967adc;
            border: 1 solid #2851a22;
            background-color: #fff;
        }
        .btn-file {   
            position: relative;
            overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
        
        #img-upload{
            height:30%;
            width: 30%;
            text-align: center;
            padding-top:10px;
        }
</style>
<div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Unverified Posts</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard" style="padding-top:5px;padding-bottom:0px;">
                        <div class="row">
                                <div class="breadcrumb-wrapper col-md-8">
                                        <ol class="breadcrumb" style="padding-bottom: 0px;padding-top: 7px;">
                                          <li class="breadcrumb-item active"><a href="{{URL::to('admin')}}">Dashboard</a>
                                          </li>
                                          <li class="breadcrumb-item ">Posts
                                          </li>
                                         
                                        </ol>
                                      </div>
                                <div class="col-md-4 pull-right" style="
                                height: 35px;
                            ">
                                    <form action="#" method="GET" class="search-form">
                                        <div class="form-group has-feedback">
                                            <label for="search" class="sr-only">Search</label>
                                            <input type="text" class="form-control" name="search" id="search" placeholder="Search by title">
                                              <span class="icon-search7 form-control-feedback" style="right: 13px;margin-top: 0px;"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                    <div class="table-responsive" id="poststable">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Seen</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($unverifiedposts as $index => $p)
                                <tr>
                                    <th scope="row">{{ $index +1 }}</th>
                                    <td>
                                        
                                        @if($p->seen != false)
                                        <i class="icon-checkmark2" aria-hidden="true"></i>
                                        @else
                                        <i class="icon-radio-checked2" aria-hidden="true"></i>
                                        @endif
                                    </td>
                                    <td>{{$p->title}}</td>
                                    <td>{{$p->name}}</td>
                                <td><a href="{{URL::to('user/'.'@'.$p->username)}}">{{$p->author}}</td>
                                    <td>
                                    <a href="{{URL::to('admin/users/post'.'/'.$p->id)}}" class="btn btn-sm btn-info"><i class="icon-eye4"></i>View</a>
                                            <a href="{{URL::to('admin/users/posts/approve'.'/'.$p->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil3"></i>Edit</a>
                                            <a href="#" id="deletepost{{$p->id}}" class="btn btn-sm btn-danger"><i class="icon-trash-o"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        {{$unverifiedposts->links("pagination::bootstrap-4")}}
    </div>

    <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Verified Posts</h4>
                        <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block card-dashboard" style="padding-top:5px;padding-bottom:0px;">
                            <div class="row">
                                    <div class="breadcrumb-wrapper col-md-8">
                                            <ol class="breadcrumb" style="padding-bottom: 0px;padding-top: 7px;">
                                              <li class="breadcrumb-item active"><a href="{{URL::to('admin')}}">Dashboard</a>
                                              </li>
                                              <li class="breadcrumb-item ">Posts
                                              </li>
                                             
                                            </ol>
                                          </div>
                                    <div class="col-md-4 pull-right" style="
                                    height: 35px;
                                ">
                                        <form action="#" method="GET" class="search-form">
                                            <div class="form-group has-feedback">
                                                <label for="search" class="sr-only">Search</label>
                                                <input type="text" class="form-control" name="search" id="search" placeholder="Search by title">
                                                  <span class="icon-search7 form-control-feedback" style="right: 13px;margin-top: 0px;"></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        <div class="table-responsive" id="poststable">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($verifiedposts as $index => $p)
                                    <tr>
                                        <th scope="row">{{ $index +1 }}</th>
                                        <td>{{$p->title}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>
                                                <a href="#" class="btn btn-sm btn-info"><i class="icon-eye4"></i>View</a>
                                                <a href="{{route('posts.edit',$p->id)}}" class="btn btn-sm btn-primary"><i class="icon-pencil3"></i>Edit</a>
                                                <a href="#" id="deletepost{{$p->id}}" class="btn btn-sm btn-danger"><i class="icon-trash-o"></i>Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            {{$verifiedposts->links("pagination::bootstrap-4")}}
        </div>
    
@endsection
@section('js')
<script>
$(document).on('click',"[id*='deletepost']",function(event){
    var id = $(this).attr("id").slice(10);
    console.log(id);
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",

        showCancelButton: true,

      }).then(function(){
        $.post("{{route('userposts.destroy')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
          swal({
            title:"Deleted Successfully",
            type:"success"

          }).then(function(){
            window.location.href = "{{URL::to('admin/users/posts/verify')}}";
          })
        })
      });
});
</script>
@endsection
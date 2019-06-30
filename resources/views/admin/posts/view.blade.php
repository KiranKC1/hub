@extends('layouts.admin')
@section('body')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/tag-plugin/src/bootstrap-tagsinput.css')}}" />
<div class="content-wrapper" style="padding:0px;">
      <div class="content-header row">
        <div class="content-header-left breadcrumbs-left breadcrumbs-top col-md-6 col-xs-12">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb" style="padding-bottom:10px;">
              <li class="breadcrumb-item active"><a href="{{URL::to('admin')}}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active"><a href="{{URL::to('admin/posts')}}">Posts</a>
              </li>
              <li class="breadcrumb-item">{{$post->title}}
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-body"><!-- Overview -->
<div class="card">
  <div class="card-header" style="padding-bottom: 8px;">
      <h3 id="basic-forms" class="card-title">{{$post->title}}</h3>
      <p style="font-size:12px;margin-bottom: 0px;padding-top: 5px;padding-bottom: 7px;"><i class="icon-clock5"></i> {{$post->created_at->diffForHumans()}} | <i class="icon-user4"></i> {{$post->author}} | <i class="icon-tree"></i> {{$category->name}}</p>
      <i class="icon-tags"></i>
      @foreach($post->tags as $tag)
      @if($tag->name != null)
      <span class="tag tag-info">#{{$tag->name}}</span>
      @endif
      @if($tag->name == null)
      <span class="tag tag-warning">No tags Added</span>
      @endif
      @endforeach
      
      <div class="heading-elements">
          <ul class="list-inline mb-0">
              <a href="{{route('posts.edit',$post->id)}}" class="btn btn-md btn-primary">Edit</a>
              <a href="#" id="deletepost{{$post->id}}" class="btn btn-md btn-danger">Delete</a>
          </ul>
      </div>
  </div>
  <div class="card-body collapse in" aria-expanded="true">
      <div class="card-block" style="padding-top: 0px;">
          <div style="float:left">
            <img src="{{asset('hub-images/posts-images'.'/'.$post->featured_image)}}"/ style="height:240px;width:350px; float: left; margin:7px;">
              <p class="card-text" style="float: right;">{!! $post->description !!}</p>
          </div>

      </div>
  </div>
</div>
      </div>
    </div>

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
          $.post("{{route('posts.destroy')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
            swal({
              title:"Deleted Successfully",
              type:"success"
  
            }).then(function(){
              window.location.href = "{{URL::to('admin/posts')}}";
            })
          })
        });
  });
</script>
@endsection
@endsection
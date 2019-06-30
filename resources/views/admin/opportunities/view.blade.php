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
              <li class="breadcrumb-item active"><a href="{{URL::to('admin/opportunities')}}">Opportunities</a>
              </li>
              <li class="breadcrumb-item">{{$oppo->title}}
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-body"><!-- Overview -->
<div class="card">
  <div class="card-header" style="padding-bottom: 8px;">
      <h3 id="basic-forms" class="card-title" style="padding-bottom: 5px;">{{$oppo->title}}</h3>
      <span><i class="icon-tree"></i> {{$category->name}}</span>
      | <i class="icon-tags"></i>
      @foreach($oppo->tags as $tag)
      @if($tag->name != null)
      <span class="tag tag-info">#{{$tag->name}}</span>
      @endif
      @if($tag->name == null)
      <span class="tag tag-warning">No tags Added</span>
      @endif
      @endforeach
      
      <div class="heading-elements">
          <ul class="list-inline mb-0">
              <a href="{{route('opportunities.edit',$oppo->id)}}" class="btn btn-md btn-primary">Edit</a>
              <a href="#" id="deleteoppo{{$oppo->id}}" class="btn btn-md btn-danger">Delete</a>
          </ul>
      </div>
  </div>
  <div class="card-body collapse in" aria-expanded="true">
      <div class="card-block" style="padding-top: 0px;">
        <div class="row" style="min-height: 320px;">
          <div class="col-md-5" style="padding-top: 14px;padding-bottom: 14px;">
            <img src="{{asset('hub-images/opportunities-images'.'/'.$oppo->featured_image)}}"/ style="height:300px;width:400px;">
          </div>
          <div class="col-md-7" style="margin-top: 0px;">
              <div class="card" style="margin-bottom: 0px;border-bottom-width: 0px;">
                  <div class="card-body collapse in">
                      
                              <table class="table table-bordered">
                                  <colgroup>
                                      <col class="col-xs-1">
                                      <col class="col-xs-7">
                                  </colgroup>
                                  <tbody>
                                      <tr>
                                          <th scope="row">
                                              <code><i class="icon-header"></i> Title</code>
                                          </th>
                                          <td>{{str_limit(strip_tags($oppo->title),40)}}</td>
                                      </tr>
                                      <tr>
                                          <th scope="row">
                                              <code><i class="icon-calendar3"></i> Deadline</code>
                                          </th>
                                          <td>{{date('M j,Y',strtotime($oppo->date))}}</td>
                                      </tr>
                                      <tr>
                                          <th scope="row">
                                              <code><i class="icon-suitcase"></i> Organization Name</code>
                                          </th>
                                          <td>{{$oppo->organization}}</td>
                                      </tr>
                                      <tr>
                                          <th scope="row">
                                              <code><i class="icon-tree"></i> Category</code>
                                          </th>
                                          <td>{{$category->name}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">
                                            <code><i class="icon-phone2"></i> Contact Number</code>
                                        </th>
                                        <td>{{$oppo->contact_details}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <code><i class="icon-envelope-o"></i> Email</code>
                                        </th>
                                        <td>{{$oppo->email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <code><i class="icon-android-compass"></i> Location</code>
                                        </th>
                                        <td>{{$oppo->location}}</td>
                                    </tr>
                                      <tr>
                                          <th scope="row">
                                              <code><i class="icon-tag3"></i> Tags</code>
                                          </th>
                                          <td>
                                              @foreach($oppo->tags as $tag)
                                              @if($tag->name != null)
                                              <span class="tag tag-info">#{{$tag->name}}</span>
                                              @endif
                                              @if($tag->name == null)
                                              <span class="tag tag-warning">No tags Added</span>
                                              @endif
                                              @endforeach
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                         
                  </div>
              </div>
          </div>
        </div>
        <div class="row"style="padding-left: 14px;padding-right: 14px;">
            <p class="card-text">{!! $oppo->description !!}</p>
        </div>
      </div>
  </div>
</div>
      </div>
    </div>

@section('js')
<script>
    $(document).on('click',"[id*='deleteoppo']",function(event){
      var id = $(this).attr("id").slice(10);
      console.log(id);
      swal({
          title: "Are you sure?",
          text: "You will not be able to recover this file!",
          type: "warning",
  
          showCancelButton: true,
  
        }).then(function(){
          $.post("{{route('opportunities.destroy')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
            swal({
              title:"Deleted Successfully",
              type:"success"
  
            }).then(function(){
              window.location.href = "{{URL::to('admin/opportunities')}}";
            })
          })
        });
  });
</script>
@endsection
@endsection
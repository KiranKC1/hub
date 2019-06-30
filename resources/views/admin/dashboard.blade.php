@extends('layouts.admin')

@section('body')



        <div class="content-wrapper" style="padding:0px;">
          <div class="content-header row">
          </div>
          <div class="content-body"><!-- stats -->
  <div class="row">
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-body text-xs-left">
                              <h3 class="pink">27800</h3>
                              <span>Total Users
                          </div>
                          <div class="media-right media-middle">
                              <i class="icon-bag2 pink font-large-2 float-xs-right"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-body text-xs-left">
                              <h3 class="teal">156</h3>
                              <span>Drive Users</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="icon-user1 teal font-large-2 float-xs-right"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-body text-xs-left">
                              <h3 class="deep-orange">64.89 %</h3>
                              <span>Growth Rate</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="icon-diagram deep-orange font-large-2 float-xs-right"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-body text-xs-left">
                              <h3 class="cyan">423kb</h3>
                              <span>Space Occupied</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="icon-ios-help-outline cyan font-large-2 float-xs-right"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ stats -->
  <!--/ project charts -->
  <div class="row">
      <div class="col-xl-8 col-lg-12">
          <div class="card">
              <div class="card-body">
                  <ul class="list-inline text-xs-center pt-2 m-0">
                      <li class="mr-1">
                          <h6><i class="icon-circle warning"></i> <span class="grey darken-1">Remaining</span></h6>
                      </li>
                      <li class="mr-1">
                          <h6><i class="icon-circle success"></i> <span class="grey darken-1">Completed</span></h6>
                      </li>
                  </ul>
                  <div class="chartjs height-250">
                      <canvas id="line-stacked-area" height="250"></canvas>
                  </div>
              </div>
              <div class="card-footer">
                  <div class="row">
                      <div class="col-xs-3 text-xs-center">
                          <span class="text-muted">Total Projects</span>
                          <h2 class="block font-weight-normal">18</h2>
                          <progress class="progress progress-xs mt-2 progress-success" value="70" max="100"></progress>
                      </div>
                      <div class="col-xs-3 text-xs-center">
                          <span class="text-muted">Total Task</span>
                          <h2 class="block font-weight-normal">125</h2>
                          <progress class="progress progress-xs mt-2 progress-success" value="40" max="100"></progress>
                      </div>
                      <div class="col-xs-3 text-xs-center">
                          <span class="text-muted">Completed Task</span>
                          <h2 class="block font-weight-normal">242</h2>
                          <progress class="progress progress-xs mt-2 progress-success" value="60" max="100"></progress>
                      </div>
                      <div class="col-xs-3 text-xs-center">
                          <span class="text-muted">Total Revenue</span>
                          <h2 class="block font-weight-normal">$11,582</h2>
                          <progress class="progress progress-xs mt-2 progress-success" value="90" max="100"></progress>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card" style="max-height: 440px; min-height:150px;overflow: auto;">
                <div class="card-body" id="categories">
                    <div class="card-block" style="padding-bottom:7px;">
                        <div class="col-md-9">
                        <h4 class="card-title" style="margin-bottom:0px;">Manage Category</h4>
                        <p style="font-size:10px; margin-bottom:3px;">Don't delete categories having any usage</p>
                        </div>
                        <div class="col-md-3">
                            <a data-toggle="modal" id="addNewCat" data-target="#CatModal"><i class="icon-android-add" data-toggle="tooltip" title="Add Category" data-placement="top" style="
                            padding-left: 20px;font-size:24px;"></i></a>   
                        </div>
                        
                    </div>
                    <div  class="modal fade" id="CatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title" id="cattitle">Add Category</h4>
                                </div>
                                <div class="modal-body">
                                  <input type="text" id="addCatgeory" class="form-control" placeholder="Name of Category"/>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" id="savechanges" class="btn btn-primary" style="display:none;" data-dismiss="modal">Save changes</button>
                                  <button type="button" data-dismiss="modal" class="btn btn-primary" id="addButton">Add Category</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @if(count($c)==null)
                        <div align="center">
                            <h5>No Category added!</h5>
                        </div>
                        @endif
                        @if(count($c)!=null)
                    <ul class="list-group list-group-flush">
                        @foreach($c as $i)
                        <li class="list-group-item CatItem" >
                            <span class="tag tag-default tag-pill tag-info float-xs-right"><i class="icon-android-create" id="editCat{{$i->name}}" cid="{{$i->id}}" value="{{$i->name}}"  data-toggle="modal" data-target="#CatModal"></i></span>
                            <input type="hidden" id="editid"/>
                            <span class="tag tag-default tag-pill tag-danger float-xs-right" id="deletecat{{$i->id}}"><i class="icon-android-delete"></i></span>
                            {{$i->name}}
                            <?php
                            $countpost=count($posts->where('category_id','=',$i->id));
                            $countevents=count($events->where('category_id','=',$i->id));
                            $countoppo=count($oppo->where('category_id','=',$i->id));
                            $count=$countpost + $countevents + $countoppo;
                            ?> 
                            <span class="tag tag-default tag-pill tag-warning float-xs-right">Used: {{$count}}</span>
                        </li>
                        @endforeach
                        
                    </ul>
                    @endif
                </div>
            </div>
        </div>
  </div>

  </div>
  
          </div>
        </div>
      </div>
    
@stop
{{csrf_field()}}
@section('js')
<script>
    $(document).ready(function(){
            
     $(document).on('click',"[id*='editCat']", function(event){
        var name = $(this).attr("id").slice(7);
        var id = $(this).attr("cid");
        console.log(id);
        $('#addCatgeory').val(name);
        $('#editid').val(id);
        $('#cattitle').text('Edit Item');
        $('#savechanges').show('400');
        $('#addButton').hide();
     });
    
        $(document).on('click','#addNewCat', function(event){
                $('#addCatgeory').val("");
                $('#cattitle').text('Add Categroy');
                $('#savechanges').hide();
                $('#addButton').show();
            });
        $(document).on('click','#addButton', function(event){
            var name = $('#addCatgeory').val();
             $.post("{{route('category.add')}}",{'name':name,'_token':$('input[name=_token]').val()},    function(data){
                $('#categories').load(location.href + ' #categories');
            });

    });
    $(document).on('click','#savechanges', function(event){
        var name = $('#addCatgeory').val();
        var id=$('#editid').val();
         $.post("{{route('category.update')}}",{'id':id,'name':name,'_token':$('input[name=_token]').val()}, function(data){
            $('#categories').load(location.href + ' #categories');
        });
});

    $(document).on('click',"[id*='deletecat']",function(event){
        var id = $(this).attr("id").slice(9);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this file!",
            type: "warning",
    
            showCancelButton: true,
    
          }).then(function(){
            $.post("{{route('category.delete')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
              swal({
                title:"Deleted Successfully",
                type:"success"
    
              }).then(function(){
                $('#categories').load(location.href + ' #categories');
              })
            })
          });
    });
    });
</script>
@endsection
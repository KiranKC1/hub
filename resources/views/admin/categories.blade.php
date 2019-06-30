@extends('layouts.admin')

@section('body')



        <div class="content-wrapper" style="padding:0px;">
          <div class="content-header row">
          </div>
          <div class="content-body"><!-- stats -->

  <!--/ stats -->
  <!--/ project charts -->
  <div class="row">
      {{--Start universal  Opportunities Category  --}}
      <div class="col-xl-6 col-md-6 col-sm-12">
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
                                  <input type="file" name="category_image" id="category_image"/>
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
                            <input type="hidden" id="editid" value=""/>
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
      {{--  End Universal Category  --}}
     {{--  Start Opportunity Category  --}}
      <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card" style="max-height: 440px; min-height:150px;overflow: auto;">
                <div class="card-body" id="oppocategories">
                    <div class="card-block" style="padding-bottom:7px;">
                        <div class="col-md-9">
                        <h4 class="card-title" style="margin-bottom:0px;">Manage Opportunities Category</h4>
                        <p style="font-size:10px; margin-bottom:3px;">Don't delete categories having any usage</p>
                        </div>
                        <div class="col-md-3">
                            <a data-toggle="modal" id="addNewOppoCat" data-target="#OppoCatModal"><i class="icon-android-add" data-toggle="tooltip" title="Add Category" data-placement="top" style="
                            padding-left: 20px;font-size:24px;"></i></a>   
                        </div>
                        
                    </div>
                    <div  class="modal fade" id="OppoCatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title" id="oppocattitle">Add Category</h4>
                                </div>
                                <div class="modal-body">
                                  <input type="text" id="addoppoCatgeory" class="form-control" placeholder="Name of Category"/>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" id="saveoppochanges" class="btn btn-primary" style="display:none;" data-dismiss="modal">Save changes</button>
                                  <button type="button" data-dismiss="modal" class="btn btn-primary" id="addoppoButton">Add Category</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        @if(count($oc)==null)
                        <div align="center">
                            <h5>No Category added!</h5>
                        </div>
                        @endif
                        @if(count($oc)!=null)
                    <ul class="list-group list-group-flush">
                        @foreach($oc as $i)
                        <li class="list-group-item CatItem" >
                            <span class="tag tag-default tag-pill tag-info float-xs-right"><i class="icon-android-create" id="editOppoCat{{$i->name}}" cid="{{$i->id}}" value="{{$i->name}}"  data-toggle="modal" data-target="#OppoCatModal"></i></span>
                            <input type="hidden" id="editoppoid"/>
                            <span class="tag tag-default tag-pill tag-danger float-xs-right" id="deleteoppocat{{$i->id}}"><i class="icon-android-delete"></i></span>
                            {{$i->name}}
                            <?php
                            $count=count($oppo->where('category_id','=',$i->id));
                            ?> 
                            <span class="tag tag-default tag-pill tag-warning float-xs-right">Used: {{$count}}</span>
                        </li>
                        @endforeach
                        
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        {{--  End Universal category  --}}
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
        console.log(id);
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
<script>
        $(document).ready(function(){
                
         $(document).on('click',"[id*='editOppoCat']", function(event){
            var name = $(this).attr("id").slice(11);
            var id = $(this).attr("cid");
            $('#addoppoCatgeory').val(name);
            $('#editoppoid').val(id);
            $('#oppocattitle').text('Edit Item');
            $('#saveoppochanges').show('400');
            $('#addoppoButton').hide();
         });
        
            $(document).on('click','#addNewOppoCat', function(event){
                    $('#addoppoCatgeory').val("");
                    $('#oppocattitle').text('Add Opportunities Categroy');
                    $('#saveoppochanges').hide();
                    $('#addoppoButton').show();
                });
            $(document).on('click','#addoppoButton', function(event){
                var name = $('#addoppoCatgeory').val();
                 $.post("{{route('oppocategory.add')}}",{'name':name,'_token':$('input[name=_token]').val()},    function(data){
                    $('#oppocategories').load(location.href + ' #oppocategories');
                });
    
        });
        $(document).on('click','#saveoppochanges', function(event){
            var name = $('#addoppoCatgeory').val();
            console.log(name);
            var id=$('#editoppoid').val();  
             $.post("{{route('oppocategory.update')}}",{'id':id,'name':name,'_token':$('input[name=_token]').val()}, function(data){
                 console.log(data);
                $('#oppocategories').load(location.href + ' #oppocategories');
            });
    });
    
        $(document).on('click',"[id*='deleteoppocat']",function(event){
            var id = $(this).attr("id").slice(13);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this file!",
                type: "warning",
        
                showCancelButton: true,
        
              }).then(function(){
                $.post("{{route('oppocategory.delete')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
                  swal({
                    title:"Deleted Successfully",
                    type:"success"
        
                  }).then(function(){
                    $('#oppocategories').load(location.href + ' #oppocategories');
                  })
                })
              });
        });
        });
    </script>
@endsection
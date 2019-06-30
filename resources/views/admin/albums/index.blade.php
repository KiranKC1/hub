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
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Albums</h2>
        </div>
        <div class="text-xs-right">
            <button class="btn btn-primary btn-min-width mr-2 mb-1" data-toggle="modal" data-target="#addAlbum">Add new Album</button>
        </div>
    </div>
    <div class="content-body">
        
        <div class="card">
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <div class="row">

                        @foreach($albums as $album)
                            <div class="col-xl-3 col-md-6 col-sm-12 " style="margin-bottom:10px">
                                <?php $images = $album->album_images()->limit(3)->get(); ?>
                                <a href="{{ route('albums.show',$album->id) }}">
                                    @if(count($images)>0)
                                        <div id="carousel-wrap{{$album->id}}" class="carousel slide" data-ride="carousel" data-wrap="false" style="height:200px;width:200px">
                                            <ol class="carousel-indicators">
                                                @foreach($images as $i)
                                                    <li data-target="#carousel-wrap{{$album->id}}" data-slide-to="{{$loop->iteration-1}}" class="{{$loop->iteration==1?'active':''}}"></li>
                                                @endforeach
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                @foreach($images as $i)
                                                    <div class="carousel-item {{$loop->iteration==1?'active':''}}">
                                                        <img src="{{ route('asset', ['gallery',$i->image,200,200]) }}" alt="{{$loop->iteration}} slide">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="left carousel-control" href="#carousel-wrap{{$album->id}}" role="button" data-slide="prev">
                                                <span class="icon-prev" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-wrap{{$album->id}}" role="button" data-slide="next">
                                                <span class="icon-next" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    @else
                                        <img src="/img/gallery.jpg" style="height:200px;width:200px"/><br>
                                    @endif
                                </a><br>
                                <a href="{{ route('albums.show',$album->id) }}"><h4 class="card-title ">{{ $album->name }} - {{ $album->year }}</h4></a>

                                <a class="btn btn-outline-warning" onclick="editAlbum({{ $album }})"><i class="icon-edit"></i></a>
                            
                                <form action="{{ route('albums.destroy',$album->id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" >
                                    <button id='deleteAlbum' type="button" class="btn btn-outline-danger" ><a><i class="icon-trash-o"></i></a></button>
                                </form>
                            </div>
                        @endforeach
                        @if(count($albums)==0)
                            <p class="font-medium-3 text-muted text-xs-center" style="margin:150px">No Albums Yet</p>   
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade text-xs-left" id="addAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form" method="POST" action="{{ route('albums.store') }}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section">Add New Album</h4>
                            <div class="form-group">
                                <label for="name">Album name</label>
                                <input class="form-control " id="name" type="text" placeholder="Album Name"  name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="year">Album Year</label>
                                <select class="form-control " id="year" placeholder="Album Year"  name="year" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                </form>                                    
            </div>
        </div>
    </div>
    <div class="modal fade text-xs-left" id="editAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form" method="POST" id="editAlbumForm" action="">
                    <input type="hidden" name="_method" value="PATCH" >
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <h4 class="form-section">Edit Album</h4>
                            <div class="form-group">
                                <label for="editname">Album name</label>
                                <input class="form-control " id="editname" type="text" placeholder="Album Name"  name="editname" required>
                            </div>

                            <div class="form-group">
                                <label for="edityear">Album Year</label>
                                <select class="form-control " id="edityear" placeholder="Album Year"  name="edityear" required>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                </form>                                    
            </div>
        </div>
    </div>
    
 @endsection

 @section('js')
    <script>
        $(document).ready(function(){
            var current = parseInt(new Date().getFullYear());
            var html;
            for(var i=0;i<10;i++){
                html = "<option id='"+(current-i)+"'>"+(current-i)+"</option>";
                $('#year').append(html);
                $('#edityear').append(html);
            }
        });

        function editAlbum(album){
            $('#editAlbumForm').attr('action',"{{ URL::to('/admin/albums/')}}"+"/"+album.id);
            $("input[name='editname']").val(album.name);
            $("select[name='edityear']").val(album.year);
            $('#editAlbum').modal('show');
        }
    </script>
 @endsection
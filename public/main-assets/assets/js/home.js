<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.loading').hide();
    $('#spinner').hide();
    $('#posts-end').hide();
    $(document).on('click',"[id*='ShowMore']",function(event){
            var id = $(this).attr("id").slice(8);
            $('#MoreDiv'+id).attr("hidden","true");
            $('#LessDiv'+id).removeAttr('hidden');
        });
    $(document).on('click',"[id*='ShowLess']",function(event){
            var id = $(this).attr("id").slice(8);
            $('#LessDiv'+id).attr("hidden","true");
            $('#MoreDiv'+id).removeAttr('hidden');
            $('html, body').animate({
              scrollTop: $("#ShowMore"+id).offset().top
            },1000);
        });
        if($(window).width() >= 994){
        $(window).scroll(fetchPosts);
        }
        if($(window).width()<=995){
          $('#view-more').click(viewmore);
        }
        
function viewmore(){
  var page = $('.endless-pagination').data('next-page');
  if(page===null)
  {
    $('#view-more').remove();
    $('#posts-end').show();
    $('#end-posts').html("No Posts to display!");
    $('#posts-end').fadeOut(4000);
  }
  if(page !== null) {
    $('#spinner').show();
    $.get(page, function(data){
                     $('.posts').append(data.posts);
                     $('.endless-pagination').data('next-page', data.next_page);
                    $('#spinner').hide();
        });
  }
}
function fetchPosts() {

     var page = $('.endless-pagination').data('next-page');

     if(page !== null) {
        $('.loading').show();
         clearTimeout( $.data( this, "scrollCheck" ) );

         $.data( this, "scrollCheck", setTimeout(function() {
             var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 500;

             if(scroll_position_for_posts_load >= $(document).height()) {
                 $.get(page, function(data){
                     $('.posts').append(data.posts);
                     $('.endless-pagination').data('next-page', data.next_page);
                    $('.loading').hide();
                 });
             }
         }, 350))
     }
    //  else{
      // $('.loading').hide();
    //  }
 }
  });
  $(document).on('click',"[id*='likearticle']",function(event){
            var id = $(this).attr("id").slice(11);
            var token = $('#csrf_token').val();
            var articlename = $('#articlename'+id).val();
            console.log(id);
            $.ajax({
              type: "POST",
              url: "/likearticle",
              data: { 
              post_id: id,
              _token:token
        },
        success: function(result) {
          $('#countlike'+id).html(function(i, val) { return +val+1 });
          $('#likearticle'+id).attr('hidden','true');
          $('#unikearticle'+id).removeAttr('hidden');
        },
        error: function(result) {
            alert('Something went wrong!');  
        }
    });
  });

  $(document).on('click',"[id*='savearticle']",function(event){
            var id = $(this).attr("id").slice(11);
            var token =$('#csrf_token').val()
            var articlename = $('#articlename'+id).val();
            $('#savearticle'+id).attr('hidden','true');  
            $('#article_spinner'+id).removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "/savearticle",
              data: { 
              post_id: id,
              _token:token
        },
        success: function(result) {
          $('#article_spinner'+id).attr('hidden','true');
          $('#unsavepost'+id).removeAttr('hidden');
          $('#countbox'+id).html(function(i, val) { return +val+1 });
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-warning animated fadeInDown alert alert-dismissible fade show g-bg-teal g-color-white rounded-0" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<span data-notify="icon" class="glyphicon glyphicon-warning-sign"></span> <span data-notify="title"> <i class="icon-check"></i> <strong>Article'+'"'+articlename+'"'+' was saved!</strong> </span> <span data-notify="message">Go to profile to view saved articles</span>'+
        '</div>'
          ).find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
            $('#savearticle'+id).show();  
        }
    });
        });
        $(document).on('click',"[id*='unsavepost']",function(event){
            var id = $(this).attr("id").slice(10);
            var token = $('#csrf_token').val();
            var articlename = $('#articlename'+id).val();
            $('#unsavepost'+id).attr('hidden','true');  
            $('#article_spinner'+id).removeAttr('hidden');
            console.log(id);
            $.ajax({
              type: "POST",
              url: "/savearticle",
              data: { 
              post_id: id,
              _token:token
        },
        success: function(result) {
          $('#article_spinner'+id).attr('hidden','true');
          $('#savearticle'+id).removeAttr('hidden');
          $('#countbox'+id).html(function(i, val) { return +val-1 });
          $('#messages').append(
            '<div data-notify="container" class="col-xs-11 col-sm-4 alert alert-warning animated fadeInDown alert alert alert-dismissible fade show g-bg-gray-dark-v2 g-color-white rounded-0" role="alert" data-notify-position="bottom-right" style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1031; bottom: 20px; right: 10px; animation-iteration-count: 1;">'+
            '<button type="button" class="close u-alert-close--light" data-dismiss="alert" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
            '</button>'+
            '<span data-notify="icon" class="glyphicon glyphicon-warning-sign"></span> <span data-notify="title"> <i class="icon-info"></i> <strong>Article'+'"'+articlename+'"'+' was removed!</strong> </span>'+
        '</div>'
          )
          .find('.alert-dismissible').delay(8000).fadeOut(2000);
        },
        error: function(result) {
            $('#unsavepost'+id).show();  
        }
    });
        });
</script>
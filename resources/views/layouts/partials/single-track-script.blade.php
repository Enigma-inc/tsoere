@section('page-scripts')
    <script>
    jQuery(function($) {
       $(document).ready(function(){
              $('.play-button').click(function(){

              if($(this).hasClass('playing') ){

              }else{
                    incrementPlayCount(this);
               }
           });


            incrementPlayCount=function(_this){
                var self=_this;
              var trackId=$(self).attr('id').split('-')[2];
               $.ajax({
                   url:'../../../played/'+trackId,
                   success:function(response){
                $('#play-'+trackId).text('('+response.played+')');
                       
                   }
               });
           }
       });
       });
             
    </script>
@endsection
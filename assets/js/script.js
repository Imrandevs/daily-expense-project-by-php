(function($){
    $(document).ready(function(){

        $('.delete').click(function(){
            let conf =confirm('Are you sure ?');

            if(conf == true){

                return true;

            }else{

                return false;
            }
        });

    });
})(jQuery)

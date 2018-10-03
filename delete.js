 $(function() {
        $(document).on('click','.delete',function(){
        
        var el = this;
  var id = this.id;
  var splitid = id.split("_");
  // Delete id
  var deleteid = splitid[1];
       
            $.ajax({
                type: "POST",
                url: "delete.php",
                data:  { id:deleteid },
                success: function(){
                     if(confirm("Are you sure you want to delete this Record?") ){
                alert('deleted!'); 
               

            } 

            }


            });
        
        return false;
        });
        });
   
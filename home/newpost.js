$(function () {
        $('#submit-form').click(function () {
          var firstname1 = $('#firstname').val();
          var lastname1=$('#lastname').val();
          var reg_no1= $('#reg_no').val();
          var type1 = $('#type').val();
          var terminal1 = $('#terminal').val();
          
          $.post("post.php",{firstname:firstname1,lastname:lastname1,reg_no:reg_no1,type:type1,terminal:terminal1},function(data){
            alert(data);
  
            //$("#result").text(data);
          }
          );
        });
      });
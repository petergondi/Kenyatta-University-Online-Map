 $(function () {
        $('#submit-form').click(function () {
          var name1 = $('#name').val();
          //var lastname=$('lastname').val();
          var reg_no1= $('#reg_no').val();
          var type1 = $('#type').val();
          var terminal1 = $('#terminal').val();
          $.post("submit.php",{name:name1,reg_no:reg_no1,type:type1,terminal:terminal1},function(data){
            
            alert(data);
            
            //$("#result").text(data);
          }
          );
        });
      });
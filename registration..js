$(function () {
        $('#form').click(function () {
          var name1 = $('#inputName').val();
          var email1= $('#inputEmail').val();
          var type1 = $('#type').val();
          var doc1 = $('#inputnum').val();
          $.post("registration.php",{name:name1,email:email1,type:type1,doc:doc1},function(data){
            alert(data);
            
            //$("#result").text(data);
          }
          );
        });
      });
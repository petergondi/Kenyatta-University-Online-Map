$('#button').on('click', function(){
  var name=$('input#search').val();
if($.trim(name) !=''){
  $.post('adminsearch.php',{search:name}, function(data){
    if(data){
      //alert("peter");
      var jsonobj=JSON.parse(data);
      var result=['Name:'+jsonobj.name,'Terminal posted:'+jsonobj.terminal,'Date Posted:'+jsonobj.Date,'Identity No:'+jsonobj.Reg_no,'Type:'+jsonobj.type];
  
    //$('div#submit-data').text(result);
    //$('div#data-not-found').text("");
    localStorage.setItem('terminal',jsonobj.terminal);
    alert(result);
    //localStorage.setItem('id',jsonobj.Id);
    //alert('On:'+localStorage.getItem('terminal'));
  }
    else{
      var result="Sorry! No document matched your search";
      alert(result);
      //$('div#data-not-found').text(result);
      ////$('div#submit-data').text("");
       //$("#myModal").modal("show");  
    }
  	
});
}
});

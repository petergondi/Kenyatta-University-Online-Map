<?php
include 'adminsearch.php';
//$data='';
if ($test=empty($_SESSION['id'])) {
 echo"";
}
else{
  $data=$_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>GEOTRACK-KU</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<script src="https://js.arcgis.com/3.20/"></script>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script src="newpost.js"></script>
  
     <style>

        .navbar-inverse .navbar-nav > li > a {
            color: white !important;
        }

            .navbar-inverse .navbar-nav > li > a:hover {
                text-decoration: underline;
            }

        .navbar-collapse ul li {
            padding-top: 0px;
            padding-bottom: 0px;
        }

            .navbar-collapse ul li a {
                padding-top: 0px;
                padding-bottom: 0px;
            }


        .navbar-inverse {
            background-color: #3A1B37;
        }
       
#button:hover {
    background: #0b7dda;
}
#search{
	height:40px;
	
}



    </style>

	
<!--===============================================================================================-->
</head>

  <!-- Modal -->
  <div class="modal fade" id="myModal" data-target="#myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Document Result</h4>
        </div>
        <div class="modal-body"  id="mbody" style="color:green">
        </div>
        <div class="modal-footer">
        	<div style="float:left; margin-left:40px;" >
              <button  class="delete" id="del_<?php echo $data;?>"  name="delete" style="font-size:13pt;color:chocolate;background-color:black;border:2px solid #ccc;padding:3px;border-radius: 10px;">
          <span class="glyphicon glyphicon-trash"></span>Delete
        </button></div>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  
</div>


<div id="header"
           data-dojo-type="dijit/layout/ContentPane"
           data-dojo-props="region:'top'">
       Admin Panel
        <a class="active"  href="../map.php">Map</a>
        <a href="../statistics.php" style="margin-left: 1000px;max-width: 20%; width: 50%;"><font color="chocolate">Collected Documents</font></a>

                   
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Document" name="search" id="search" style="max-width: 39%; width: 40%; margin-left: 117px; padding-top:5px;">
                           
                                <button id="button" style="height: 40px" class="btn btn-default" style="background: rgb(72, 200, 72);" type="submit"><i class="fa fa-search"></i></button>
                            
                        
                    </div>
                    <script type="text/javascript">
                    	$('#button').on('click', function(){
  var name=$('input#search').val();
if($.trim(name) !=''){
  $.post('adminsearch.php',{search:name}, function(data){
    if(data){
      var jsonobj=JSON.parse(data);
      var result=['Name:'+jsonobj.firstname+" "+jsonobj.lastname," "+'Terminal posted: '+jsonobj.terminal+""+'Date Posted: '+jsonobj.Date+" "+'Identity No:'+" "+jsonobj.Reg_no+" "+'Document Type: '+" "+jsonobj.type];
   var remove=JSON.parse(data);
   var del=[remove.id];
   console.log(del);
    $("#myModal").modal("show");
    $('#mbody').html(result); 
    // Delete 
 $('.delete').click(function(){
 var el = this;
  var id = this.id;
  var splitid = id.split("_");
  // Delete id
  var deleteid = splitid[1];
 
  // AJAX Request
  $.ajax({
   url: 'delete.php',
   type: 'POST',
   data: { id:deleteid },
   success: function(response){
   	 $('#mbody').html("");
   	 setTimeout(function(){ $('#myModal').modal('hide'); }, 3000);
   }
  });

 });
  }
    else{
      var result="Sorry! No id matched your search";
      alert(result);
        
    }
  	
});
}
});
                    	



                    </script>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<div class="contact100-form validate-form">
				<span class="contact100-form-title">
					Post The Found Document
				</span>

				<label class="label-input100" for="first-name" id="lab">Document Owner *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="firstname" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" id="lastname" name="last-name" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="phone" id="lab">Document Type</label>
				<div class="wrap-input100">
					<select id="type" class="input100" name="type" required ></br>
						 <option value="0" disabled selected>Select document</option>
      <option value="Student Id">Student ID</option>
      <option value="Exam Card">Exam Card</option>
      <option value="National Id">National ID</option>
      <option value="Staff Id">Staff ID</option>
      <option value="ATM Card">ATM Card</option>
      <option value="Passport">Passport</option>
      <option value="Credit Card">Credit Card</option>
       <option value="Certificate">Certificate</option>
        <option value="Other">Other</option>
      </select></br>
					
				</div>
				<label class="label-input100" for="Document" id="lab">Document Identity *</label>
				<div class="wrap-input100">
					<input id="reg_no"" class="input100" type="text" name="reg_no">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="Document" id="lab">Document Terminal *</label>
									<div class="wrap-input100">
					<select id="terminal" class="input100" name="terminal"></br>
      </select></br>

					
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" id="submit-form">
						Post Document
					</button>
				</div>
			</div>


			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							Kenyatta University, Nairobi, Kenya
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							0725272888
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							info@gondipeters.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	
	</script>

	
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	//Call modules that your require
	require([
	"esri/InfoTemplate",
    "esri/layers/graphics",
    "esri/layers/FeatureLayer",
    "esri/tasks/query",
    "esri/tasks/QueryTask",
    "dojo/_base/array",
    "esri/graphicsUtils",
    "dojo/keys",
    "dojo/on",
    "dojo/dom",
    "dojo/domReady!"],
		//Call variables in a function this variables are from the modules
        function (InfoTemplate, Graphics, FeatureLayer, Query, QueryTask, arrayUtils, webMercatorUtils, graphicsUtils, keys, on, dom) {
			//define the extent for the map 
           
			
		   
            
            var queryTask = new QueryTask("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/terminals/FeatureServer/0");
            var query = new Query();
            query.returnGeometry = false;
            query.outFields = ["*"];
            query.where = "Name<>''";
            queryTask.execute(query, showResults);
            function showResults(results) {
                //var arr = [];
                var resultCount = results.features.length;
                for (var i = 0; i < resultCount; i++) {

                    var featureAttributes = results.features[i].attributes.Name;

                    $('#terminal').append($('<option>', {value: "" + featureAttributes + ""}).text(featureAttributes));

                }

            }
        });
	var placeholderText = {
    "Student ID":"e.g 0634",
    "Exam Card":"e.g 0634",
    "National ID":"National ID",
    "Staff ID":"staff ID",
    "ATM Card":"Account No.",
    "Passport":"Enter Passport",
    "Credit Card":"Credit Card no.",
    "Certificate":"Certificate no.",
    "Other":"Identity no."
};

$("#type").on("change", function () {

    if (this.value != 0) {
        $("#reg_no").val(placeholderText[$("#type option:selected").text()]);
    } else {
        $("#reg_no").val("");
    }
    

});
	</script>
</body>
</html>

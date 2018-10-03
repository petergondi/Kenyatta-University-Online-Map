
<?php
include 'search.php';
//$data='';
if ($test=empty($_SESSION['Id'])) {
 echo"";
}
else{
  $data=$_SESSION['Id'];
}
?>
<!DOCTYPE html>
<html> 
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEOTRACK-KU</title>
    
    <link rel="stylesheet" href="https://js.arcgis.com/3.23/esri/css/esri.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="post.js"></script>
  <script src="delete.js"></script>
  <script src="https://js.arcgis.com/3.22/"></script>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/map.css">
  <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://js.arcgis.com/3.25/dijit/themes/claro/claro.css">
    <style>

    .arcgisSearch .searchIcon {
      color:orange;
      font-size:20px;
}
.arcgisSearch .suggestionsMenu{
     color: #2F7FAC;
}
.arcgisSearch .sourcesMenu
{
     color: #B87812;
}
.simpleDirections .esriPrintLogo {
    width: 2px;
    height: 2px;
}
.simpleDirections .esriPrintName {
    font-size: 120%;
    font-weight: bold;
    margin: 10px 0 5px;
}
.simpleDirections .esriDirectionsContainer {
    
    font-weight: bold;
    font-size: 14px; 
}
.home{
  color: chocolate;
}
.thumbnail {
    position:relative;
    width:250px;
    height:100px;
    display:block;
    z-index:999;
    border: 2px #888 solid;
}
.esriPrintButton{

  color:#4A777A;

}

.sidebar {
    background:#2B0B04;
    width:350px;
    height:450px;
    position:absolute;
    top:67px;
    left:5px;
    border-top-right-radius: 22px;
    border-bottom-right-radius: 35px;
    margin-top: 150px;
    position: absolute;
     border: 3px #0A54A0 solid;
}
.esriPopup .titlePane {
         background-color: black;
         border-bottom: 2px solid #121310;
         font-weight: bold;

      }
      .esriPopup a {
         color: #DAE896;
      }
      .esriPopup .contentPane,
      .esriPopup .actionsPane,
      .esriPopup .pointer,
      .esriPopup .outerPointer {
         background-color: #B3B3B3;

      }
      #button-1{
        border-radius: 5px;
        box-shadow: 2px 3px gray;
      }
       #dir{
       position: absolute;
     z-index: 70;
     padding-top: 30px;
      width:300px;
    }
    .squaredTwo {
  width: 20px;
  height: 20px;
  position: relative;
  background: #fcfff4;
  background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
  label {
    width: 20px;
    height: 20px;
    cursor: pointer;
    position: absolute;
    left: 4px;
    top: 4px;
    background: linear-gradient(top, #222 0%, #45484d 100%);
    box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
    &:after {
      content: '';
      width: 9px;
      height: 5px;
      position: absolute;
      top: 4px;
      left: 4px;
      border: 3px solid #fcfff4;
      border-top: none;
      border-right: none;
      background: transparent;
      opacity: 0;
      transform: rotate(-45deg);
    }
    &:hover::after {
      opacity: 0.3;
    }
  }
  input[type=checkbox] {
    visibility: hidden;
    &:checked + label:after {
      opacity: 1;
    }    
  }
}


    
  </style>
    </head>
     <body style="background-color:black;">

      <div id="loader-wrapper">

      <div id="loader"></div>

      <div class="loader-section section-left"></div>
      <div class="loader-section section-center" id="load"><h1>KU Main Campus<br/><br/>Kenyatta University<br/><br/>Web Map</h1></div>
            <div class="loader-section section-right">
</div>

    </div>
    <div data-dojo-type="dijit/layout/BorderContainer" 
         data-dojo-props="design:'headline'" 
         style="width:100%;height:100%;">

      <div id="map"  style="border:2px solid #0A54A0;"
           data-dojo-type="dijit/layout/ContentPane" 
           data-dojo-props="region:'center'">
           <div id="searchmap"></div>
           <div id="BasemapToggle"></div>
            <div id="LocateButton"></div>
            <div id="HomeButton"></div>
            
            
         </div>
    
      
      <div id="header" "
       data-dojo-type="dijit/layout/ContentPane" 
           data-dojo-props="region:'top'" >
           <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <a class="navbar-brand"  style="max-width: 39%;width:20%;" href="#"><img src="https://upload.wikimedia.org/wikipedia/en/4/42/Kenyatta_University_Logo.png" height="40" width="50"></a>
    <a class="navbar-brand" id="brand" style="max-width: 39%;width:20%" href="#">KENYATTA UNIVERSITY</a>
    <input type="text" id="search" name="search" style="max-width: 39%;width:20%" placeholder="search Lost document">
     <button id="button" class="btn btn-default" style="background: gray;" type="submit"><i class="fa fa-search"></i></button>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
   
    
  </div>
  <div class="navbar-collapse collapse" >
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php"><font color="white">Home</font></a></li>
            <li><a href="" data-toggle="modal" data-target="#myModal"><font color="white">Download Gatepass</font></a></li>
       <li><a href="" data-toggle="modal" data-target="#myModal23"><font color="white">Feedback</font></a></li>
      <li><a href="" data-toggle="modal" data-target="#myModal2"><font color="white">Help</font></a></li>
      <li><a class="btn btn-block btn-social btn-twitter">
  <span class="fa fa-twitter"></span>
  Share
</a></li>
    </ul>
    
  </div>
</nav>

<div class="container-fluid">
  Current viewport width:<span id="monitor"></span>
</div>
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog modal-lg" style="background-color:black;>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><font color="white">By seeing this, it's either you typed the number document wrongly or the  Document does not exist in our records</h3>
          
        </div>
        <div class="modal-body">
          <p>If you did not find your document try searching using the following:</p>
          <p><b>STUDENT ID-student id <strong>MIDDLE</strong> number i.e 3473</b></p>
          <p><b>NATIONAL ID-national id <strong> 8 DIGIT </strong> number i.e 2354xxxx</b></p>
          <p><b>EXAM CARD-student id <strong>MIDDLE</strong> number i.e 1234</b></p>
          <p><b>PASSPORT-passport number</b></p>
          <p><b>ATM CARDS-ATM account number</b></p>
          <p><b>ACADEMIC CERTIFICATES- Academic serial number</b></p>
          <h3>Student Id not found? Download the Temporary Gatepass Below</h3>
              <p><strong><em><font color="red">NOTE</font></em></strong> This Temporary Gate Pass Will only serve you for a period of 2 weeks, try to find your ID before the stated time elapses!.</p>
          <?php
 $pdo = new PDO("mysql:host=localhost;dbname=studentid", "root", "");
 // Set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM download";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo"<tr>";
      echo"<td>";?> <a href="<?php echo $result['path']; ?>">
           <input type="submit"  name="submit" value="Download Gate Pass" />
    </a> <?php echo"</td>";
      echo"</tr>";
    }
    ?>
        </div>
        <div class="modal-footer">
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

           </div>
           <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg"  style="background-color:black; text-align: center>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><font color="white">Read the following For guidance on the use of map and searching your lost document</h3>
          
        </div>
        <div class="modal-body">
          <h3>Map and Navigation</h3>
          <p>->Use the map interface to search any place within Kenyatta University</p>
          <p>->Use the direction widget to navigate through and drag the route to your destination</p>
          <h3>Document Search</h3>
          <p>->If you did not find your document try searching using the following:</p>
          <p><b>->STUDENT ID-student id <strong>MIDDLE</strong> number i.e 3473</b></p>
          <p><b>->NATIONAL ID-national id <strong> 8 DIGIT </strong> number i.e 2354xxxx</b></p>
          <p><b>->EXAM CARD-student id <strong>MIDDLE</strong> number i.e 1234</b></p>
          <p><b>->PASSPORT-passport number</b></p>
          <p><b>->ATM CARDS-ATM account number</b></p>
          <p><b>->ACADEMIC CERTIFICATES- Academic serial number</b></p>
              <p><strong><em><font color="red">NOTE</font></em></strong><font> Temporary Gate Pass Will only serve you for a period of 2 weeks, try to find your ID before the stated time elapses!.</font></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

           </div>
           <!-- Modal content for feedback-->

           <div class="modal fade" id="myModal23" role="dialog">
    <div class="modal-dialog modal-sm"  style="background-color:black; text-align: center;>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title"><font color="white">Send Us a Feedback On what you would like included in the map</h3>
          
        </div>
        <div class="modal-body">
         <div>

Your name: <br>
<input type="text" name="realname" id="name" style="width:100%; height:100%;background-color : #2B0B04;"><br>
<br>

Your email: <br>
<input type="text" id="email" name="email" style="width:100%; height:100%;background-color : #2B0B04;" ><br>
<br>

Your comments: <br>
<textarea name="comments" id="comment" rows="2" cols="160" style="background-color : #2B0B04;"></textarea><br><br>

<input type="submit" id="feeds" value="Submit">
 
</div>
        </div>
        <div class="modal-footer">
       
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

           </div>
           <script type="text/javascript">
           $(function () {
        $('#feeds').click(function () {
          var name = $('#name').val();
          var email=$('#email').val();
          var comment= $('#comment').val();
          
          $.post("email.php",{name:name,email:email,comment:comment},function(data){
            alert(data);
  
            //$("#result").text(data);
          });
        });
      });
           </script>

           <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color:black;">
        <div class="modal-header">
          <h4 class="modal-title" style="text-align: center"><font color="white">By seeing this, it's either you typed the number document wrongly or the  Document does not exist in our records</font></h4>
        </div>
        <div class="modal-body">
           <p>If you did not find your document try searching using the following:</p>
          <p><b>STUDENT ID-student id <strong>MIDDLE</strong> number i.e 3473</b></p>
          <p><b>NATIONAL ID-national id <strong> 8 DIGIT </strong> number i.e 2354xxxx</b></p>
          <p><b>EXAM CARD-student id <strong>MIDDLE</strong> number i.e 1234</b></p>
          <p><b>PASSPORT-passport number</b></p>
          <p><b>ATM CARDS-ATM account number</b></p>
          <p><b>ACADEMIC CERTIFICATES- Academic serial number</b></p>
          <h3>Student Id not found? Download the Temporary Gatepass Below</h3>
           <h3>Student Id not found? Download the Temporary Gatepass</h3>
          <p><strong><font color="red">NOTE</font></strong>-: This Temporary Gate Pass Will only serve you for a period of 2 weeks, try to find your ID before the stated time elapses!.</p>
          <?php
 $pdo = new PDO("mysql:host=localhost;dbname=studentid", "root", "");
 // Set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM download";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
      echo"<tr>";
      echo"<td>";?> <a href="<?php echo $result['path']; ?>">
           <input type="submit" style="text-align: center;"  name="submit" value="Download Gate Pass" />
    </a> <?php echo"</td>";
      echo"</tr>";
    }
    ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
  <!-- <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script> -->
 <!--- <script src="global.js"></script> -->
  
    </div>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="js/main.js"></script>
   <div class="sidebar">
     
      
    <div class="toggle"><button class="button" data-rel="#content-a">S<br/>L<br/>I<br/>D<br/>E<br/></button></div>
    <div class="flr-wrap">
      <a class="button active" id="side" data-rel="#content-a" href="#">Direction</a>
      <a class="button" id="side" data-rel="#content-b" href="#">Legend</a>
      <a class="button" id="side" data-rel="#content-c" href="#">Print Map</a>
      </div>
     <div class="flr-inner">
         
         <div class="container" id="content-a"><div id="dir"></div></div>
        <div class="container" id="content-b">
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='layer0CheckBox' value=0 checked /> &nbsp;<img src="https://i2.wp.com/www.clker.com/cliparts/H/g/N/o/m/p/google-maps-icon-blank-hi.png?fit=450,300&zoom=2&strip=all" height="30" width="20">&nbsp;Lecture Halls</h2> 
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='mess' value=0 checked /> &nbsp;<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Map_symbol_dining_02.svg/2000px-Map_symbol_dining_02.svg.png" height="20" width="20">&nbsp;Mess And Restaurants</h2>
           <h2 style="color: #0A54A0"> <span id="layer_list"><input type='checkbox' class='squaredTwo' id='buildings' value=0 checked/> &nbsp;<img src="https://cdn2.iconfinder.com/data/icons/map-locations-filled-pixel-perfect/64/pin-map-location-26-512.png" height="20" width="20">&nbsp;Parking</h2>
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='busstop' value=0 checked/> &nbsp;<img src="https://www.logolynx.com/images/logolynx/b9/b928b3bb707c4ed955330de28a099aa7.png" height="20" width="20">&nbsp;Bus Stops  </h2>
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='facilities' value=0 checked/> &nbsp;<img src="https://cdn1.iconfinder.com/data/icons/maps-and-location-v2/64/shadow_pin_floating_google-512.png" height="20" width="20">&nbsp;KU Facilities</h2>
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='layer0CheckBox' value=0 checked/> &nbsp;<img src="http://oppidanlibrary.com/wp-content/uploads/2017/05/Route-Map-Symbol.png" height="20" width="20">&nbsp;Routes And Paths</h2>
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='layer0CheckBox' value=0 checked/> &nbsp;<img src="https://d30y9cdsu7xlg0.cloudfront.net/png/89553-200.png" height="20" width="20">&nbsp;Bank</h2>
           <h2 style="color: #0A54A0"><span id="layer_list"><input type='checkbox' class='squaredTwo' id='layer0CheckBox' value=0 checked/> &nbsp;<img src="Flashspot.gif" height="20" width="20">&nbsp;Terminals</h2>
             <h2 style="color: #0A54A0"><input type="checkbox" class='squaredTwo' id="use-clustering"> &nbsp;<img src="https://78.media.tumblr.com/f27d300957b2514d27d7d27fa2b6c743/tumblr_nxytcyTLUH1qctvbvo1_500.gif" height="30" width="20">&nbsp;Wifi Zones</h2>
          
        </span>
        <br />
          <div id="legendDiv"></div>
        </div>
         <div class="container" id="content-c">
           <div id="feedback">
          <h4 style="color:green;text-align: center;">
            Print Map   
          </h4>
            <button type="button" id="print1" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-print" id="print_button"></span>
        </button>
        
        </div>
        <div id="searchmap1"></div>
        </div>
    </div>
</div>
    
</div>
<script>
  // set content on click
$('.button').click(function(e) {
    e.preventDefault();
    setContent($(this));
});

// set content on load
$('.button.active').length && setContent($('.button.active'));

function setContent($el) {
    $('.button').removeClass('active');
    $('.container').hide();
    
    $el.addClass('active');
    $($el.data('rel')).show();
}
$('.toggle').on('click', function() {
    $('.sidebar').toggleClass("sidebar-collapsed");
});
//header section
$('#monitor').html($(window).width());

$(window).resize(function() {
    var viewportWidth = $(window).width();
    $('#monitor').html(viewportWidth);
});
</script>
<svg height="0" xmlns="http://www.w3.org/2000/svg">
      <filter id="drop-shadow">
        <feGaussianBlur in="SourceAlpha" stdDeviation="2"/>
        <feOffset dx="0" dy="0" result="offsetblur"/>
        <feFlood flood-color="rgba(0,0,0,3)"/>
        <feComposite in2="offsetblur" operator="in"/>
        <feMerge>
          <feMergeNode/>
          <feMergeNode in="SourceGraphic"/>
        </feMerge>
      </filter>
    </svg>
<style>
      text {
        text-shadow: 3px 3px 3px rgba(0,0,0,3);
        filter: url(#drop-shadow);
      }
    </style>
  </body>
    <script>
      var map;
      require(["esri/dijit/Scalebar",
        "esri/arcgis/OAuthInfo", 
        "esri/IdentityManager",
        "esri/map",
        "esri/layers/FeatureLayer",
        "esri/InfoTemplate",
        "esri/dijit/HomeButton",
        "esri/dijit/Search",
        "esri/dijit/LocateButton",
        "esri/symbols/PictureMarkerSymbol",
  "esri/symbols/SimpleLineSymbol",
  "esri/layers/graphics",
   "esri/Color",
   "esri/urlUtils",
   "esri/dijit/Directions",
  "esri/renderers/SimpleRenderer",
    "esri/geometry/Extent",
    "esri/tasks/query",
    "esri/tasks/QueryTask",
     "dojo/_base/array",
     "esri/geometry/webMercatorUtils",
     "esri/geometry/Point",
      "esri/layers/GraphicsLayer",
    "esri/dijit/BasemapToggle",
     "esri/graphicsUtils",
     "esri/dijit/BasemapGallery",
     "esri/dijit/InfoWindow",
      "esri/layers/LabelClass",
      "esri/symbols/SimpleFillSymbol",
      "esri/dijit/OverviewMap",
        "esri/symbols/TextSymbol",
         "esri/dijit/Print",
         "esri/graphic",
         "dijit/TooltipDialog", "dijit/popup",
         "esri/lang",
  "esri/renderers/UniqueValueRenderer", 
         "esri/tasks/PrintTemplate", 
         "esri/dijit/Legend",
        "esri/request", 
        "esri/config",
        "dojo/dom-style",
    "dojo/keys",
    "dojo/on",
        "dojo/parser", 
        "dojo/dom",
        "dijit/layout/BorderContainer", 
        "dijit/layout/ContentPane", 
        "dojo/domReady!"],
         function(Scalebar, OAuthInfo, esriId,Map, FeatureLayer,InfoTemplate,HomeButton,Search,LocateButton,PictureMarkerSymbol,SimpleLineSymbol,graphics,Color,urlUtils,Directions,SimpleRenderer,Extent,Query,QueryTask,arrayUtils,webMercatorUtils, Point,GraphicsLayer,BasemapToggle,graphicsUtils,BasemapGallery,InfoWindow,LabelClass,SimpleFillSymbol,OverviewMap,TextSymbol,Print,Graphic,TooltipDialog, dijitPopup,esriLang,UniqueValueRenderer,PrintTemplate,Legend,esriRequest, esriConfig, domStyle,keys, on,parser, dom,BorderContainer,ContentPane) {
        parser.parse();
        var printUrl = "https://sampleserver6.arcgisonline.com/arcgis/rest/services/Utilities/PrintingTools/GPServer/Export%20Web%20Map%20Task";

       
         
         //var info= new OAuthInfo({
            //appID:"mOuJWmBOIbksic1E",
             //client_id:"mOuJWmBOIbksic1E",
            //popup:false
            
         // });
          //esriId.registerOAuthInfos([info]);
         //IdentityManager.registerOAuthInfos([info]);
        urlUtils.addProxyRule({
          urlPrefix:"https://utility.arcgis.com/usrsvcs/appservices/HTiTIpg4GXdxW5Te/rest/services/World/Route/NAServer/Route_World/solve",
          proxyUrl:"/sproxy"
        });
        

        var initialExtent = new esri.geometry.Extent({"xmin":36.910964 , "ymin": -1.187512, "xmax":36.941208 , "ymax": -1.172684 , "spatialReference": {"wkid": 4326}});
            // Create map

            //esriId.getCredential(info.portalUrl,"/sharing").then(function(){
              var map = new Map("map", {
                basemap: "satellite",
                center: [36.930699,-1.179523],
                extent: initialExtent,
                zoom: 17,
                showLabels : true,
                 maxZoom:18,
                 logo:false,
                 minZoom:15,
                
                });

              //This code limits the extent of the map to prevent users from scrolling far away from the
  //initial extent. 

  map.on('extent-change', function(event) {
    if(!initialExtent){
      initialExtent = map.extent;
    }
    
    //If the map has moved to the point where it's center is outside the initial boundaries,
    //then move it back to the edge where it moved out
    var currentCenter = map.extent.getCenter();
    if (initialExtent && !initialExtent.contains(currentCenter) && event.delta && event.delta.x !== 0 && event.delta.y !== 0) {
      var newCenter = map.extent.getCenter();

      //check each side of the initial extent and if the current center is outside that extent, 
      //set the new center to be on the edge that it went out on
      if (currentCenter.x < initialExtent.xmin) {
        newCenter.x = initialExtent.xmin;
      }
      if (currentCenter.x > initialExtent.xmax) {
        newCenter.x = initialExtent.xmax;
      }
      if (currentCenter.y < initialExtent.ymin) {
        newCenter.y = initialExtent.ymin;
      }
      if (currentCenter.y > initialExtent.ymax) {
        newCenter.y = initialExtent.ymax;
      }
      alert("The area you are viewing is out of Kenyatta University!");
       map.centerAndZoom(new Point(36.930699,-1.179523), 17);
    }
  });
              

             var infotemplate=new InfoTemplate();

            var overviewMapDijit = new OverviewMap({
    map: map,
    attachTo: "bottom-right",
    color:" #D84E13",
    visible:true,
    //baseLayer:"hybrid",
    opacity: .40,
     maximizeButton:true,
     width:100,
     height:80
  });
            overviewMapDijit.startup();
            var search = new Search({
            map: map,
            enableButtonMode: true, //this enables the search widget to display as a single button
         }, "searchmap");
            overviewMapDijit.startup();     height:250

             var overviewMapDijit = new OverviewMap({
    map: map,
    attachTo: "center",
    color:" #D84E13",
    visible:true,
    //baseLayer:"hybrid",
    opacity: .40,
     maximizeButton:true,
     width:310,
     height:245
  },"searchmap1");
            overviewMapDijit.startup();

           
          //var sources = search.get("sources");
           var sources = [];  
          sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/LECTURE_HALLSfinal/FeatureServer/0"),
        searchFields: ["name"],
        displayField: "name",
        exactMatch: true,
        outFields: ["name"],
        name: "KU Lecture Halls",
        placeholder: "ELH",
        maxResults: 6,
        maxSuggestions: 6,
        autoComplete: true,
        highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
        //Create an InfoTemplate and include 1 field
        infoTemplate: new InfoTemplate("Lecture hall name",
          "Name: ${name}"+"Lecture halls"),
        enableSuggestions: true,
        minCharacters: 0
      });

              sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Kenyatta_University_Places2/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"KU Buildings",
            placeholder:"Nyayo 3",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Building Name","${Name}"),
             enableSuggestions: true,
        minCharacters: 0   
           });
              sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/kuschools/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"Kenyatta University Schools",
            placeholder:"School of Business",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("School","${Name}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
              sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/Kenyatta_UNI_Streets_and_Walkways/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"Kenyatta University Routes",
            placeholder:"Chancellor's Road",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Route","${Name}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
               sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Parking_Lots/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"KU Parking Lots",
            placeholder:"BSSC parking Area",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Parking Lot","${Name}"+" "+"Area reserved for parking"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
                sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/terminals/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"Lost Document Terminals",
            placeholder:"844",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Document Terminal","${Name}"+" "+"This is one of the areas for placing lost and found documents"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
                sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/mess/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"KU restaurants and Mess",
            placeholder:"Culture Village",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("restaurant","${Name}"+" "+"About:"+"${Descriptions}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
                 sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Kenyatta_University_Shuttle_Map/FeatureServer/1"),
           searchFields: ["NAME"],
            displayField:"NAME",
            exactMatch: true,
            outFields: ["NAME"],
            name:"Bus Stops",
            placeholder:"8A",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 36).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Bus Stop","${NAME}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
       
                 sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Kenyatta_buildings/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["NAME"],
            name:"Facilities",
            placeholder:"CIT",  
           maxResults: 6,
        maxSuggestions: 6,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 56).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Facility Name","${Name}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
                  sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/zones/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"KU Zones",
            placeholder:"Eastern",  
           maxResults: 6,
        maxSuggestions: 3,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 56).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Zone Name","${Name}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
                  sources.push({
        featureLayer: new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/lect/FeatureServer/0"),
           searchFields: ["Name"],
            displayField:"Name",
            exactMatch: true,
            outFields: ["Name"],
            name:"Lecture halls",
            placeholder:"WZ",  
           maxResults: 6,
        maxSuggestions: 3,
            autoComplete: true,
             highlightSymbol: new PictureMarkerSymbol("https://js.arcgis.com/3.23/esri/dijit/Search/images/search-pointer.png", 36, 56).setOffset(9, 18),
             infoTemplate: new InfoTemplate("Lecture Hall","${Name}"),
             enableSuggestions: true,
        minCharacters: 0
            
           });
                 
            search.set("sources", sources);
            search.startup();
            var direction= new Directions({
              map:map,
              opacity:0.5,
              showTravelModesOption:true,
              optimalRoute:true,
               showClearButton:true
              
            },"dir");
            direction.set("mapClickActive",true);
             direction.startup();

             var home = new HomeButton({
        map: map
      }, "HomeButton");
      home.startup();
      var toggle = new BasemapToggle({
        map: map,
        basemap: "dark-gray"
      }, "BasemapToggle");
      toggle.startup();
      var locate=new LocateButton({
        map:map
      },"LocateButton");
      locate.startup();
       var scalebar = new Scalebar({
          map: map,
    attachTo: "bottom-center",
          // "dual" displays both miles and kilometers
          // "english" is the default, which displays miles
          // use "metric" for kilometers
          scalebarUnit: "metric"
        });
       map.on("load", load_defaults);

       var terminal= localStorage.getItem('terminal');
 var terminal1=new InfoTemplate("${Name}");
 var buildings=new InfoTemplate("${Name}");
      buildings.setContent("<b>Name</b>: ${Name}" + "${name}" +"<br><img src=${Image} width='250' height='100' class='thumbnail' />"+"<h3><b>About:</b>Data Still Processing.....</h3>"+" "+" "+"<button id='button-1'>Services</button>"+" "+"<button id='button-1'>Offices</button>"+" "+"<button id='button-1'>Opening Hrs</button>");
      var mess=new InfoTemplate("${Name}");
      var wifi=new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/linus_wifi/FeatureServer/0");
       var busstops=new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Kenyatta_University_Shuttle_Map/FeatureServer/1");
       //busstops.on("click", function(evt){
          //var t = "<b>okay";
      //alert('You have hovered me');
        //});
        // create a renderer for the states layer to override default symbology for route
        var lectColor = new Color("#DBF906");
        var lectLine = new SimpleLineSymbol("solid", lectColor, 1.5);
        var lectSymbol = new SimpleFillSymbol("solid", lectLine, null);
        var lectRenderer = new SimpleRenderer(lectSymbol);
         
        // create the feature layer to render and label
        var lectUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/lect/FeatureServer/0";
        var lect= new FeatureLayer(lectUrl, {
          id: "lecture halls",
          outFields: ["*"]
        });
        lect.setRenderer(lectRenderer);
         lect.minScale=10000;


        // create a text symbol to define the style of labels
        var lectLabel = new TextSymbol().setColor(lectColor);
        lectLabel.font.setSize("11pt");
        lectLabel.font.setFamily("arial");

        //this is the very least of what should be set within the JSON  
        var json = {
          "labelExpressionInfo": {"value": "{Name}"}
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json);
        labelClass.symbol = lectLabel; // symbol also can be set in LabelClass' json
        lect.setLabelingInfo([ labelClass ]);
         // create a renderer for the states layer to override default symbology

      // create a renderer for the states layer to override default symbology for route
        var routeColor = new Color("#F7DC6F");
        var routeLine = new SimpleLineSymbol("solid", routeColor, 1.5);
        var routeSymbol = new SimpleFillSymbol("solid", routeLine, null);
        var routeRenderer = new SimpleRenderer(routeSymbol);
         
        // create the feature layer to render and label
        var routeUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/Kenyatta_UNI_Streets_and_Walkways/FeatureServer/0";
        var route= new FeatureLayer(routeUrl, {
          id: "KU Streets",
          outFields: ["*"]
        });
        route.setRenderer(routeRenderer);
         route.minScale=10000;


        // create a text symbol to define the style of labels
        var routeLabel = new TextSymbol().setColor(routeColor);
        routeLabel.font.setSize("7pt");
        routeLabel.font.setFamily("arial");

        //this is the very least of what should be set within the JSON  
        var json = {
          "labelExpressionInfo": {"value": "{Name}"}
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json);
        labelClass.symbol = routeLabel; // symbol also can be set in LabelClass' json
        route.setLabelingInfo([ labelClass ]);
         // create a renderer for the states layer to override default symbology
        var zoneColor = new Color("#6FB1F7");
        var zoneLine = new SimpleLineSymbol("solid", zoneColor, 1.5);
        var zoneSymbol = new SimpleFillSymbol("solid", zoneLine, null);
        var zoneRenderer = new SimpleRenderer(zoneSymbol);
         
        // create the feature layer to render and label
        var zoneUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/zones/FeatureServer/0";
        var zone = new FeatureLayer(zoneUrl, {
          id: "Zones",
          outFields: ["*"]
        });
        zone.setRenderer(zoneRenderer);


        // create a text symbol to define the style of labels
        var zoneLabel = new TextSymbol().setColor(zoneColor);
        zoneLabel.font.setSize("14pt");
        zoneLabel.font.setFamily("arial");

        //this is the very least of what should be set within the JSON  
        var json = {
          "labelExpressionInfo": {"value": "{Name}"}
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json);
        labelClass.symbol = zoneLabel; // symbol also can be set in LabelClass' json
        zone.setLabelingInfo([ labelClass ]);
        
             //restaurants label
        var restColor = new Color("#34833B");
        var restLine = new SimpleLineSymbol("solid", restColor, 1.5);
        var restSymbol = new SimpleFillSymbol("solid", restLine, null);
        var restRenderer = new SimpleRenderer(restSymbol);
         
        // create the feature layer to render and label
        var restUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/mess/FeatureServer/0";
        var rest = new FeatureLayer(restUrl, {
          id: "Restaurants and Mess",
          outFields: ["*"]
        });
        rest.setRenderer(restRenderer);
         rest.minScale=10000;


        // create a text symbol to define the style of labels
        var restLabel = new TextSymbol().setColor(restColor);
        restLabel.font.setSize("12pt");
        restLabel.font.setFamily("arial");

        //this is the very least of what should be set within the JSON  
        var json = {
          "labelExpressionInfo": {"value": "{Name}"}
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json);
        labelClass.symbol = restLabel; // symbol also can be set in LabelClass' json
        rest.setLabelingInfo([ labelClass ]);
      
      
       var stateColor = new Color("#F39C12");
        var stateLine = new SimpleLineSymbol("solid", stateColor, 1.5);
        var stateSymbol = new SimpleFillSymbol("solid", stateLine, null);
        var stateRenderer = new SimpleRenderer(stateSymbol);
         
        // create the feature layer to render and label
        var stateUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Parking_Lots/FeatureServer/0";
        var state = new FeatureLayer(stateUrl, {
          id: "states",
          outFields: ["*"]
        });
        state.setRenderer(stateRenderer);
        state.minScale=0;
      state.minScale=5000;


        // create a text symbol to define the style of labels
        var stateLabel = new TextSymbol().setColor(stateColor);
        stateLabel.font.setSize("10pt");
        stateLabel.font.setFamily("arial");

        //this is the very least of what should be set within the JSON  
        var json = {
          "labelExpressionInfo": {"value": "{Name}"}
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json);
        labelClass.symbol = stateLabel; // symbol also can be set in LabelClass' json
        state.setLabelingInfo([ labelClass ]);
        var bank=new InfoTemplate("${Name}");
      var banks=new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/atmsandatm/FeatureServer/0");

      function load_defaults(){


        // create a renderer for the states layer to override default symbology
        var statesColor = new Color("#2E86C1");
        var statesLine = new SimpleLineSymbol("solid", statesColor, 1.5);
        var statesSymbol = new SimpleFillSymbol("solid", statesLine, null);
        var statesRenderer = new SimpleRenderer(statesSymbol);
         
        // create the feature layer to render and label
        var statesUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/terminals/FeatureServer/0";
        var states = new FeatureLayer(statesUrl, {
          id: "Terminals",
          outFields: ["*"]
        });
        states.setRenderer(statesRenderer);


        // create a text symbol to define the style of labels
        var statesLabel = new TextSymbol().setColor(statesColor);
        statesLabel.font.setSize("10pt");
        statesLabel.font.setFamily("arial");

        //this is the very least of what should be set within the JSON  
        var json1 = {
          "labelExpressionInfo": {"value": "{Name}"+" "+"terminal"},
          "minSize": 10,
   "maxSize": 20
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json1);
        labelClass.symbol = statesLabel; // symbol also can be set in LabelClass' json
        states.setLabelingInfo([ labelClass ]);
          // create a renderer for the states layer to override default symbology for lecture
        var statesColor = new Color("#DBF906");
        var statesLine = new SimpleLineSymbol("solid", statesColor, 1);
        var statesSymbol = new SimpleFillSymbol("solid", statesLine, null);
        var statesRenderer = new SimpleRenderer(statesSymbol);
         
        // create the feature layer to render and label
        var statesUrl1 = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/LECTURE_HALLSfinal/FeatureServer/0";
        var states1 = new FeatureLayer(statesUrl1, {
          id: " lecture halls",
          outFields: ["*"]
        });
        states.setRenderer(statesRenderer);


        // create a text symbol to define the style of labels
        var statesLabel = new TextSymbol().setColor(statesColor);
        statesLabel.font.setSize("11pt");
        statesLabel.font.setFamily("Arial");

        //this is the very least of what should be set within the JSON  
        var json = {
          "labelExpressionInfo": {"value": "{name}"}
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json);
        labelClass.symbol = statesLabel; // symbol also can be set in LabelClass' json
        states1.setLabelingInfo([labelClass]);
         // create a renderer for the states layer to override default symbology
        var statesColor = new Color("#D1DBEA");
        var statesLine = new SimpleLineSymbol("solid", statesColor, 1.5);
        var statesSymbol = new SimpleFillSymbol("solid", statesLine, null);
        var statesRenderer = new SimpleRenderer(statesSymbol);
         
        // create the feature layer to render and label
        var statesUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Kenyatta_University_Places2/FeatureServer/0";
        var states2 = new FeatureLayer(statesUrl, {
          id: "Landmark Features",
          outFields: ["*"]
        });
        states2.setRenderer(statesRenderer);
        states2.minScale=9000;


        // create a text symbol to define the style of labels
        var statesLabel = new TextSymbol().setColor(statesColor);
        statesLabel.font.setSize("12pt");
        statesLabel.font.setFamily("Times New Roman");


        //this is the very least of what should be set within the JSON  
        var json3 = {
          "labelExpressionInfo": {"value": "{Name}"},
          "pointPriorities": "AboveCenter"
          
        };

        //create instance of LabelClass (note: multiple LabelClasses can be passed in as an array)
        var labelClass = new LabelClass(json3);
        labelClass.symbol = statesLabel; // symbol also can be set in LabelClass' json
        states2.setLabelingInfo([ labelClass ]);
        
          var featureLayer = new FeatureLayer("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/ArcGIS/rest/services/Kenyatta_buildings/FeatureServer/0",{
             mode: FeatureLayer.MODE_ONDEMAND,
            outFields: ["*"],
            infoTemplate: buildings,
             "opacity":0.6
          });
          var place= new PictureMarkerSymbol("flag.png",40,15);
           var hotspot= new PictureMarkerSymbol("https://media.giphy.com/media/30QF0blUiVVsY/source.gif",25,25);
          var lecture= new PictureMarkerSymbol("https://i2.wp.com/www.clker.com/cliparts/H/g/N/o/m/p/google-maps-icon-blank-hi.png?fit=450,300&zoom=2&strip=all",10,15);
          var park=new PictureMarkerSymbol("https://cdn2.iconfinder.com/data/icons/map-locations-filled-pixel-perfect/64/pin-map-location-26-512.png",20,20);
          var landmark= new PictureMarkerSymbol("https://cdn1.iconfinder.com/data/icons/maps-and-location-v2/64/shadow_pin_floating_google-512.png",13,13);
          var atm=new PictureMarkerSymbol("https://d30y9cdsu7xlg0.cloudfront.net/png/89553-200.png",20,20);
           var restaurant =  new PictureMarkerSymbol({
    "url":"https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Map_symbol_dining_02.svg/2000px-Map_symbol_dining_02.svg.png",
    "height":15,
    "width":15
  });
           var shuttle=new PictureMarkerSymbol("https://www.logolynx.com/images/logolynx/b9/b928b3bb707c4ed955330de28a099aa7.png",10,10);

          
        
        var symbol = new PictureMarkerSymbol("Flashspot.gif", 15, 15);
        var style = new SimpleLineSymbol(
        SimpleLineSymbol.STYLE_SOLID,
        new Color([0,0,0,0]),
        5
        );
        var style2= new SimpleLineSymbol(
        SimpleLineSymbol.STYLE_SOLID,
        new Color([250,120,120]),
        1
        );
        var Streets = new SimpleLineSymbol(
        SimpleLineSymbol.STYLE_SOLID,
        new Color([250,0,0,0.1]),
        1
        );
        
         states.setRenderer(new SimpleRenderer(symbol));
         featureLayer.setRenderer(new SimpleRenderer(style));
         states1.setRenderer(new SimpleRenderer(lecture));
          lect.setRenderer(new SimpleRenderer(lecture));
         state.setRenderer(new SimpleRenderer(park));
          rest.setRenderer(new SimpleRenderer(restaurant));
           busstops.setRenderer(new SimpleRenderer(shuttle));
          route.setRenderer(new SimpleRenderer(Streets));
          banks.setRenderer(new SimpleRenderer(atm));
           states2.setRenderer(new SimpleRenderer(landmark));

          
      var diplaylec = document.getElementById("layer0CheckBox");
      // toggles clustering on and off in sync with the checkbox
     diplaylec.addEventListener("click", function(event){
        var checked1 = event.target.checked;
        toggleFeature1(checked1);
      });
     function toggleFeature1(yes) {
      if(yes){
       lect.setVisibility(true);
        states1.setVisibility(true);
      }
      else{
        lect.setVisibility(false);
         states1.setVisibility(false);
      }
     }
      var diplaymess = document.getElementById("mess");
      // toggles clustering on and off in sync with the checkbox
     diplaymess.addEventListener("click", function(event){
        var checked2 = event.target.checked;
        toggleFeature(checked2);
      });
     function toggleFeature(yes) {
      if(yes){
       rest.setVisibility(true); 
      }
      else{
        rest.setVisibility(false);
       
      }
     }
      var diplaybus = document.getElementById("busstop");
      // toggles clustering on and off in sync with the checkbox
     diplaybus.addEventListener("click", function(event){
        var checked3 = event.target.checked;
        toggleFeature3(checked3);
      });
     function toggleFeature3(yes) {
      if(yes){
       busstops.setVisibility(true);
      }
      else{
        busstops.setVisibility(false);
      }
     }
     var diplayfacilities = document.getElementById("facilities");
      // toggles clustering on and off in sync with the checkbox
     diplayfacilities.addEventListener("click", function(event){
        var checked4 = event.target.checked;
        toggleFeature4(checked4);
      });
     function toggleFeature4(yes) {
      if(yes){
       states2.setVisibility(true);
      }
      else{
        states2.setVisibility(false);
      }
     }
     toggle.on("toggle",function(){
    states2.setVisibility(false);
    document.getElementById("facilities").checked = false;
     featureLayer.setRenderer(new SimpleRenderer(style2));
     });

      var clusteringCheckbox = document.getElementById("use-clustering");
      // toggles clustering on and off in sync with the checkbox
      clusteringCheckbox.addEventListener("click", function(event){
        var checked = event.target.checked;
        toggleFeatureReduction(checked);
      });
   
    // Sets feature reduction on the layer if not previously done so.
    // If indicated, then feature reduction is disabled. The initial
    // feature reduction settings are enabled if indicated.
    function toggleFeatureReduction(yes){
      if(yes){
        if(!states2.getFeatureReduction()){
          states2.setFeatureReduction({
            type: "cluster"
          });
        } else {
          states2.enableFeatureReduction();
           //wifi.setRenderer(new SimpleRenderer(hotspot));
        }
      } else {
        states2.disableFeatureReduction();
      }
    }

          
        // map.on("click",function (event){
         // var query = new Query();
          //query.geometry = event.mapPoint;

           //busstops.selectFeatures(query, FeatureLayer.SELECTION_NEW, function (features){
           
           
            //map.infoWindow.setTitle("Bus Stop");
            //map.infoWindow.setContent(content);
           // map.infoWindow.show(event.mapPoint);
          //});
         // });
         
         // add graphics for pools with permits
        var permitUrl = "https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/terminals/FeatureServer/0";
        var poolFeatureLayer = new FeatureLayer(permitUrl, {
          "mode": FeatureLayer.MODE_SNAPSHOT
        });
        //map.addLayer(poolFeatureLayer);

        // get print templates from the export web map task
       poolFeatureLayer.setRenderer(new SimpleRenderer(place));
        var printInfo = esriRequest({
          "url": printUrl,
          "content": { "f": "json" }
        });
        printInfo.then(handlePrintInfo, handleError);

        function handlePrintInfo(resp) {
          var layoutTemplate, templateNames, mapOnlyIndex, templates;

          layoutTemplate = arrayUtils.filter(resp.parameters, function(param, idx) {
            return param.name === "Layout_Template";
          });
          
          if ( layoutTemplate.length === 0 ) {
            console.log("print service parameters name for templates must be \"Layout_Template\"");
            return;
          }
          templateNames = layoutTemplate[0].choiceList;

          // remove the MAP_ONLY template then add it to the end of the list of templates 
          mapOnlyIndex = arrayUtils.indexOf(templateNames, "MAP_ONLY");
          if ( mapOnlyIndex > -1 ) {
            var mapOnly = templateNames.splice(mapOnlyIndex, mapOnlyIndex + 1)[0];
            templateNames.push(mapOnly);
          }
          
          // create a print template for each choice
          templates = arrayUtils.map(templateNames, function(ch) {
            var plate = new PrintTemplate();
            plate.layout = plate.label = ch;
            plate.format = "PDF";
            plate.layoutOptions = { 
              "authorText": "Made by:  Peter Okello",
              "copyrightText": "<copyright info here>",
              "legendLayers": [], 
              "titleText": "Kenyatta University Map", 
              "scalebarUnit": "Miles" 
            };
            return plate;
          });

          // create the print dijit
          var printer = new Print({
            "map": map,
            "templates": templates,
            url: printUrl
          }, dom.byId("print_button"));
          printer.startup();
        }
            
        function handleError(err) {
          console.log("Something broke: ", err);
        } 
       // map.on("layers-add-result", function (evt) {
        //var layerInfo = arrayUtils.map(evt.layers, function (layer, index) {
          //return {layer:layer.layer, title:layer.layer.name};
        //});
        //if (layerInfo.length > 0) {
          //var legendDijit = new Legend({
            //map: map,
            //layerInfos: layerInfo,
             //title:"Map Legend"
          //}, "legendDiv");
          //legendDijit.startup();
        //}
      //});  

        map.addLayers([lect,busstops,route,zone,state,rest,banks,states,states1,states2,featureLayer,poolFeatureLayer]);
         //map.infoWindow.resize(245,125);

        dialog = new TooltipDialog({
          id: "tooltipDialog",
          style: "position: absolute; width: 100px; background:black;font: normal normal normal 9pt Helvetica;z-index:100"
        });
        dialog.startup();

    
        //close the dialog when the mouse leaves the highlight graphic
        map.on("load", function(){
          map.graphics.enableMouseEvents();
          map.graphics.on("mouse-out", closeDialog);

        });

        //listen for when the onMouseOver event fires on the countiesGraphicsLayer
        //when fired, create a new graphic with the geometry from the event.graphic and add it to the maps graphics layer
        featureLayer.on("mouse-over", function(evt){
          
          var t = "${Name}";

          var content = esriLang.substitute(evt.graphic.attributes,t);
          //var highlightGraphic = new Graphic(evt.graphic.geometry,highlightSymbol);
          //map.graphics.add(highlightGraphic);
          dialog.setContent(content);
          domStyle.set(dialog.domNode, "opacity", 0.85);
          dijitPopup.open({
            popup: dialog,
            x: evt.pageX,
            y: evt.pageY
          });
         setTimeout(function(){
closeDialog(); 
 },3000);
         });
 
        function closeDialog() {

          dijitPopup.close(dialog);
          // map.graphics.clear();
        }

      }
       /***
             * Add list of wards to  html dropdown list
             * This will be achieved through querying of the feature layer and appending the array to the html dropdown list
             *We do not return geometry since its just an array list
             ****/

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

                    $('#terminal').append($('<option></option>', {value: "" + featureAttributes + ""}).text(featureAttributes));
                }
            }
            //Query feature layer and zoom to the specific location
           

      //Query feature layer and zoom to the specific location
            $('#button').on('click',function () {
               var name=$('input#search').val();
if($.trim(name) !=''){
  $.post('search.php',{search:name}, function(data){
    if(data){
      var jsonobj=JSON.parse(data);
      //var result=['Name:'+jsonobj.name,'Terminal posted:'+jsonobj.terminal,'Date Posted:'+jsonobj.Date,'Identity No:'+jsonobj.Reg_no,'Type:'+jsonobj.type];
      localStorage.setItem('firstname',jsonobj.firstname);
       localStorage.setItem('lastname',jsonobj.lastname);
        localStorage.setItem('date',jsonobj.Date);
         localStorage.setItem('type',jsonobj.type);
         localStorage.setItem('Identity',jsonobj.Reg_no);
    //$('div#submit-data').text(result);
    //$('div#data-not-found').text("");
    localStorage.setItem('terminal',jsonobj.terminal);
    localStorage.setItem('Date',jsonobj.Date);
   
    var name1= localStorage.getItem('firstname');
    var name2= localStorage.getItem('lastname');
    var date= localStorage.getItem('date');
    var type= localStorage.getItem('type');
    var Identity= localStorage.getItem('Identity');
    var terminal= localStorage.getItem('terminal');
     var queryTask = new QueryTask("https://services1.arcgis.com/Kw7jGaBPiN3WUAmT/arcgis/rest/services/terminals/FeatureServer/0",{mode:FeatureLayer.MODE_ONDEMAND,
      outFields:["Name"]
    });
    
                var query = new Query();
                query.returnGeometry = true;
                query.outFields = ["*"];
                query.where = "Name = '" + terminal + "'";
                queryTask.execute(query, showResults);

               
                 
                function showResults(results) {
                  var resultCount = results.features.length;
                    for (var i = 0; i < resultCount; i++) {
    
                        var geom = results.features[i].geometry;
                                        //Zoom to point 
                       // map.setExtent(geom.getExtent().expand(4));
                         map.centerAndZoom(geom, 18);
                       
                       
                    var geom = results.features[i].geometry;
                    //map.setExtent(geom.getExtent().expand(2));
                    var maxZoom = map.getMaxZoom();
                    // center and zoom to point district
     map.centerAndZoom(maxZoom);
                    map.centerAndZoom(geom, 19);
                    map.infoWindow.setFeatures([results.features[i]]);
                    map.infoWindow.setTitle("<img src = smile.gif width='30' height='25'>"+" "+terminal );
                    map.infoWindow.setContent("Lastname:"+name2+"<br/>"+"Firstname:"+name1+"<br/>"+"Identity No:"+Identity+"<br/>"+"Date Posted:"+date+"<br/>"+"Document Type:"+type+"<br/>"+"<img src = pic.jpg width='250' height='100'>");
                    //Show infowindow
     var location = new Point(geom);
     map.infoWindow.set("anchor","left");
                    map.infoWindow.show(location);
     map.graphics.clear();


                    }
                }
                
  }
    else{
      var result="Sorry! No document matched your search";
      //alert(result);
      $('div#data-not-found').text(result);
      $('div#submit-data').text("");
      setTimeout(function(){
        $("#myModal").modal("show");   
      },3000);
      
    }

    
});
}
              
               

            });

            });

            //});

            

    </script>
 
</html>
<?php
unset($data);
?>

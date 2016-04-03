
//////////////////////////////////////////////////////////////////////////////////// init var

var LRDS_GOOGLEMAP_API_KEY = "";
var tableid = "";
var center_x = 48.855011; 
var center_y = 2.346724;
var zoom = 12;
var map_legend_title = "Besoins"; 
var map_legend_nota_bene = ""; 
var action_key="83abec5a494b89095d07e031445de903";
var url_getTypes = "inc_mobile/CRUD_centres/get_all_types.php?action_key="+action_key; // todo action key from global php

//////////////////////////////////////////////////////////////////////////////////// get global var


function Legend(controlDiv, map, types) {


    var legend = '';
    var arrayLength = types.length;
    for (var i = 0; i < arrayLength; i++) {
        var name = types[i][0];
        if(name.length>22){var name = name.substr(0,22)+' ...'; }; //  substring for too long Type Name
        var color = types[i][1].substr(1);
        legend = legend + '<img src="http://www.googlemapsmarkers.com/v1/'+color+'" />&nbsp;'+name+'<br />';
    }

    // Set CSS styles for the DIV containing the control
    // Setting padding to 5 px will offset the control
    // from the edge of the map
    controlDiv.style.padding = '5px';

    // Set CSS for the control border
    var controlUI = document.createElement('DIV');
    controlUI.style.backgroundColor = 'white';
    controlUI.style.borderStyle = 'solid';
    controlUI.style.borderWidth = '1px';
    controlUI.title = 'Legend';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control text
    var controlText = document.createElement('DIV');
    controlText.style.fontFamily = 'Arial,sans-serif';
    controlText.style.fontSize = '12px';
    controlText.style.paddingLeft = '4px';
    controlText.style.paddingRight = '4px';
    
    // Add the text
    // http://www.googlemapsmarkers.com/ for styling icon
    controlText.innerHTML = '<b>'+map_legend_title+'</b><br /><br />' +
    //       '<img src="http://www.googlemapsmarkers.com/v1/009900" />&nbsp;Nuit<br />' +
    legend +
    '<br /><small>'+map_legend_nota_bene+'</small>';
    controlUI.appendChild(controlText);

  }


  function initialize_types(id_type) {

          var id_type = id_type;

          $( "#filters" ).show();

          types = [];
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var response = JSON.parse(xmlhttp.responseText);
                $.each(response,function(object){
                    $.each(response[object],function(values){
                      var tmp = []
                      tmp.push(response[object][values].name);
                      tmp.push(response[object][values].color);
                      types.push(tmp);
                    });
                  })

              initialize(id_type);

              }
          };
          xmlhttp.open("GET", url_getTypes, true);
          xmlhttp.send();

  }


  function initialize(id_type) {

          var id_type = id_type;
          var color='000000';

          //////////////////////////////////////////////////////////////////////////// GET GLOBALS 
          get_Globals();
          //////////////////////////////////////////////////////////////////////////// GET MARKERS INFOS

          var json = (function () { 

              $.ajax({ 
                    type: 'post',
                     url: 'inc_mobile/CRUD_centres/get_all_centres.php',   // todo action key from global php               
                     data: "action_key="+action_key,                                       
                     dataType: 'json',                     
                     success: function(data){     
                      if(data){


                          var locations = [];
                          list = []; 

                          var json_array = JSON.stringify(data);

                          var jsonData = JSON.parse(json_array);
                          for (var i = 0; i < jsonData.centres.length; i++) {

                              list = [];
                              var counter = jsonData.centres[i];

                              if(id_type=="All"){

                                    list.push(counter.name);
                                    list.push(counter.localisation_x);
                                    list.push(counter.localisation_y);



                                    list.push(counter.name_type);
                                    list.push(counter.color_type);
                                    list.push(counter.id_type);
                                    list.push("title");


                                    list.push(counter.comments);

                                    locations.push(list);
                              }

                              else if(id_type==counter.id_type){   

                                    list = [];
                                    var counter = jsonData.centres[i];
                                    list.push(counter.name);
                                    list.push(counter.localisation_x);
                                    list.push(counter.localisation_y);



                                    list.push(counter.name_type);
                                    list.push(counter.color_type);
                                    list.push(counter.id_type);
                                    list.push("title");

                                    list.push(counter.comments);


                                    locations.push(list);
                              }

                          }
                          locations.push(list);

  ////////////////////////////////////////////////////////////////////////// CREATE MAP

    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      zoom: zoom,
      center: new google.maps.LatLng(center_x, center_y),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });


    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  

        if(id_type=="All"){
                                try {color = locations[i][4].substr(1);}catch(err) {color='000000';}
                                if (color) {} else{color='000000';}
                                //alert(isHexaColor(locations[i][4].substr(1)));
                                if((isHexaColor(locations[i][4].substr(1)))==false){
                                  // alert('false'+locations[i][4]);
                                  color='000000';
                                }
        }
        else if(id_type==locations[i][5]){  
                                try {color = locations[i][4].substr(1);}catch(err) {color='000000';}
                                if (color) {} else{color='000000';}
                                //alert(isHexaColor(locations[i][4].substr(1)));
                                if((isHexaColor(locations[i][4].substr(1)))==false){
                                  // alert('false'+locations[i][4]);
                                  color='000000';
                                }
        }

      if (color=="" || color=="undefined" || typeof color === 'undefined' || color.length<6 || color.length>6) {color='000000';} // todo better

      marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map,
          icon: 'http://www.googlemapsmarkers.com/v1/'+color
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
/*          infos = */
          infowindow.setContent(locations[i][7]+'<br>'+locations[i][0]);
/*          infowindow.setContent(locations[i][7]);*/
          infowindow.open(map, marker);
        }
      })(marker, i));
    }


    // Create the legend and display on the map
    var legendDiv = document.createElement('DIV');
    var legend = new Legend(legendDiv, map, types);
    legendDiv.index = 1;
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legendDiv);




    // end if data;
    }else{
          // alert("FALSE");
          console.log("FALSE");
          }   




    // end ajax
    }


  // end json
  });



  // end function     
  })();




// end fct  initialize 
}

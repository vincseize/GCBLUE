function get_Globals() {

  var url = "map_globals.php"; 
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // var response = xmlhttp.responseText;
            var response = JSON.parse(xmlhttp.responseText);
            // console.log(response);
            $.each(response,function(object){
              $.each(response[object],function(values){
                
                var LRDS_GOOGLEMAP_API_KEY = response[object][values].LRDS_GOOGLEMAP_API_KEY;
                var tableid = response[object][values].tableid;
                var center_x = response[object][values].center_x;
                var center_y = response[object][values].center_y;
                var zoom = response[object][values].zoom;
                var map_legend_title = response[object][values].map_legend_title;
                var map_legend_nota_bene = response[object][values].map_legend_nota_bene;
                var action_key = response[object][values].CRUD_ACTION_KEY;
                var url_getTypes = response[object][values].GET_ALL_TB_TYPES_URL;

/*                console.log(LRDS_GOOGLEMAP_API_KEY);
                console.log(tableid);
                console.log(center_x);
                console.log(center_y);
                console.log(zoom);
                console.log(map_legend_title);           
                console.log(map_legend_nota_bene);
                console.log(url_getTypes);*/

              });

            })
        }
  };
  xmlhttp.open("GET", url, true);
  xmlhttp.send()

}

function isHexaColor(sNum){  // todo better // http://jsfiddle.net/tjocn8n3/1/
  return (typeof sNum === "string") && sNum.length === 6 && ! isNaN( parseInt(sNum, 16) );   
}


function rgb2hex(rgb) {
    missing_color="#000000";
    rgb = rgb.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+))?\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    // return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    color = "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
/*    var isHexadecimal  = /^#[0-9A-F]{6}$/i.test('#aabbcc');
    console.log(isHexadecimal);
    if(isHexadecimal==false){color=missing_color;};*/

    return color;
}


function getDocWidth() {
    var D = document;
    return Math.max(
        D.body.scrollWidth, D.documentElement.scrollWidth,
        D.body.offsetWidth, D.documentElement.offsetWidth,
        D.body.clientWidth, D.documentElement.clientWidth
    );
}


function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}


function toggle_type(id){
    $("#"+id).toggle();
    return false;
}


function toggle_type_product(id){
    //alert(id);
    $('#home_container #toggleType_'+id).toggle();
    return false;
}

function load_div(id,content){
    $("#loader").show();
    // $("#container").load("contenu.html #content"); // Astuce ! un élément portant l'id "content" , evite de recup feuille de style 
    $("#"+id).load(content);
    $("#loader").hide();
}

function hide(id){
    $("#"+id).hide();
    //return false;
}

function show(id){
    $("#"+id).hide();
    //return false;
}

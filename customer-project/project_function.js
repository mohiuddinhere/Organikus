


function nameValidation() {
    $("#project_name").blur(function(){
       
        var name = $(this).val();
        if(name==null || name==""){
            $("#name_invalid").empty().append('Name is Not valid!');
            $("#name_invalid").css("color", "red" );
            $("#project_name").css("border", "2px solid #FF0000" );
        }else{
            $("#name_invalid").empty();
            $("#project_name").css("border", "2px solid #008000" );
        }
    });
}

function locationValidation() {
    $("#project_location").blur(function(){
        var location = $(this).val();
        if(location==null || location==""){
            $("#location_invalid").empty().append('Location is Not valid!');
            $("#location_invalid").css("color", "red" );
            $("#project_location").css("border", "2px solid #FF0000" );
        }else{
            $("#location_invalid").empty();
            $("#project_location").css("border", "2px solid #008000" );
        }
    });
}


function siteValidation() {
    $("#sitearea").blur(function(){
        var siteArea = $(this).val();

        if(/^\d*$/.test(siteArea) && siteArea!=""){
            $("#invalid_site").empty();
            $("#sitearea").css("border", "2px solid #008000" );
        }else{
            $("#invalid_site").empty().append('Site Area Not valid!');
            $("#invalid_site").css("color", "red" );
            $("#sitearea").css("border", "2px solid #FF0000" );
        }
    });
}
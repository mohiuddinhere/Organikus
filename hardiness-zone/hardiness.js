
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
        nav.classList.add('bg-dark', 'shadow');
    });

    $("#location").hide();
    $("#zoneOutput").hide();
    $("#recommendedTreeFromZone").hide();
    
    
    $("#mapFrame").css({
        "display": "contents",
        "text-align": "center"
    });
    $("#mapFrameAboutZip").css("text-align", "justify");

    $(document).ready(function(){
        $("#submitZip").click(function(e){

            e.preventDefault();
            var zip = $("#zipcode").val();
            console.log(zip);

            var locationPoint = "";
            var place = "";

            $.ajax({
                url: "zip-location.php",
                    type: "POST",
                    data: {
                        zipcode: zip
                    },
                    dataType: "json",
                    encode: true,
            }).done(function (obj) {
                // console.log(obj.data);
                // console.log(obj.tree_array[0].name);
                if(obj.data == "true"){
                    $("#wrong_zip_alert").empty();
                    $("#zipcode").css("border-bottom", "1px solid #ffffff");
                    $("#mapFrame").hide();
                    $("#location").css("display", "inline-block");
                    $("#zoneOutput").show();
                    $("#recommendedTreeFromZone").show();
                    $("#zoneResult").empty().append(obj.hardiness_zone);

                    
                    $.each(obj.tree_array, function(index, tree_data){
                        console.log(tree_data.name);
                        $("#recommendedTreeFromZone").append("<div class='col-sm-3' id='treeList'><figure class='figure'><h2 id='treeName'>"+tree_data.name+"</h2><img src='../img/pexels-lukas-hartmann-1557652-min.jpg' class='figure-img img-fluid rounded' alt='...'><figcaption class='figure-caption text-center'>"+tree_data.plant_family+"</figcaption></figure></div></div>")
                        if((index+1)%3==0){
                            $("#recommendedTreeFromZone").append("<div class='col-sm-2' id='treeList'></div>");
                        }
                        
                        //$("#treeName").append(value);
                    });

                    locationPoint = obj.locationPoint;
                    place = obj.place;

                    
                    var mapAPILink = "https://api.mapbox.com/styles/v1/mohiuhere/ckzwoh7sz002g15ko32szg4vf.html?title=false&access_token=pk.eyJ1IjoibW9oaXVoZXJlIiwiYSI6ImNrendubm55bTAyM3Mybm5xa2NlaDFyNjgifQ.mUHouLmuKuLilWX3gYrwMg&zoomwheel=true#11/";
                    var mapPosition = mapAPILink.concat(locationPoint);
                    // console.log(mapPosition);
                    // console.log(locationPoint);
                    var map = document.getElementById("location");
                    map.src = mapPosition;
                }else if(obj.data = 'false'){
                    $("#recommendedTreeFromZone").hide();
                    $("#zoneOutput").hide();
                    $("#location").hide();
                    $("#mapFrame").show();
                    $("#wrong_zip_alert").empty().append('Zip is Not valid for Bangladesh!');
                    $("#wrong_zip_alert").css("color", "red" );
                    $("#zipcode").css("border-bottom", "1px solid #FF0000" );
                }

            });

            
        });
    });


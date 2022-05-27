// var nav = document.querySelector('nav');

//       window.addEventListener('scroll', function () {
//         if (window.pageYOffset > 100) {
//           nav.classList.add('bg-dark', 'shadow');
//         } else {
//           nav.classList.remove('bg-dark', 'shadow');
//         }
//       });

      // mapboxgl.accessToken = 'pk.eyJ1IjoibW9oaXVoZXJlIiwiYSI6ImNrendxM2R0NzZ4ZWMydW8xZWZrM3YxMHIifQ.fvbiNmtCdhCib9eD_WSA7w';

      // const map = new mapboxgl.Map({
      //   container: 'map',
      //   style: 'mapbox://styles/mohiuhere/ckzwoh7sz002g15ko32szg4vf',
      //   center: [-96, 37.8],
      //   zoom: 3
      // });

      $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"> <div class="col-4 mt-2"> <label for="site-area" class="form-label">Crop</label> <input type="text" class="form-control"> </div> <div class="col-4 mt-2"> <label for="site-area" class="form-label">Grow System</label> <input type="text" class="form-control"> </div> <div class="col-4 mt-2"> <label for="site-area" class="form-label">Percentage(%)</label> <input type="number" class="form-control"> </div><button class="btn btn-primary remove-btn remove_field">Remove</button></div></div>'); //add input box
          }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
        })
      });
      
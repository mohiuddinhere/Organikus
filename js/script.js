var nav = document.querySelector('nav');

      window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
          nav.classList.add('bg-dark', 'shadow');
        } else {
          nav.classList.remove('bg-dark', 'shadow');
        }
      });

      // mapboxgl.accessToken = 'pk.eyJ1IjoibW9oaXVoZXJlIiwiYSI6ImNrendxM2R0NzZ4ZWMydW8xZWZrM3YxMHIifQ.fvbiNmtCdhCib9eD_WSA7w';

      // const map = new mapboxgl.Map({
      //   container: 'map',
      //   style: 'mapbox://styles/mohiuhere/ckzwoh7sz002g15ko32szg4vf',
      //   center: [-96, 37.8],
      //   zoom: 3
      // });
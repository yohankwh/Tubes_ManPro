function loadLeafletMap(){
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieW9oYW5rd2giLCJhIjoiY2tqcG5tNnozMWF4ZzMxbHlrd3hpNDBpMCJ9.jnNjtsyy9eRlApNpPyCPzQ', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoieW9oYW5rd2giLCJhIjoiY2tqcG5tNnozMWF4ZzMxbHlrd3hpNDBpMCJ9.jnNjtsyy9eRlApNpPyCPzQ'
    }).addTo(mymap);
}

function loadCircleRegion(regionName, data, radiusVal){
  var lat = 37.566953;
  var long = 126.977977;

  switch(regionName) {
    case "Busan":
      lat=35.161832;long=129.063126;
      break;
    case "Chungcheongbuk-do":
      lat=36.729404;long=127.753416;
      break;
    case "Chungcheongnam-do":
      lat=36.508170;long=126.853739;
      break;
    case "Daegu":
      lat=35.855845;long=128.575410;
      break;
    case "Daejeon":
      lat=36.342144;long=127.402718;
      break;
    case "Gangwon-do":
      lat=37.748345;long=128.303611;
      break;
    case "Gwangju":
      lat=35.151100;long=126.878713;
      break;
    case "Gyeonggi-do":
      lat=37.478326;long=127.074532;
      break;
    case "Gyeongsangbuk-do":
      lat=36.345851;long=128.786506;
      break;
    case "Gyeongsangnam-do":
      lat=35.245222;long=128.319787;
      break;
    case "Incheon":
      lat=37.500829;long=126.662811;
      break;
    case "Jeju-do":
      lat=33.488936;long=126.500423;
      break;
    case "Jeollabuk-do":
      lat=35.724013;long=127.113969;
      break;
    case "Jeollanam-do":
      lat=34.891825;long=126.875773;
      break;
    case "Sejong":
      lat=36.480132;long=127.289021;
      break;
    case "Seoul":
      lat=37.554059;long=126.989595;
      break;
    case "Ulsan":
      lat=35.543786;long=129.332447;
    break;
    default:
      
  }

  var colorCode = getColor(data);

  if(radiusVal<0.1){
    radiusVal = 0.8;
  }else if(radiusVal<0.5){
    radiusVal = 0.9;
  }else if(radiusVal>2){
    radiusVal = 3;
  }

  L.circle([lat, long], {
    color: colorCode,
    fillOpacity: 0.5,
    radius: 5000*radiusVal
  }).addTo(mymap);
}


function getColor(val){
  if(val<=50){
    return "#ffc764";
  }else if(val>50 && val<100){
    return "#ffb396";
  }else if(val>101 && val<1000){
    return "#ff8585";
  }else if(val>1001){
    return "#ff4646"
  }
}

var map;

function initialize(){
    var latlng = new google.maps.LatLng(14.1876, 121.12508); //CALAMBA CITY
    var mapOptions = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    /*var calambaCoords = [
        new google.maps.LatLng(14.232854,121.189964),
        new google.maps.LatLng(14.232854,121.189921),
        new google.maps.LatLng(14.237887,121.175673),
        new google.maps.LatLng(14.224909,121.134947),
        new google.maps.LatLng(14.225699,121.133831),
        new google.maps.LatLng(14.228694,121.134217),
        new google.maps.LatLng(14.229942,121.134818),
        new google.maps.LatLng(14.231356,121.133009),
        new google.maps.LatLng(14.231772,121.131206),
        new google.maps.LatLng(14.234601,121.12949),
        new google.maps.LatLng(14.233936,121.122795),
        new google.maps.LatLng(14.235267,121.118246),
        new google.maps.LatLng(14.237097,121.118081),
        new google.maps.LatLng(14.237762,121.11645),
        new google.maps.LatLng(14.236681,121.113275),
        new google.maps.LatLng(14.234767,121.113017),
        new google.maps.LatLng(14.232812,121.109498),
        new google.maps.LatLng(14.228278,121.10038),
        new google.maps.LatLng(14.228736,121.099241),
        new google.maps.LatLng(14.228278,121.095415),
        new google.maps.LatLng(14.226531,121.09387),
        new google.maps.LatLng(14.226781,121.090351),
        new google.maps.LatLng(14.224285,121.088806),
        new google.maps.LatLng(14.223203,121.083914),
        new google.maps.LatLng(14.222371,121.083485),
        new google.maps.LatLng(14.220374,121.080481),
        new google.maps.LatLng(14.218294,121.075674),
        new google.maps.LatLng(14.217545,121.067863),
        new google.maps.LatLng(14.206646,121.053543),
        new google.maps.LatLng(14.20365,121.044933),
        new google.maps.LatLng(14.201237,121.041342),
        new google.maps.LatLng(14.195662,121.036693),
        new google.maps.LatLng(14.174526,121.033359),
        new google.maps.LatLng(14.166787,121.032844),
        new google.maps.LatLng(14.158298,121.030441),
        new google.maps.LatLng(14.153887,121.030956),
        new google.maps.LatLng(14.149809,121.033617),
        new google.maps.LatLng(14.146147,121.038595),
        new google.maps.LatLng(14.146813,121.05044),
        new google.maps.LatLng(14.153305,121.059195),
        new google.maps.LatLng(14.154803,121.072848),
        new google.maps.LatLng(14.152306,121.074307),
        new google.maps.LatLng(14.151307,121.076367),
        new google.maps.LatLng(14.150558,121.082504),
        new google.maps.LatLng(14.144815,121.091559),
        new google.maps.LatLng(14.144815,121.091559),
        new google.maps.LatLng(14.138656,121.103747),
        new google.maps.LatLng(14.138615,121.109155),
        new google.maps.LatLng(14.140446,121.109884),
        new google.maps.LatLng(14.141986,121.114004),
        new google.maps.LatLng(14.1439,121.114133),
        new google.maps.LatLng(14.145689,121.118339),
        new google.maps.LatLng(14.144774,121.122544),
        new google.maps.LatLng(14.144108,121.123445),
        new google.maps.LatLng(14.145023,121.126192),
        new google.maps.LatLng(14.145773,121.127394),
        new google.maps.LatLng(14.147936,121.128467),
        new google.maps.LatLng(14.144815,121.130827),
        new google.maps.LatLng(14.143192,121.131471),
        new google.maps.LatLng(14.142152,121.133445),
        new google.maps.LatLng(14.142485,121.135505),
        new google.maps.LatLng(14.143192,121.136148),
        new google.maps.LatLng(14.144233,121.136106),
        new google.maps.LatLng(14.144899,121.136749),
        new google.maps.LatLng(14.144524,121.14177),
        new google.maps.LatLng(14.1439,121.143101),
        new google.maps.LatLng(14.143733,121.14589),
        new google.maps.LatLng(14.143068,121.147221),
        new google.maps.LatLng(14.142443,121.152285),
        new google.maps.LatLng(14.142818,121.154731),
        new google.maps.LatLng(14.138906,121.171768),
        new google.maps.LatLng(14.142152,121.173914),
        new google.maps.LatLng(14.145315,121.177304),
        new google.maps.LatLng(14.152888,121.182154),
        new google.maps.LatLng(14.163749,121.191037),
        new google.maps.LatLng(14.172404,121.199534),
        new google.maps.LatLng(14.18472,121.201981),
        new google.maps.LatLng(14.183638,121.200479),
        new google.maps.LatLng(14.182015,121.199406),
        new google.maps.LatLng(14.182556,121.198118),
        new google.maps.LatLng(14.18239,121.197603),
        new google.maps.LatLng(14.181766,121.196444),
        new google.maps.LatLng(14.181766,121.194642),
        new google.maps.LatLng(14.183805,121.192925),
        new google.maps.LatLng(14.184678,121.190694),
        new google.maps.LatLng(14.18551,121.189878),
        new google.maps.LatLng(14.1873,121.189278),
        new google.maps.LatLng(14.186925,121.184986),
        new google.maps.LatLng(14.186051,121.182754),
        new google.maps.LatLng(14.186883,121.181639),
        new google.maps.LatLng(14.189629,121.180137),
        new google.maps.LatLng(14.191377,121.180051),
        new google.maps.LatLng(14.197202,121.1849),
        new google.maps.LatLng(14.203234,121.183398),
        new google.maps.LatLng(14.207977,121.183784),
        new google.maps.LatLng(14.211804,121.184857),
        new google.maps.LatLng(14.213843,121.188462),
        new google.maps.LatLng(14.215757,121.190007),
        new google.maps.LatLng(14.225907,121.189063),
        new google.maps.LatLng(14.230067,121.18902),
        new google.maps.LatLng(14.232937,121.19005),

    ];

    // Construct the polygon
    calamba_border = new google.maps.Polygon({
      paths: calambaCoords,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.1
    });

    calamba_border.setMap(map);*/

}

google.maps.event.addDomListener(window, 'load', initialize);

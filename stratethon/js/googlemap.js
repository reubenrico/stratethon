
var map;
var geocoder;

function loadMap() {
        var massachusetts = { lat: 42.4072, lng: -71.3824 };
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: massachusetts,
        });
       
       	var marker = new google.maps.Marker({
       		position: massachusetts,
       		map: map
       	});


  var cdata = document.getElementById('data').innterHTML;
       	console.log(cdata);
    	var cdata = JSON.parse(document.getElementById('data').innerHTML);
    	geocoder = new google.maps.Geocoder();  
    	codeAddress(cdata);
    	
    	var allData = JSON.parse(document.getElementById('allData').innerHTML);
    	showAllSample(allData)


}

    	function showAllSample(allData) {
		var infoWind = new google.maps.InfoWindow;
		Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		strong.textContent = data.NAME;
		content.appendChild(strong);

		var img = document.createElement('img');
		img.src = 'img/img1.jpg';
		img.style.width = '40px';
		content.appendChild(img);

		var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.LAT, data.LON),
	      map: map
	    });

	    marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}
function codeAddress(cdata) {
   		Array.prototype.forEach.call(cdata, function(data){
    	var address = data.NAME + ' ' + data.ADDRESS;
	    geocoder.geocode( { 'address': ADDRESS}, function(results, status) {
	      if (status == 'OK') {
	        map.setCenter(results[0].geometry.location);
	        var points = {};
	        points.id = data.Id;
	        points.lat = map.getCenter().LAT();
	        points.lng = map.getCenter().LON();
	        updateSampleWithLatLng(points);
	      } else {
	        alert('Geocode was not successful for the following reason: ' + status);
	      }
	    });
	});
}

function updateSampleWithLatLng(points) {
	$.ajax({
		url:"action.php",
		method:"post",
		data: points,
		success: function(res) {
			console.log(res)
		}
	})
	
}

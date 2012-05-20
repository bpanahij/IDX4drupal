/*
    This file is part of FoxyIDX.

    Foobar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    FoxyIDX is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

    Author: Brian P Johnson
    Contact: brian@pjohnson.info
*/

function foxy_initialize() {

  var latlng = new google.maps.LatLng(-34.397, 150.644);

  var addressStr = document.getElementById('property').getAttribute('address');
  //var addressStr = "1401 Marshall Lane, Austin, Texas 78703";
  var geoCoder = new google.maps.Geocoder();
  geoCoder.geocode( { 'address': addressStr }, 
      function(results, status) { 
	if (status == google.maps.GeocoderStatus.OK) {

	  var searchLoc = results[0].geometry.location;
	  var lat = results[0].geometry.location.lat();
	  var lng = results[0].geometry.location.lng();
	  var latlng = new google.maps.LatLng(lat, lng);
	  var bounds = results[0].geometry.bounds;

	  var myOptions = {
	    backgroundColor: 0x000000,
	    noClear: true,
	    rotateControl: true,
	    tilt: 0,
	    zoom: 17,
	    center: latlng,
	    scrollwheel: false,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	  var addresses = addressStr.split(',');
	  var imageString = 'http://chart.apis.google.com/chart?chst=d_map_pin_icon_withshadow&chld=home|FF6633|FFFFFF';
	  var image = new google.maps.MarkerImage(imageString);
	  var marker = new google.maps.Marker({
	    position: latlng,
	      map: map,
	      icon: image,
	      title: addressStr,
	      optimized: false
	  });
	}
      }
  );
}

window.onload = function () {
  foxy_initialize();
}

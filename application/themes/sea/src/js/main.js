// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function () {
    $('body').on('click', '.page-scroll a', function (event) {

        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top -50)
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Floating label headings for the contact form
$(function () {
    $("body").on("input propertychange", ".floating-label-form-group", function (e) {
        $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function () {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function () {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-default',
    offset: 75
})

// Closes the Responsive Menu on Menu Item Click on Home Page
$('.home .navbar-collapse ul li a').click(function () {
    $('.navbar-toggle:visible').click();
});

skrollr.init({
    forceHeight: false,
    smoothScrolling: true,
    mobileCheck: function() {
                //hack - forces mobile version to be off
                return false;
            }
});

function map_init() {

    $(".googleMapContainer").show().html('<div id="googlemap" class="google-maps" />');

    maplocation = new google.maps.LatLng(50.79383,0.048482);
    stylers = [{"stylers": [{"saturation": 10 },{"visibility": "on"},{"gamma": 1.51},{"lightness": 1},{"hue": "#7dc1d4"},{"weight": 1.4}]},{
    featureType: "poi.business",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
    ]
  }];

    myOptions = {
        center: maplocation,
        zoom: 15,
        minZoom: 5,
        tilt: 45,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        panControl: false,
        draggable: true,
        streetViewControl: true,
        mapTypeControl: true,
        scaleControl: true,
        zoomControl: true,
        styles: stylers
    };
    map = new google.maps.Map(document.getElementById('googlemap'), myOptions);
    marker = new google.maps.Marker({
        map: map,
        title: 'Sussex Employment Acency',
        position: maplocation,
        zIndex: 10,
        icon: {
            path: 'M0-165c-27.618 0-50 21.966-50 49.054C-50-88.849 0 0 0 0s50-88.849 50-115.946C50-143.034 27.605-165 0-165z',
            fillColor: '#0097DB',
            fillOpacity: 1,
            strokeColor: '#000',
            strokeWeight: 1,
            scale: 1 / 3
        }
    });
}

var map;
if ($(".googleMapContainer").length > 0) {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.async = 1;
    script.src = "//maps.googleapis.com/maps/api/js?callback=map_init";
    document.body.appendChild(script);
}
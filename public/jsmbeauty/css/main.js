(function ( $ ) {
    "use strict";
    $(function () {
        var masterslider_6ae1 = new MasterSlider();
        // slider controls
        masterslider_6ae1.control('arrows' ,{ autohide:true, overVideo:true  }); masterslider_6ae1.control('bullets' ,{ autohide:false, overVideo:true, dir:'h', align:'bottom' , margin:10  });
        masterslider_6ae1.control('scrollbar' ,{ autohide:true, overVideo:true, dir:'h', inset:true, align:'top', color:'#404040' , margin:10  , width:4 });
        // slider setup
        masterslider_6ae1.setup("MS57a42ee226ae1", {
                width           : 2000,
                height          : 1049,
                minHeight       : 0,
                space           : 0,
                start           : 1,
                grabCursor      : true,
                swipe           : true,
                mouse           : true,
                layout          : "fullwidth",
                wheel           : false,
                autoplay        : true,
                instantStartLayers:false,
                loop            : true,
                shuffle         : false,
                preload         : 0,
                heightLimit     : true,
                autoHeight      : false,
                smoothHeight    : true,
                endPause        : false,
                overPause       : false,
                fillMode        : "fill",
                centerControls  : false,
                startOnAppear   : false,
                layersMode      : "center",
                hideLayers      : false,
                fullscreenMargin: 0,
                speed           : 10,
                dir             : "h",
                parallaxMode    : 'swipe',
                view            : "basic"
        });
        window.masterslider_instances = window.masterslider_instances || [];
        window.masterslider_instances.push( masterslider_6ae1 );
     });
})(jQuery);



(function($) {
function doSomething() {
    var height = jQuery('.base-height').height();
    jQuery('#carousel-main-generic .item, #video, #mobile-video').height(height-31);
};
(function() {

    var height = jQuery('.base-height').height();
    jQuery('#carousel-main-generic .item, #video, #mobile-video').height(height-31);
    
    var resizeTimer;
    jQuery(window).resize(function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(doSomething, 500);
    });
})(jQuery);


jQuery(function($) {

    // IE detect
    function iedetect(v) {

        var r = RegExp('msie' + (!isNaN(v) ? ('\\s' + v) : ''), 'i');
        return r.test(navigator.userAgent);

    }
    var resizeTimers;
    var resizeTimers1;

    // For mobile screens, just show an image called 'poster.jpg'. Mobile
    // screens don't support autoplaying videos, or for IE.
    if(screen.width < 800 || iedetect(8) || iedetect(7) || 'ontouchstart' in window) {
    
        (adjSize = function() { // Create function called adjSize
            
            $width = $(window).width(); // Width of the screen
            $height = $('.base-height').height(); // Height of the screen
            
            // Resize image accordingly
            $('#video').css({
                'background-image' : 'url(poster.jpg)', 
                'background-size' : 'cover', 
                'width' : $width+'px', 
                'height' : $height+'px'
            });

            // Hide video
            $('video').hide();
            
        })(); // Run instantly

        // Run on resize too
        $(window).resize(function() {
            clearTimeout(resizeTimers1);
            resizeTimers1 = setTimeout(adjSize, 1500);
        });
    }
    else {
        // Wait until the video meta data has loaded
        $('#video video').on('loadedmetadata', function() {
            var $width, $height, // Width and height of screen
                $vidwidth = this.videoWidth, // Width of video (actual width)
                $vidheight = this.videoHeight, // Height of video (actual height)
                $aspectRatio = $vidwidth / $vidheight; // The ratio the video's height and width are in

            (adjSize = function() { // Create function called adjSize			
                $width = $(window).width(); // Width of the screen
                $height = $('.base-height').height(); // Height of the screen
                            
                $boxRatio = $width / $height; // The ratio the screen is in
                            
                $adjRatio = $aspectRatio / $boxRatio; // The ratio of the video divided by the screen size
                            
                // Set the container to be the width and height of the screen
                $('#video').css({'width' : $width+'px', 'height' : $height+'px'}); 
                            
                if($boxRatio < $aspectRatio) { // If the screen ratio is less than the aspect ratio..
                    // Set the width of the video to the screen size multiplied by $adjRatio
                    $vid = $('#video video').css({'width' : $width*$adjRatio+'px'}); 
                } else {
                    // Else just set the video to the width of the screen/container
                    $vid = $('#video video').css({'width' : $width+'px'});
                }

            })(); // Run function immediately

            // Run function also on window resize.

            $(window).resize(function() {
                clearTimeout(resizeTimers);
                resizeTimers = setTimeout(adjSize, 1500);
            });

        });
    }

})
})(jQuery);

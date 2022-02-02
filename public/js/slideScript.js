ap_list_functions.push(function() {

    jQuery(".iview-group-61dfa1051df71-29").iView({
        // COMMON
        pauseTime: 9000, // delay
        startSlide: 0,
        autoAdvance: 1, // enable timer thá»�i gian auto next slide
        pauseOnHover: 1,
        randomStart: 0, // Ramdom slide when start

        // TIMER
        timer: "360Bar",
        timerPosition: "top-right", // Top-right, top left ....
        timerX: 10,
        timerY: 10,
        timerOpacity: 0.5,
        timerBg: "#000",
        timerColor: "#EEE",
        timerDiameter: 30,
        timerPadding: 4,
        timerStroke: 3,
        timerBarStroke: 1,
        timerBarStrokeColor: "#EEE",
        timerBarStrokeStyle: "solid",
        playLabel: "Play",
        pauseLabel: "Pause",
        closeLabel: "Close", // Muli language

        // NAVIGATOR controlNav
        controlNav: 1, // true : enable navigate - default:'false'
        keyboardNav: 1, // true : enable keybroad
        controlNavThumbs: 0, // true show thumbnail, false show number ( bullet )
        controlNavTooltip: 0, // true : hover to bullet show thumnail
        tooltipX: 5,
        tooltipY: -5,
        controlNavHoverOpacity: 0.6, // opacity navigator

        // DIRECTION
        controlNavNextPrev: false, // false dont show direction at navigator
        directionNav: 1, // true  show direction at image ( in this case : enable direction )
        directionNavHoverOpacity: 0.6, // direction opacity at image
        nextLabel: "Next", // Muli language
        previousLabel: "Previous", // Muli language

        // ANIMATION 
        fx: 'random', // Animation
        animationSpeed: 500, // time to change slide
        //		strips: 20,
        strips: 1, // set value is 1 -> fix animation full background
        blockCols: 10, // number of columns
        blockRows: 5, // number of rows

        captionSpeed: 500, // speed to show caption
        captionOpacity: 1, // caption opacity
        captionEasing: 'easeInOutSine', // caption transition easing effect, use JQuery Easings effect
        customWidth: 1920,
        customHtmlBullet: false,
        rtl: false,
        height: 500,
        timer_show: 3,

        //onBeforeChange: function(){}, // Triggers before a slide transition
        //onAfterChange: function(){}, // Triggers after a slide transition
        //onSlideshowEnd: function(){}, // Triggers after all slides have been shown
        //onLastSlide: function(){}, // Triggers when last slide is shown
        //onPause: function(){}, // Triggers when slider has paused
        //onPlay: function(){} // Triggers when slider has played

        onAfterLoad: function() {
            // THUMBNAIL

            // BULLET

            // Display timer
        },

    });

    $(".img_disable_drag").bind('dragstart', function() {
        return false;
    });


    // Fix : Slide link, image cant swipe
    // step 1
    var link_event = 'click';

    // step 3
    $(".iview-group-61dfa1051df71-29 .slide_config").on("click", function() {

        if (link_event !== 'click') {
            link_event = 'click';
            return;
        }

        if ($(this).data('link') != undefined && $(this).data('link') != '') {
            window.open($(this).data('link'), $(this).data('target'));
        }

    });

    // step 2
    $(".iview-group-61dfa1051df71-29 .slide_config").on('swipe', function() {
        link_event = 'swiped'; // do not click event
    });
});
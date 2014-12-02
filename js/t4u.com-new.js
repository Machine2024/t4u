(function($) {
    $.fn.animateNumbers = function(stop, commas, duration, ease) {
        return this.each(function() {
            var $this = $(this);
            var start = parseInt($this.text().replace(/,/g, ""));
			commas = (commas === undefined) ? true : commas;
            $({value: start}).animate({value: stop}, {
            	duration: duration == undefined ? 1000 : duration,
            	easing: ease == undefined ? "swing" : ease,
            	step: function() {
            		$this.text(Math.floor(this.value));
					if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
            	},
            	complete: function() {
            	   if (parseInt($this.text()) !== stop) {
            	       $this.text(stop);
					   if (commas) { $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")); }
            	   }
            	}
            });
        });
    };
	
	
	
	$( ".btntoslide, .menu-item-120 > a" ).click(function() {
  
  
  if($(".btn-bg").text() == ">"){
	  $(".milestone").animate({
    marginLeft: '80%'
}, 500);

$(".btn-bg").text('<');
$(".changeBtn").html('<div class="faaliyet" style="padding-top:10px">Faaliyetler</div>');

$(".count1").animateNumbers(12, false, 1200, "linear");
$(".count2").animateNumbers(100, false, 1200, "linear");
$(".count3").animateNumbers(2200, false, 1200, "linear");
		
		}


});
	
	var target = $(".milestoness").offset().top;
var interval = setInterval(function() {
    if ($(window).scrollTop() >= target-350 && $(window).width() < 768) {
        $(".count1").animateNumbers(12, false, 300, "linear");
$(".count2").animateNumbers(100, false, 400, "linear");
$(".count3").animateNumbers(2200, false, 500, "linear");
    }
}, 250);

$('#aboutVid').on('hidden.bs.modal', function (e) {
    var $iFrame = $('#aboutVid iframe');
    $('#aboutVid iframe').removeAttr('src');
});

$('#aboutVid').on('shown.bs.modal', function (e) {
    var src = '//www.youtube.com/embed/tsyxRBkmPk4';
    var $iFrame = $('#aboutVid iframe');
    $iFrame.attr('src', src);
});




$(window).scroll(function() {
    if ($(window).scrollTop() > 100) {
        $('#stickyNav').show('slow');
    }
    else {
        $('#stickyNav').hide('fast');
    }
});


})(jQuery);

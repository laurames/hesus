/* Javascript document */

$(function() {
            	/* We'll have to change event into click 
                $('#accordion > li').hover(
                    function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'580px'},500);
                        $('.heading',$this).stop(true,true).fadeOut();
                        $('.bgDescription',$this).stop(true,true).slideDown(500);
                        $('.description',$this).stop(true,true).fadeIn();
                    },
                    function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'215px'},1000);
                        $('.heading',$this).stop(true,true).fadeIn();
                        $('.description',$this).stop(true,true).fadeOut(500);
                        $('.bgDescription',$this).stop(true,true).slideUp(700);
                    }
                ); */

                $('#accordion > li').on({
                    mousedown: function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'580px'},500);
                        $('.heading',$this).stop(true,true).fadeOut();
                        $('.bgDescription',$this).stop(true,true).slideDown(500);
                        $('.description',$this).stop(true,true).fadeIn();
                    },
                    mouseup: function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'215px'},1000);
                        $('.heading',$this).stop(true,true).fadeIn();
                        $('.description',$this).stop(true,true).fadeOut(500);
                        $('.bgDescription',$this).stop(true,true).slideUp(700);
                    }
                });

           		$('li:contains("vegetable")').last().css('background-image', 'url(img/vegetables.jpg)');
           		$('li:contains("bread")').first().css('background-image', 'url(img/bread.jpg)');
           		$('li:contains("rice")').first().css('background-image', 'url(img/rice.jpg)');

           		$('li:contains("mushroom")').first().css('background-image', 'url(img/mushrooms.jpg)');
           		$('li:contains("sausage")').first().css('background-image', 'url(img/sausages.jpg)');
           		$('li:contains("chicken")').first().css('background-image', 'url(img/chicken.jpg)');
});
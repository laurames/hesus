/* Javascript document */
$(function() {
                $('#accordion > li').hammer().on({
                    touch: function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'580px'},500);
                        $('.heading',$this).stop(true,true).fadeOut();
                        $('.bgDescription',$this).stop(true,true).slideDown(500);
                        $('.description',$this).stop(true,true).fadeIn();
                    },
                    release: function () {
                        var $this = $(this);
                        $this.stop().animate({'width':'215px'},1000);
                        $('.heading',$this).stop(true,true).fadeIn();
                        $('.description',$this).stop(true,true).fadeOut(500);
                        $('.bgDescription',$this).stop(true,true).slideUp(700);
                    }
                });

                //The most common
           		$('li:contains("Bread")').css('background-image', 'url(../img_food/bread.jpg)');
                $('li:contains("vegetable")').css('background-image', 'url(../img_food/vegetables.jpg)');
           		
                $('li:contains("rice")').first().css('background-image', 'url(../img_food/rice.jpg)');
           		$('li:contains("boiled potatoes")').first().css('background-image', 'url(../img_food/boiledpotatoes.jpg)');

           		$('li:contains("mushroom")').first().css('background-image', 'url(../img_food/mushrooms.jpg)');
           		$('li:contains("sausage")').first().css('background-image', 'url(../img_food/sausages.jpg)');
                $('li:contains("chicken")').first().css('background-image', 'url(../img_food/chicken.jpg)');
                $('li:contains("beef")').first().css('background-image', 'url(../img_food/beef.jpg)');
                
                $('li:contains("lentil")').first().css('background-image', 'url(../img_food/lentilssoup.jpg)');
                $('li:contains("fish")').first().css('background-image', 'url(../img_food/whitefish.jpg)');
                $('li:contains("Tuna fish and tomato pizza")').first().css('background-image', 'url(../img_food/tunapizza.jpg)');
                $('li:contains("ham salad")').first().css('background-image', 'url(../img_food/hamsalad.jpg)');
                $('li:contains("cauliflower")').first().css('background-image', 'url(../img_food/coliflower.jpg)');
                
                $('li:contains("chickpea and cauliflower patties")').first().css('background-image', 'url(../img_food/patties.jpg)');
                $('li:contains("Soy and bean burritos")').first().css('background-image', 'url(../img_food/soyaburritos.jpg)');
});
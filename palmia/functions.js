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
           		$('li:contains("Bread")').css('background-image', 'url(img/bread.jpg)');
                $('li:contains("vegetable")').css('background-image', 'url(img/vegetables.jpg)');
           		
                $('li:contains("rice")').first().css('background-image', 'url(img/rice.jpg)');
           		$('li:contains("boiled potatoes")').first().css('background-image', 'url(img/boiledpotatoes.jpg)');

           		$('li:contains("mushroom")').first().css('background-image', 'url(img/mushrooms.jpg)');
           		$('li:contains("sausage")').first().css('background-image', 'url(img/sausages.jpg)');
                $('li:contains("chicken")').first().css('background-image', 'url(img/chicken.jpg)');
                $('li:contains("beef")').first().css('background-image', 'url(img/beef.jpg)');
                
                $('li:contains("lentil")').first().css('background-image', 'url(img/lentilssoup.jpg)');
                $('li:contains("fish")').first().css('background-image', 'url(img/whitefish.jpg)');
                $('li:contains("Tuna fish and tomato pizza")').first().css('background-image', 'url(img/tunapizza.jpg)');
                $('li:contains("ham salad")').first().css('background-image', 'url(img/hamsalad.jpg)');
                $('li:contains("cauliflower")').first().css('background-image', 'url(img/coliflower.jpg)');
                
                $('li:contains("chickpea and cauliflower patties")').first().css('background-image', 'url(img/patties.jpg)');
                $('li:contains("Soy and bean burritos")').first().css('background-image', 'url(img/soyaburritos.jpg)');


                /*           		
                var strL = $('li:contains("L")').text(); //extract content of paragraph and store
                var strM = $('li:contains("M")').text(); //extract content of paragraph and store
                var strG = $('li:contains("G")').text(); //extract content of paragraph and store

                for(var i=-1, l=strL.length; i<l; i=i+3) { //loop - increment by 3 for 3rd character
                    if(strL.charAt(i)!="") // if its not an empty string
                        console.log(strL.charAt(i))    // log it!
                }

                var nthChar = 3;
                var textL = $('li:contains("L")').html();
                var posL = textL.indexOf('L'); //stores an int
                var onlyL = textL.substr(posL, 1);
                textL = onlyL.text();
                varL = textL.wrap("<span></span>");
                $('pre').append(onlyL + varL.toString());
                if (textL.indexOf('L') > 0) {
                   //var temp = textL.indexOf('L').wrap("<span></span>");
                   //alert(temp);
                   //$().html(text.substr(0, nthChar-1) + "<span class='myClass'>" + 
                     //   text.substr(nthChar -1, 1) + "</span>" + text.substr(nthChar) );
                };*/
});
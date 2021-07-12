$('.rt-portfolio-box.element-eightteen').masonry({
        itemSelector: '.rt-portfolio-box-item',
        columnWidth: 360,
        gutter: 10
    });


    $('.rt-portfolio-box-item').each(function(i){
        setTimeout(function(){
          $('.rt-portfolio-box-item').eq(i).addClass('is-visible');
        }, 200 * i);
    });
//Sliders
const left_btn = $('.arrowleft'),
      right_btn = $('.arrowright'),
      sliders = document.querySelectorAll('.images_sliders'),
      dots = document.querySelectorAll('.schetchiks');

let indexnext=2, indexprev=0;//n and x

const SlidesActive = (n,p) =>{
    for(slide of sliders){
        slide.classList.remove('active');
    }
        //console.log('n => '+n+' p = '+p);
        sliders[n].classList.add('active');
        sliders[n-1].classList.add('active');
        sliders[p].classList.add('active');
    
}
const dotsActive = (n) =>{
    for(dot of dots){
        dot.classList.remove('active');
    }
        //console.log('n => '+n+' p = '+p);
        dots[n].classList.add('active');
    
}
const nextSliders = () => {
    if(indexnext == sliders.length - 1){
        indexnext = 2;indexprev = 0;
        SlidesActive(indexnext,indexprev);
        dotsActive(indexprev);
    }else{
        indexnext++;
        indexprev++;
        SlidesActive(indexnext,indexprev);
        dotsActive(indexprev);
    }
}
const prevSliders = () => {
    if(indexprev == 0){
        indexnext = sliders.length - 1;
        indexprev = 1;
        SlidesActive(indexnext,indexprev);
        dotsActive(indexprev);
    }else{
        indexnext--;
        indexprev--;
        SlidesActive(indexnext,indexprev);
        dotsActive(indexprev);
    }
}
left_btn.on('click', nextSliders);
right_btn.on('click', prevSliders);
$(document).ready(function(){
    let inde = 0;
    $(".container").click(function(){
      $(".stick").toggleClass(function (){
        return $(this).is('.open, .close') ? 'open close' : 'open';
      });
      $(".menu_sits").toggleClass(function (){
        return $(this).is('.open, .close') ? 'open close' : 'open';
      });
      if(inde == 0){
        $('body').css('overflow','hidden');inde=1;
        $('.menu_sits').append('<div class="bacground-menu-mob"></div>');
      }else{
        $('body').css('overflow','auto');inde=0;$('.bacground-menu-mob').remove();
      }
    });
});
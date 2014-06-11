/**
 * Created by Ken on 05/06/14.
 */
$(document).ready(function()
{
    //ajoute le lien dans le body
    $('body').append('<a href="#top" style="color: #f7f7f7;font-size: 18px;font-weight: bolder;" class="top_link" title="Revenir en haut de page">Top</a>');

    //CSS avec display none au départ
    $('.top_link').css({
        'position'				:	'fixed',
        'right'					:	'20px',
        'bottom'				:	'50px',
        'display'				:	'none',
        'padding'				:	'20px',
        'background'			:	'rgb(0, 51, 102)',
        'border-top-left-radius':   '40px',
        'border-top-right-radius':  '40px',
        'border-bottom-left-radius': '40px',
        'opacity'				:	'0.9',
        'z-index'				:	'2000'
    });

    //permet de faire apparaitre le lien au bout de 1550
    $(window).scroll(function()
    {
        posScroll = $(document).scrollTop();
        //console.log(posScroll);
        if(posScroll >=1550)
            $('.top_link').fadeIn(600);
        else
            $('.top_link').fadeOut(600);
    });

    //Animation
    $('a[href=#top]').click(function()
    {
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});
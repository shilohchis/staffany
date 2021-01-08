/**
 * LUNA - Responsive Admin Theme
 *
 */

$(document).ready(function () {
    // Handle minimalize left menu
    $('.left-nav-toggle a').on('click', function(event){
        event.preventDefault();
        $("body").toggleClass("nav-toggle");
    });


    // Hide all open sub nav menu list
    $('.nav-second').on('show.bs.collapse', function () {
        $('.nav-second.in').collapse('hide');
    });

    // Handle collapse sidebar
    $('.sub-nav-icon').parent().on('click', function() {
        const el = $(this);
        //collapse all submenu
        $('.nav-second').each(function() {
            $(this).collapse('hide');
            $(this).parent().find('i').removeClass("pe-7s-angle-right").addClass("pe-7s-angle-down");
        });
        //change icon
        $(el).find('i.pe').toggleClass("pe-7s-angle-down pe-7s-angle-right");
        //expand the choosen menu
        $(el).next().collapse('show');
    });

    // Handle panel toggle
    $('.panel-toggle').on('click', function(event){
        event.preventDefault();
        var hpanel = $(event.target).closest('div.panel');
        var icon = $(event.target).closest('i');
        var body = hpanel.find('div.panel-body');
        var footer = hpanel.find('div.panel-footer');
        body.slideToggle(300);
        footer.slideToggle(200);

        // Toggle icon from up to down
        icon.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        hpanel.toggleClass('').toggleClass('panel-collapse');
        setTimeout(function () {
            hpanel.resize();
            hpanel.find('[id^=map-]').resize();
        }, 50);
    });

    // Handle panel close
    $('.panel-close').on('click', function(event){
        event.preventDefault();
        var hpanel = $(event.target).closest('div.panel');
        hpanel.remove();
    });
});

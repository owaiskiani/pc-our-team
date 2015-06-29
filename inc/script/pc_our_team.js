/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {


    var member_height = $('#pc_our_team.grid_circles .pc_team_member').width();
    $('#pc_our_team.grid_circles .pc_team_member').each(function () {
        $(this).css({
            height: member_height
        });
    });

    var member_height = $('#pc_our_team.grid_circles2 .pc_team_member').width();
    $('#pc_our_team.grid_circles2 .pc_team_member').each(function () {
        $(this).css({
            height: member_height
        });
    });

    $(document).on('click', '.pc_our_team_loghtbox_close', function (event) {
        if ($('#pc_our_team_lightbox').hasClass('show')) {
            $('.pc_our_team_lightbox').slideUp(300, function () {
                $('#pc_our_team_lightbox').fadeOut(300);
            });
            $('#pc_our_team_lightbox').removeClass('show');
        }
    });

    $('.pc_team_single_popup').click(function (e) {
        var item = null;
        if ($(this).hasClass('pc_team_member')) {
            item = $(this);
        } else {
            item = $(this).parents('.pc_team_member');
        }

        build_popup(item);
        e.stopPropagation();
        e.preventDefault();


    });

    function build_popup(item) {
        $('.pc_our_team_lightbox .name').html($('.pc_team_member_name a', item).html());
        $('.pc_our_team_lightbox .skills').html($('.pc_team_skills', item).html());
        $('.pc_our_team_lightbox .sc-content').html($('.pc_team_content', item).html());
        $('.pc_our_team_lightbox .social').html($('.icons', item).html());
        $('.pc_our_team_lightbox .title').html($('.pc_team_member_jobtitle', item).html());
        $('.pc_our_team_lightbox .image').attr('src', $('.wp-post-image', item).attr('src'));
        $('.pc_our_team_lightbox img').css('display', 'block');

        $('#pc_our_team_lightbox').fadeIn(350, function () {
            $('.pc_our_team_lightbox').slideDown(350, function () {
                $('#pc_our_team_lightbox').addClass('show');
            });
        });

    }

    $('#pc_our_team .pc_team_member').hover(function () {
        $('.pc_team_member_overlay', this).stop(true, false).fadeIn(440);
        $('.wp-post-image', this).addClass('zoomIn');
        $('.pc_team_more', this).addClass('show');

    }, function () {
        $('.pc_team_member_overlay', this).stop(true, false).fadeOut(440);
        $('.wp-post-image', this).removeClass('zoomIn');
        $('.pc_team_more', this).removeClass('show');

    });

    /**
     * Pager Js
     */
    $('.team-item').click(function () {
        $('.team-content').hide();
        var team_id = $(this).attr('data-team');

        $('.team-item').removeClass('current');
        $('.team-content').removeClass('current');

        $(this).addClass('current');
        $("#team" + team_id).addClass('current');
        $("#team" + team_id).show();
    });

    // go to team item for mobile
    $(function () {
        $('.touch .team-item').click(function () {
            var target = $('.team-item-holder');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;

            }
        });
    });

    /**
     * Round Js
     */
    window.addEventListener('load', function () {
        setTimeout(function () {
            $("#content_our_team").roundabout({
                btnNext: ".next_team",
                btnPrev: ".prev_team",
                responsive: true
            });
        }, false);
    });

});
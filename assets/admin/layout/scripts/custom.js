$(document).ready(function() {
    var selectHeight = $('#language').height();
    var topBarHeight = $('.top-bar').height();
    var selectTopMargin = (topBarHeight - selectHeight) / 2;
    $('#language').attr('margin-top', selectTopMargin);

    if ('<?=$app_file?>' == 'index.php') {
        $('.dropdown').removeClass('active');
    };
    
    $('.dropdown').addClass(function() {
        if ($(this).find('li').hasClass('active')) {
                $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        };
    });

    $('.dropdown').hover(function() {
        $(this).find('.dropdown-menu').show(300);
        $(this).addClass('active');
        $(this).find('.dropdown-menu').hover(function() {
            $(this).addClass('active');
        }, function() {
            if ($(this).find('li').hasClass('active')) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            };
        });
    }, function() {
        $(this).find('.dropdown-menu').hide(300);
        if ($(this).find('li').hasClass('active')) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });

    /*
    $('form-horizontal').css(function() {
        $(this).find(".form-group:even").css("background-color", "blue");
    });
    */

    $('.AdmLoginBtn').click(function() {
        $('.MyForm').attr('method', 'post');
        $('.MyForm').attr('action', 'adm_check_ok.php');
        $('.MyForm').submit();
    });

    $('.adm-page-login').click(function() {
        $('.MyForm').attr('method', 'post');
        $('.MyForm').attr('action', 'adm_login.php');
        $('.MyForm').submit();
    });

    $('.Side-Menu-Search-Btn').click(function() {
        $('.MyForm').attr('method', 'post');
        $('.MyForm').attr('action', 'page.search.php');
        $('.MyForm').submit();
    });

    $('.adm-login-page-btn').click(function() {
        $('.MyForm').attr('method', 'post');
        $('.MyForm').attr('action', 'adm_check_ok.php');
        $('.MyForm').submit();
    });
});
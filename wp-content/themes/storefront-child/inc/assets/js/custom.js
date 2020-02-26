jQuery(function ($) {
    const $page = $('html, body');
    $('a[href*="#"]').on('click', function () {
        let blockId = $.attr(this, 'href').slice(1)
        $('.checkbox-toggle').trigger('click')
        $page.animate({
            scrollTop: $(`${blockId}`).offset().top - 50
        }, 1500);
        return false;
    });

    $('.checkbox-toggle').on('change', function () {
        if ($('.checkbox-toggle').is(':checked')) {
            $('body').addClass('overflow-hidden');
        } else {
            $('body').removeClass('overflow-hidden');
        }
    });

    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    $(window).scroll(function () {
        let footer = $('footer');
        let top = footer.offset().top - footer.outerHeight() - 2 * $('.oferta').height() - $('header').height();
        let scroll = $(window).scrollTop();
        if (scroll >= top) {
            $('.oferta').addClass('stop-fixed').css('bottom', footer.outerHeight());
        } else {
            $('.oferta').removeClass('stop-fixed').css('bottom', 0);
        }
    });

    $('#closeOferta').on('click', function () {
        $('.oferta').addClass('d-none');
        setCookie('oferta', 'hide', 10)
    })
});

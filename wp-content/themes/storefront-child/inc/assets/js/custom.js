jQuery(function ($) {
    const $page = $('html, body');
    $('a[href*="#"]').on('click', function () {
        let blockId = $.attr(this, 'href').slice(1)
        $page.animate({
            scrollTop: $(`${blockId}`).offset().top - 50
        }, 1000);
        return false;
    });
});

jQuery(function ($) {
    const $page = $('html, body');
    $('a[href*="#"]').click(function () {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 50
        }, 1000);
        return false;
    });
});

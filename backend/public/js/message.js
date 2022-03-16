$(window).on('load', () => {
    setTimeout(() => {
        $('.message').fadeOut();
    }, 3000);
    $('.message').on('click', (e) => {
        $(e.currentTarget).fadeOut();
    });
});

$(document).ready(function() {
    $('.footer-choose-item').click(function() {
        var lang = $(this).text();
        console.log(lang);
        $.ajax({
            url: '/set_lang',
            type: 'GET',
            dataType: 'JSON',
            data: {
                language: lang,
            },
            success: function(answer) {
                window.location.reload();
            },
            error: function(answer) {
                window.location.reload();
            }
        })
    });
});

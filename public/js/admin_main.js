$(document).ready(function () {
    console.log('test');

    var menu_group = $('.menu_table').sortable({
        containerSelector: 'table',
        itemPath: '> tbody',
        itemSelector: 'tr',
        placeholder: '<tr class="placeholder"/>',
        group: 'menu_table',
        onDrop: function($item, container, _super) {
            var data = menu_group.sortable("serialize").get();
            var jsonString = JSON.stringify(data[0], null, ' ');
            $('#before-load').css('display', 'block');
            $('#before-load').find('i').fadeIn();
            $.ajax({
                url: '/api/update_menus_order',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    items: data[0],
                },
                success: function(answer) {
                    console.log(answer);
                    $('#before-load').find('i').fadeOut().end().fadeOut('slow');
                },
                error: function(answer) {
                    console.log(answer);
                    $('#before-load').find('i').fadeOut().end().fadeOut('slow');
                }
            });
            console.log(data);
            _super($item, container);
        }
    });

    var slide_group = $('.slide_table').sortable({
        containerSelector: 'table',
        itemPath: '> tbody',
        itemSelector: 'tr',
        placeholder: '<tr class="placeholder"/>',
        group: 'slide_table',
        onDrop: function($item, container, _super) {
            var data = slide_group.sortable("serialize").get();
            var jsonString = JSON.stringify(data[0], null, ' ');
            $('#before-load').css('display', 'block');
            $('#before-load').find('i').fadeIn();
            $.ajax({
                url: '/api/update_slide_order',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    items: data[0],
                },
                success: function(answer) {
                    console.log(answer);
                    $('#before-load').find('i').fadeOut().end().fadeOut('slow');
                },
                error: function(answer) {
                    console.log(answer);
                    $('#before-load').find('i').fadeOut().end().fadeOut('slow');
                }
            });
            console.log(data);
            _super($item, container);
        }
    });
});

(function( $ ) {
    'use strict';
    
    // Show/hide settings for post format when choose post format
    var $format = $('#post-formats-select').find('input.post-format'),
        $formatBox = $('#format_detail');

    $format.on('change', function () {
        var type = $(this).filter(':checked').val();
        postFormatSettings(type);
    });
    $format.filter(':checked').trigger('change');

    $(document.body).on('change', '.editor-post-format .components-select-control__input', function () {
        var type = $(this).val();
        postFormatSettings(type);
    });

    $(window).on('load',function () {
        var $el = $(document.body).find('.editor-post-format .components-select-control__input'),
            type = $el.val();
        postFormatSettings(type);
    });

    function postFormatSettings(type) {
        $formatBox.hide();
        if ($formatBox.find('.rwmb-field').hasClass(type)) {
            $formatBox.show();
        }

        $formatBox.find('.rwmb-field').slideUp();
        $formatBox.find('.' + type).slideDown();
    }

})(jQuery);

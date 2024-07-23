jQuery(document).ready(function($){
    function add_image(obj) {
        var parent = $(obj).closest('div.field_row');
        var inputField = parent.find("input.meta_image_url");

        var custom_uploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            inputField.val(attachment.url);
            parent.find("div.image_wrap").html('<img src="' + attachment.url + '" height="48" width="48" />');
        }).open();
    }

    function remove_field(obj) {
        $(obj).closest('div.field_row').remove();
    }

    function add_field_row() {
        var row = $('#master-row').html();
        $('#field_wrap').append(row);
    }

    window.add_image = add_image;
    window.remove_field = remove_field;
    window.add_field_row = add_field_row;
});

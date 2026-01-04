jQuery(document).ready(function($) {
    // Image Preview
    $('#dropzone-file').on('change', function() {
        var files = this.files;
        $('#image-preview-container').empty();
        if (files.length > 5) {
            alert("Max 5 images allowed");
            this.value = '';
            return;
        }
        $.each(files, function(i, file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview-container').append('<img src="' + e.target.result + '" class="preview-img">');
            }
            reader.readAsDataURL(file);
        });
    });

    // AJAX Submit
    $('#property-listing-form').on('submit', function(e) {
        e.preventDefault();
        var $btn = $('#submit-btn');
        var $msg = $('#form-message');
        var formData = new FormData(this);
        formData.append('action', 'submit_property_listing'); // Must match PHP action

        $btn.prop('disabled', true).text('Processing...');
        $msg.text('');

        // Use dashboardData.ajax_url sourced from wp_localize_script
        var ajaxUrl = (typeof dashboardData !== 'undefined') ? dashboardData.ajax_url : '/wp-admin/admin-ajax.php';

        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                if (res.success) {
                    $msg.css('color', 'green').text(res.data.message);
                    $('#property-listing-form')[0].reset();
                    $('#image-preview-container').empty();
                } else {
                    $msg.css('color', 'red').text(res.data.message);
                }
            },
            error: function() {
                $msg.css('color', 'red').text('Server Error');
            },
            complete: function() {
                $btn.prop('disabled', false).text('Submit Listing');
            }
        });
    });
});

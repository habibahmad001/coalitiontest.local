jQuery(document).ready(function($) {
    $('.addAttachmentClass').change(function() {
            var phone = $("#phone").val(); 
            var address = $("#address").val(); 
            var fax = $("#fax").val(); 
            var fblink = $("#fblink").val(); 
            var twittwrlink = $("#twittwrlink").val(); 
            var pintlink = $("#pintlink").val(); 
            var linkdinlink = $("#linkdinlink").val(); 
            var fileInput = $("#logo")[0]; 
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('phone', phone);
            formData.append('address', address);
            formData.append('fax', fax);
            formData.append('fblink', fblink);
            formData.append('twittwrlink', twittwrlink);
            formData.append('pintlink', pintlink);
            formData.append('linkdinlink', linkdinlink);
            formData.append('file', file);

            var data_to_send = {
                'action': 'my_ajax_handler', 
                'phone': phone,
                'address': address,
                'fax': fax,
                'fblink': fblink,
                'twittwrlink': twittwrlink,
                'pintlink': pintlink,
                'linkdinlink': linkdinlink,
                'file': file 
            };

        // Make the AJAX call
        $.ajax({
            url: ajaxurl, // URL to admin-ajax.php
            type: 'post',
            data: data_to_send,
            success: function(response) {
                // Handle the response
                alert('Response from server: ' + response);
            }
        });
    });
});



$(document).on("change", ".addAttachmentClass1", function (e) {
    var phone = $("#phone").val(); 
    var address = $("#address").val(); 
    var fax = $("#fax").val(); 
    var fblink = $("#fblink").val(); 
    var twittwrlink = $("#twittwrlink").val(); 
    var pintlink = $("#pintlink").val(); 
    var linkdinlink = $("#linkdinlink").val(); 
    var fileInput = $("#logo")[0]; 
    var file = fileInput.files[0];
    var formData = new FormData();
    formData.append('phone', phone);
    formData.append('address', address);
    formData.append('fax', fax);
    formData.append('fblink', fblink);
    formData.append('twittwrlink', twittwrlink);
    formData.append('pintlink', pintlink);
    formData.append('linkdinlink', linkdinlink);
    formData.append('file', file);

    var data_to_send = {
        'action': 'my_ajax_handler', 
        'formData': formData 
    };


    $.ajax({
            // url: "/uploadattachment",
            url: "admin-ajax.php",
            type: 'POST',
            data: data_to_send,
            processData: false,
            contentType: false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('#progress').html('Upload Progress: ' + percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (response) {
                alert(response);             
            },
            error: function () {
                removeSpinner();
                $('#response').html('An error occurred during upload');
            }
        });
});


$(document).on("change", ".addAttachmentClass2", function (e) {
 
    var fileInput = $("#logo")[0]; 
    var file = fileInput.files[0];


    var data_to_send = {
        'action': 'my_ajax_handler', 
        'file': file
    };

    $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: data_to_send,
            processData: false,
            contentType: false,
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('#progress').html('Upload Progress: ' + percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (response) {
                alert(response);             
            },
            error: function () {
                $('#response').html('An error occurred during upload');
            }
        });
});
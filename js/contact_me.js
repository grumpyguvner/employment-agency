$(function() {


    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$(function() {
    $("input,textarea").not("[type=submit]").jqBootstrapValidation();
    
    var options = { 
        type:      'post',
        url: '/mail/contact_me.php',
        clearForm: true,
        success:       showResponse
    }; 
 
    // bind to the form's submit event 
    $('#jobseekers form').submit(function(e) {
        myoptions = options;
        myoptions.target = '#jobseekersSuccess';
        e.preventDefault();
        $(this).ajaxSubmit(myoptions); 
    }); 
    
    $('#employers form').submit(function(e) {
        myoptions = options;
        myoptions.target = '#employersSuccess';
        e.preventDefault();
        $(this).ajaxSubmit(myoptions); 
    }); 
});
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
    if (statusText == 'success')
    {
        alert('Thank you for your enquiry');
    }
} 

$('input[name=name]').focus(function() {
    $('form .success').html('').hide();
});

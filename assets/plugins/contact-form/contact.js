/**
 * Contact form
 */

$(document).ready(function(e) {

  // Variables
  var $form = $('#form_sendemail'),
      $formMessage = $('#form_message');

  // Submit form
  $form.on('submit', function(e) {

    $.ajax({
      url: 'sendmail.php',
      type: 'POST',
      data: $(this).serialize(),
      dataType: 'json',
      beforeSend: function (XMLHttpRequest) {

        // Reset form
        $form.find('.has-error').removeClass('has-error');
        $form.find('.help-block').html('').hide();
        $formMessage.removeClass('alert-success').html('');
      },
      success: function( json, textStatus ) {

        if( json.error ) {

          var $inputName = $form.find('input[name="name"]'),
              $inputEmail = $form.find('input[name="email"]'),
              $inputMessage = $form.find('textarea[name="message"]'),
              $formCaptcha = $('#form-captcha');

          // Error messages
          if( json.error.name ) {
            $inputName.parent().addClass('has-error');
            $inputName.next('.help-block').html( json.error.name ).slideDown();
          }
          if( json.error.email ) {
            $inputEmail.parent().addClass('has-error');
            $inputEmail.next('.help-block').html( json.error.email ).slideDown();
          }
          if( json.error.message ) {
            $inputMessage.parent().addClass('has-error');
            $inputMessage.next('.help-block').html( json.error.message ).slideDown();
          }
          if( json.error.recaptcha ) {
            $formCaptcha.addClass('has-error');
            $formCaptcha.find('.help-block').html( json.error.recaptcha ).slideDown();
          }
        }
        // Refresh Captcha
        grecaptcha.reset();
        //
        if( json.success ) {
          $formMessage.addClass('alert-success').html( json.success ).slideDown();
          
          setTimeout(function() {
            $formMessage.slideUp("fast", function() {
              var $this = $(this);
              $this.removeClass('alert-success').html('');
             });
          },4000);

          // Reset form
          $form[0].reset();
        }
        
      },
      complete: function( XMLHttpRequest, textStatus ) {
        //
      }
    });
    
    return false;
  });

});
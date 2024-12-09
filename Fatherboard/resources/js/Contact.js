$().ready(function(){ //Validating forms
    $('#contactForm').validate({
      rules: {
        firstName: "required", //Specifies first name is a required input 
        lastName: "required", //Specifies a last name is required.
        emailAddress:{
            required:true,
            email:true //Email has 2 rules - required and email, both are true, ensuring that text is input, adn that text is a valid email address.
          },
        query: "required"

      },
      messages: {
        firstName: "Please enter your first name", //popup message for invalid inputs:
        lastName:"Please enter your last name",
        emailAddress:"Please enter a valid email address",
        query: "Please enter a query."
      },
      errorPlacement: function(error,element) {
        $('label[for="' + element.attr("id") + '"]').text(error.text());
      }, //Places the error message, so that the original input text is not out of place.
      submitHandler: function(form){
        alert('Submit Success!')
        return false; //alerts the user that the form was successfully submitted
      }
    });
  });
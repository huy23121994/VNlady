		$('form').on('submit',function(e){
			e.preventDefault();
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(data){

					//reset message error
                    $('.error').html('');
                    $('form>div').removeClass('has-error').find('.error').html('');

                    function addError(input, message) {
                        var input_selector = $('input[name="' + input + '"]');
                        input_selector.parent().addClass('has-error');
                        input_selector.siblings('.error')
                        			  .html(message)
                        			  .css({'color':'#dd4b39','font-weight':'normal'});
                    }

					if (data=='fail: Not exists user') {
						addError('account','Not exists this user');
					}

					else if (data=='fail: incorrect password'){
						addError('password','Incorrect password');
					}

					else if (data=='success') {
						window.location.href="manager/item";
					}else{
						var errors =$.parseJSON(data);
						$('error').html('');
						$.each(errors, function(key,val){
							if (key == 'account') addError('account',val);
							if (key == 'password') addError('password',val);
						})
					}
				}
			)
		})
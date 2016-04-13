		$('form#upload').on('submit',function(e) {
			e.preventDefault();

			// Disable button when ajax is loading
			$('button[type="submit"]').attr('disabled','disabled')
				.find('i.fa-refresh').removeClass('hidden')
				.siblings('i.fa-upload').addClass('hidden');

			$.ajax({
				type:'POST',
				url: $(this).attr('action'),
				data:  new FormData($(this)[0]),
				contentType: false,
				processData: false,
				cache: false,
			}).done(function(data){

				$('small.error').html('');	//reset error message

				if (data=='success'){
					alert('Upload success!');
					$('form#upload')[0].reset();	//reset form
					$('.select2').val(null).trigger("change"); 		//reset select2
				}else{
					alert('Upload fail!');
					var errors =$.parseJSON(data);
					function adderror(input,val){
						var input_selector = $('#'+ input );
						input_selector.siblings('label').find('small')
									.html(val)
									.css({'color':'#dd4b39','font-weight':'normal'});
					}

					$.each(errors, function(key,val){
						if (key == 'title') adderror('title',val);
						if (key == 'description') adderror('description',val);
						if (key == 'embed_link') adderror('embed_link',val);
						if (key == 'categories') adderror('categories',val);
						if (key == 'img') adderror('img',val);
					})
				}

				// Enable button when ajax stoped
				$('button[type="submit"]').removeAttr('disabled','disabled')
					.find('i.fa-refresh').addClass('hidden')
					.siblings('i.fa-upload').removeClass('hidden');
			}).fail(function(){
				alert('Error upload to server!');
			})
		})
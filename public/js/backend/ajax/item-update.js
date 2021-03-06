		
		$('form#upload').on('submit',function(e) {
			e.preventDefault();

			// Disable button when ajax is loading
			$('button[type="submit"]').attr('disabled','disabled').find('i').addClass('fa-spin');
			var fd = new FormData($(this)[0]);
			fd.append('content',tinyMCE.activeEditor.getContent());
			$.ajax({
				type:'POST',
				url: $(this).attr('action'),
				data:  fd,
				contentType: false,
				processData: false,
				cache: true,
			}).done(function(data){
				$('small.error').html('');
				if (data=='success'){
					alert('Update success!');
				}else{
					alert('Update fail!');
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
				// Enalbe button when ajax stoped
				$('button[type="submit"]').removeAttr('disabled').find('i').removeClass('fa-spin');

			}).fail(function(){
				alert('Loi server');
			})
		})

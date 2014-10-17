/* Add here all your JS customizations */
var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};

$('#sign-in-form').on( 'submit', function(e) {
	e.preventDefault();
	var formData = $('#sign-in-form').serialize();

	$.post( "sign-in", formData)
	  .done(function( data ) {
	  	var returnData = $.parseJSON(data);

	  	if(returnData.success=='true'){
	  		window.location.replace(returnData.redirectURL);
	  	}
	  	else{
	  		$('#alert-placeholder').html('<div class="col-sm-12"><div class="alert alert-danger">Sorry, your details appear to be incorrect. Forgotton password? <a href="">Click here</a></div></div>').fadeIn('slow');
	  	}
	});

});

$('#sign-up-form').on( 'submit', function(e) {
	e.preventDefault();
	var formData = $('#sign-up-form').serialize();

	if($('#pwd').val() != $('#pwd_confirm').val()){
		$('#alert-placeholder').html('<div class="col-sm-12"><div class="alert alert-danger">Sorry, your passwords do not match</div></div>').fadeIn('slow');
	}
	else{
	  $.post( "sign-up", formData)
	  .done(function( data ) {
	  		console.log(data);
	  		if(data.success == 'true'){
	  			$('#sign-up-container').fadeIn('slow').html('<div class="alert alert-success">'+data.message+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>');
	  		}
	  		else{
	  			$('#alert-placeholder').html('<div class="col-sm-12"><div class="alert alert-danger">'+data.message+'</div></div>').fadeIn('slow');

	  		}
	    	
		});
	}

});

$('#collectionForm').on( 'submit', function(e) {
	e.preventDefault();
	var formData = $('#collectionForm').serialize();

	if($( "#collectionID" ).val()){
		actionURL = '/collections/edit/'+$( "#collectionID" ).val();
	}
	else{
		actionURL = '/collections/add';
	}

	$.post( actionURL, formData)
	  .done(function( data ) {
	  		console.log(data);
	  		$('#imagePanel').fadeIn('slow');
	  		
	  		if(data.success == 'true'){
	  			var type = 'success';
	  		}
	  		else{
	  			var type = 'error';
	  		}

	    	var notice = new PNotify({
								title: 'Notification',
								text: data.message,
								type: type,
								addclass: 'stack-bar-top',
								stack: stack_bar_top,
								width: "100%"
			});
			$( "#collectionID" ).val(data.id);
	});

});

$('.deleteCollection').on( 'click', function(e) {
	e.preventDefault();

	var collectionID = {collectionID:$(this).attr("collectionID")};

	$.post( "/collections/delete", collectionID)
	  .done(function( data ) {
	  		console.log(data);
	  		
	  		if(data.success == 'true'){
	  			var type = 'success';
	  		}
	  		else{
	  			var type = 'error';
	  		}

	    	var notice = new PNotify({
								title: 'Notification',
								text: data.message,
								type: type,
								addclass: 'stack-bar-top',
								stack: stack_bar_top,
								width: "100%"
			});
	});

	$( $(this).closest( "tr" ) ).slideUp( "slow", function() {
	
	});

});

//Pages
$('#pageForm').on( 'submit', function(e) {
	e.preventDefault();
	var formData = $('#pageForm').serialize();
	var sHTML = $('.note-editable').html();
	console.log(sHTML);

	formData = formData+'&content='+sHTML;

	if($( "#pageID" ).val()){
		actionURL = '/pages/edit/'+$( "#pageID" ).val();
	}
	else{
		actionURL = '/pages/add';
	}

	$.post( actionURL, formData)
	  .done(function( data ) {
	  		console.log(data);
	  		
	  		if(data.success == 'true'){
	  			var type = 'success';
	  		}
	  		else{
	  			var type = 'error';
	  		}

	    	var notice = new PNotify({
								title: 'Notification',
								text: data.message,
								type: type,
								addclass: 'stack-bar-top',
								stack: stack_bar_top,
								width: "100%"
			});
	});

});

$('.deletePage').on( 'click', function(e) {
	e.preventDefault();

	var pageID = {pageID:$(this).attr("pageID")};
console.log(pageID);
	$.post( "/pages/delete", pageID)
	  .done(function( data ) {
	  		console.log(data);
	  		
	  		if(data.success == 'true'){
	  			var type = 'success';
	  		}
	  		else{
	  			var type = 'error';
	  		}

	    	var notice = new PNotify({
								title: 'Notification',
								text: data.message,
								type: type,
								addclass: 'stack-bar-top',
								stack: stack_bar_top,
								width: "100%"
			});
	});

	$( $(this).closest( "tr" ) ).slideUp( "slow", function() {
	
	});

});

$('.deleteMedia').on( 'click', function(e) {
	e.preventDefault();

	var data = {URLfilePath:$(this).closest( "a" ).attr('href'),imageID:$(this).closest( "a" ).attr('id')};

	$(this).closest( "a" ).remove();

	$.post( "/media/delete", data)
	  .done(function( data ) {
	  		console.log(data);
	  		
	  		if(data.success == 'true'){
	  			var type = 'success';
	  		}
	  		else{
	  			var type = 'error';
	  		}

	    	var notice = new PNotify({
								title: 'Notification',
								text: data.message,
								type: type,
								addclass: 'stack-bar-top',
								stack: stack_bar_top,
								width: "100%"
			});
	});

});

//Sortable
$(function() {
	var itemList = $( "#sortable" );

    itemList.sortable({
        update: function(event, ui) {
            $('#loading-animation').show(); // Show the animate loading gif while waiting

            opts = {
                url: '/collections/image/update', 
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    collectionID: $( "#collectionID" ).val(), // Tell WordPress how to handle this ajax request
                    order: itemList.sortable('toArray').toString() // Passes ID's of list items in  1,3,2 format
                },
                success: function(response) {
                    console.log(response);
                    return; 
                },
                error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
                    console.log(e);
                    // alert('There was an error saving the updates');
                    return; 
                }
            };
            $.ajax(opts);
        }
    }); 
  });

//Dropzone
$(function() {
  // Now that the DOM is fully loaded, create the dropzone, and setup the
  // event listeners

  if($('#dropzone-form').length){
  	var myDropzone = new Dropzone("#dropzone-form");

  	myDropzone.on("success", function(file,responseText) {
	  	var imageURL  = responseText.image_path+'/'+responseText.image_name;
	  	var imageHTML = '<a id="28" class="img-thumbnail lightbox" href="'+imageURL+'" data-plugin-options="{ &quot;type&quot;:&quot;image&quot; }"><img class="img-responsive" width="215" src="'+imageURL+'"><span class="zoom"><i class="fa fa-search"></i></span></a>'; 
	  	$('#sortable').append(imageHTML);
	    console.log(responseText);
  	});
  }
  
})

$(document).ready(function() {
        $('#summernote').summernote({
            height: 500,
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        });
        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "/media/upload",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                	newURL = url['image_path']+url['image_name'];
                    editor.insertImage(welEditable, newURL);
                }
            });
        }
    });
'use strict';

(function() { 

var simplemde = new SimpleMDE({ element: $("#content")[0] });


// adds search icon as a placeholder in search bar
$('#search').on('keyup', function() {
    var input = $(this);
    if(input.val().length === 0) {
        input.addClass('empty');
    } else {
        input.removeClass('empty');
    }
});

if(document.getElementById("image")){
	document.getElementById("image").onchange = function () {
	    var reader = new FileReader();
	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        document.getElementById("preview").src = e.target.result;
	    };


	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	};
};




})();






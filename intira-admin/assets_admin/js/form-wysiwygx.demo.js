/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 1.7.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.7/admin/
*/

var handleFormWysihtml5 = function () {
	"use strict";
	$('#wysihtml5a').wysihtml5();
	$('#wysihtml5b').wysihtml5();
	$('#wysihtml5c').wysihtml5();
	$('#wysihtml5d').wysihtml5();
	$('#wysihtml5e').wysihtml5();
	$('#wysihtml5fx').wysihtml5();
	$('#wysihtml5fs').wysihtml5();
	$('#wysihtml5g').wysihtml5();
	$('#wysihtml5h').wysihtml5();
	$('#wysihtml5i').wysihtml5();
	$('#wysihtml5ax').wysihtml5({
		"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": false, //Italics, bold, etc. Default true
		"lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": false, //Button to insert a link. Default true
		"image": false, //Button to insert an image. Default true,
		"color": false //Button to change color of font  
	});
	$('#wysihtml5bx').wysihtml5({
		"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": false, //Italics, bold, etc. Default true
		"lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": false, //Button to insert a link. Default true
		"image": false, //Button to insert an image. Default true,
		"color": false //Button to change color of font  
	});
	$('#wysihtml5cx').wysihtml5({
		"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": false, //Italics, bold, etc. Default true
		"lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": false, //Button to insert a link. Default true
		"image": false, //Button to insert an image. Default true,
		"color": false //Button to change color of font  
	});
	$('#wysihtml5dx').wysihtml5({
		"font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": false, //Italics, bold, etc. Default true
		"lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": false, //Button to insert a link. Default true
		"image": false, //Button to insert an image. Default true,
		"color": false //Button to change color of font  
	});
};





var FormWysihtml5 = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleFormWysihtml5();
        }
    };
}();
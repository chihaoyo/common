///// EXTENSIONS /////
jQuery.fn._area_in_viewport = function() {
	var window = $(window);
	var r = $(this).get(0).getBoundingClientRect();
	
/*

from http://jsfiddle.net/uthyZ/

	(x11,y11)-------+
		|			|
		|			|
		+-------(x12,y12)
*/

	var x11 = r.left;
	var y11 = r.top;
	var x12 = r.right;
	var y12 = r.bottom;
	var x21 = 0; // viewport.left;
	var y21 = 0; // viewport.top;
	var x22 = window.width(); // viewport.right;
	var y22 = window.height(); // viewport.bottom;
	
	x_overlap = Math.max(0, Math.min(x12,x22) - Math.max(x11,x21))
	y_overlap = Math.max(0, Math.min(y12,y22) - Math.max(y11,y21));
	
	return x_overlap*y_overlap;
};
jQuery.fn._index = function(x) {
	if(typeof x == 'undefined')
		return $(this).attr('index');
	else
		return $(this).filter('[index="' + x + '"]');
};
jQuery.fn._id = function(x) {
	if(typeof x == 'undefined')
		return $(this).attr('id');
	else
		return $(this).filter('[id="' + x + '"]');
};
jQuery.fn._padding = function(which) {
	if(typeof which == 'undefined')
		which = 'left';
	var p = $(this).css('padding-' + which);
	if(typeof p == 'undefined')
		p = 0;
	else
		p = parseInt(p);
//	console.log(p);
	return p;
};/*
jQuery.fn.reset_css = function() {
	return $(this).css({backgroundColor: 'inherit', fontFamily: 'inherit', fontSize: 'inherit'});
};*/
///// HANDLERS /////
/* 

'unevent' from http://stackoverflow.com/questions/9144560/jquery-scroll-detect-when-user-stops-scrolling

*/
(function($) {
    var methods = {on: $.fn.on, bind: $.fn.bind};
    $.each(methods, function(k){
        $.fn[k] = function() {
            var args = [].slice.call(arguments), /* cool! */
                delay = args.pop(),
                fn = args.pop(),
                timer;

            args.push(function() {
                var self = this,
                    arg = arguments;
                clearTimeout(timer);
                timer = setTimeout(function(){
                    fn.apply(self, [].slice.call(arg));
                }, delay);
            });

            return methods[k].apply(this, isNaN(delay) ? arguments : args);
        };
    });
}(jQuery));
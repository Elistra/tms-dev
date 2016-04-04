/*javascript for index_im

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39997232-1']);
  _gaq.push(['_setDomainName', 'tms-gb.co.uk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

*/


$(document).ready(function () {	
	
	$('#nav li').hover(
		function () {
			//show its submenu
			$('ul', this).stop(false,true).slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).stop(false,true).slideUp(100);			
		}
);
});

jQuery(document).ready(function() {

  var counter = jQuery('#counter-count').data('counter');
  if ( counter != '0')  {  
    jQuery('li.maxstore-w-red-tab a').append('<span class="maxstore-actions-count">' + counter + '</span>');
  } else {
    jQuery('.maxstore-tab').removeClass( 'maxstore-w-red-tab' );
  }
	/* Tabs in welcome page */
	function maxstore_welcome_page_tabs(event) {
		jQuery(event).parent().addClass("active");
        jQuery(event).parent().siblings().removeClass("active");
        var tab = jQuery(event).attr("href");
        jQuery(".maxstore-tab-pane").not(tab).css("display", "none");
        jQuery(tab).fadeIn();
	}

	var maxstore_actions_anchor = location.hash;

	if( (typeof maxstore_actions_anchor !== 'undefined') && (maxstore_actions_anchor != '') ) {
		maxstore_welcome_page_tabs('a[href="'+ maxstore_actions_anchor +'"]');
	}

    jQuery(".maxstore-nav-tabs a").click(function(event) {
        event.preventDefault();
		maxstore_welcome_page_tabs(this);
    });

 /* Tab Content height matches admin menu height for scrolling purpouses */
		$tab = jQuery('.maxstore-tab-content > div');
		$admin_menu_height = jQuery('#adminmenu').height();
    if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
  {
		$newheight = $admin_menu_height - 180;
		$tab.css('min-height',$newheight);
  }
});

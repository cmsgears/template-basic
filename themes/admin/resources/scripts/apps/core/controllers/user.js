// == Application =========================

jQuery( document ).ready( function() {

	var app	= cmt.api.root.getApplication( 'core' );

	// Register Controllers
});

// == User Controller =====================

cmg.core.controllers.UserController.prototype.clearAvatarActionSuccess = function( requestElement, response ) {

	var uploader = requestElement.closest( '.file-uploader' );

	// Update Header Popuout
	jQuery( '.popout-group-main .wrap-user .user-avatar' ).remove();
	jQuery( '.popout-group-main .wrap-user' ).prepend( '<img class="user-avatar" src="' + siteUrl + 'images/avatar-user.png" />' );

	// Update Uploader
	uploader.find( '.file-wrap .file-data' ).html( '<i class="cmti cmti-5x cmti-user"></i>');
	uploader.find( '.file-clear' ).hide();
	uploader.find( '.post-action' ).hide();
};

cmg.core.controllers.UserController.prototype.profileActionSuccess = function( requestElement, response ) {

	var uploader = requestElement.closest( '.file-uploader' );

	// Update Header Popuout
	jQuery( '.popout-group-main .wrap-user .user-avatar' ).remove();

	if( null != response.data.thumbUrl ) {

		jQuery( '.popout-group-main .wrap-user' ).prepend( '<img class="user-avatar" src="' + response.data.thumbUrl + '" />' );
	}
	else {
		
		jQuery( '.popout-group-main .wrap-user' ).prepend( '<img class="user-avatar" src="' + siteUrl + 'images/avatar-user.png" />' );
	}

	// Update Uploader
	uploader.find( '.post-action' ).hide();
};

// == Direct Calls ========================

// == Additional Methods ==================

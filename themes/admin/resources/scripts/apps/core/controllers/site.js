// == Application =========================

jQuery( document ).ready( function() {

	var app	= cmt.api.root.getApplication( 'core' );

	// Register Controllers
	app.mapController( 'settings', 'cmg.core.controllers.SettingsController' );
	app.mapController( 'member', 'cmg.core.controllers.MemberController' );
});

// == Site Controller =====================

cmg.core.controllers.SiteController.prototype.checkUserActionPre = function( requestElement ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {
		
		case 'review': {

		}
	}

	return true;
};

cmg.core.controllers.SiteController.prototype.checkUserActionSuccess = function( requestElement, response ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {

		case 'review': {

			break;
		}
	}
};

cmg.core.controllers.SiteController.prototype.checkUserActionFailure = function( requestElement, response ) {

	var event = requestElement.attr( 'data-event' );

	switch( event ) {

		case 'review': {

			//window.location = siteUrl + 'login';

			break;
		}
	}
};

// == Site Settings Controller ============

cmg.core.controllers.SettingsController	= function() {};

cmg.core.controllers.SettingsController.inherits( cmt.api.controllers.RequestController );

cmg.core.controllers.SettingsController.prototype.getContentActionSuccess = function( requestElement, response ) {
	
	var formTitle	= jQuery( '#data-crud-settings .data-crud-title' );
	var formWrap	= jQuery( '#data-crud-settings .data-crud-form' );

	jQuery( '#popout-settings' ).slideUp();
	
	formTitle.find( '.title' ).html( requestElement.find( '.cmt-click' ).html() );

	formWrap.hide();
	formWrap.html( response.data );

	formWrap.find( '.cmt-checkbox' ).cmtCheckbox();
	formWrap.find( 'select' ).addClass( 'cmt-select' );
	formWrap.find( '.cmt-select' ).cmtSelect( { iconHtml: '<span class="cmti cmti-chevron-down"></span>' } );

	cmt.api.utils.request.registerTargetApp( 'core', formWrap );

	formWrap.fadeIn( 'slow' );
};

cmg.core.controllers.SettingsController.prototype.updateActionSuccess = function( requestElement, response ) {

	// Settings updated
};

// == Site Member Controller ==============

cmg.core.controllers.MemberController = function() {};

cmg.core.controllers.MemberController.inherits( cmt.api.controllers.RequestController );

cmg.core.controllers.MemberController.prototype.autoSearchActionPre = function( requestElement ) {

	var autoFill	= requestElement.closest( '.auto-fill' );
	var type 		= autoFill.find( 'input[name=type]' ).val();
	var keyword 	= autoFill.find( '.auto-fill-text' ).val();

	if( keyword.length <= 0 ) {

		autoFill.find( '.auto-fill-items' ).slideUp();

		return false;
	}

	this.requestData = 'name=' + keyword;

	return true;
};

cmg.core.controllers.MemberController.prototype.autoSearchActionSuccess = function( requestElement, response ) {

	var data		= response.data;
	var listHtml	= '';
	var autoFill	= requestElement.closest( '.auto-fill' );
	var itemList	= requestElement.find( '.auto-fill-items' );
	
	for( i = 0; i < data.length; i++ ) {

		var obj = data[ i ];

		listHtml += "<li class='auto-fill-item' data-id='" + obj.id + "'>" + obj.name + "</li>";
	}

	if( listHtml.length == 0 ) {

		listHtml = "<li class='auto-fill-message'>No matching results found</li>";

		itemList.html( listHtml );
	}
	else {

		itemList.html( listHtml );

		requestElement.find( '.auto-fill-item' ).click( function() {

			var id		= jQuery( this ).attr( 'data-id' );
			var name	= jQuery( this ).html();

			itemList.slideUp();

			autoFill.find( '.site-member' ).fadeIn( 'slow' );

			autoFill.find( '#sitemember-userid' ).val( id );
			autoFill.find( '#sitemember-name' ).val( name );
		});
	}

	itemList.slideDown();
};

// == Direct Calls ========================

// == Additional Methods ==================

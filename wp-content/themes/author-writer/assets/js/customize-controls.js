( function( api ) {

	// Extends our custom "author-writer" section.
	api.sectionConstructor['author-writer'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
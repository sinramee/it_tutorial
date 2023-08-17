( function( window, document ) {
  function author_writer_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const author_writer_nav = document.querySelector( '.sidenav' );
      if ( ! author_writer_nav || ! author_writer_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...author_writer_nav.querySelectorAll( 'input, a, button' )],
        author_writer_lastEl = elements[ elements.length - 1 ],
        author_writer_firstEl = elements[0],
        author_writer_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && author_writer_lastEl === author_writer_activeEl ) {
        e.preventDefault();
        author_writer_firstEl.focus();
      }
      if ( shiftKey && tabKey && author_writer_firstEl === author_writer_activeEl ) {
        e.preventDefault();
        author_writer_lastEl.focus();
      }
    } );
  }
  author_writer_keepFocusInMenu();
} )( window, document );
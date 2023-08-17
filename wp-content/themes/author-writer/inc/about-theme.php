<?php
/**
 * Author Writer Theme Page
 *
 * @package Author Writer
 */

function author_writer_admin_scripts() {
	wp_dequeue_script('author-writer-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'author_writer_admin_scripts' );

if ( ! defined( 'AUTHOR_WRITER_FREE_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_FREE_THEME_URL', 'https://www.themespride.com/themes/free-author-wordpress-theme/' );
}
if ( ! defined( 'AUTHOR_WRITER_PRO_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_PRO_THEME_URL', 'https://www.themespride.com/themes/author-writer-wordpress-theme/' );
}
if ( ! defined( 'AUTHOR_WRITER_DEMO_THEME_URL' ) ) {
	define( 'AUTHOR_WRITER_DEMO_THEME_URL', 'https://www.themespride.com/author-writer-pro/' );
}
if ( ! defined( 'AUTHOR_WRITER_DOCS_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/author-writer-lite/' );
}
if ( ! defined( 'AUTHOR_WRITER_DOCS_URL' ) ) {
    define( 'AUTHOR_WRITER_DOCS_URL', 'https://www.themespride.com/demo/docs/author-writer-lite/' );
}
if ( ! defined( 'AUTHOR_WRITER_RATE_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_RATE_THEME_URL', 'https://wordpress.org/support/theme/author-writer/reviews/#new-post' );
}
if ( ! defined( 'AUTHOR_WRITER_CHANGELOG_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'AUTHOR_WRITER_SUPPORT_THEME_URL' ) ) {
    define( 'AUTHOR_WRITER_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/author-writer/' );
}

/**
 * Add theme page
 */
function author_writer_menu() {
	add_theme_page( esc_html__( 'About Theme', 'author-writer' ), esc_html__( 'About Theme', 'author-writer' ), 'edit_theme_options', 'author-writer-about', 'author_writer_about_display' );
}
add_action( 'admin_menu', 'author_writer_menu' );

/**
 * Display About page
 */
function author_writer_about_display() {
	$author_writer_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $author_writer_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$author_writer_description = explode( '. ', $author_writer_theme->get( 'Description' ) );

					array_pop( $author_writer_description );

					$author_writer_description = implode( '. ', $author_writer_description );

					echo esc_html( $author_writer_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( AUTHOR_WRITER_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'author-writer' ); ?></a>

					<a href="<?php echo esc_url( AUTHOR_WRITER_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'author-writer' ); ?></a>

					<a href="<?php echo esc_url( AUTHOR_WRITER_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'author-writer' ); ?></a>

					<a href="<?php echo esc_url( AUTHOR_WRITER_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'author-writer' ); ?></a>

					<a href="<?php echo esc_url( AUTHOR_WRITER_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'author-writer' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $author_writer_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'author-writer' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'author-writer-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'author-writer-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'author-writer' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'author-writer-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'author-writer' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'author-writer-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'author-writer' ); ?></a>
		</nav>

		<?php
			author_writer_main_screen();

			author_writer_changelog_screen();

			author_writer_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'author-writer' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'author-writer' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'author-writer' ) : esc_html_e( 'Go to Dashboard', 'author-writer' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function author_writer_main_screen() {
	if ( isset( $_GET['page'] ) && 'author-writer-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'author-writer' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'author-writer' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'author-writer' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'author-writer' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'author-writer' ) ?></p>
				<p><a href="<?php echo esc_url( AUTHOR_WRITER_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'author-writer' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'author-writer' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'author-writer' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="author_writer_text_copyied()"><?php esc_html_e( 'GETPro20', 'author-writer' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function author_writer_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'author-writer' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'author_writer_changelog_file', AUTHOR_WRITER_CHANGELOG_THEME_URL );
				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = author_writer_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function author_writer_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function author_writer_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'author-writer' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'author-writer' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'author-writer' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'author-writer' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'author-writer' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(AUTHOR_WRITER_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'author-writer' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}

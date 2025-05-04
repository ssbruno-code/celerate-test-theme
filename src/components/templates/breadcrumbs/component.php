<?php

/**
 * @component       hep/breadcrumbs
 * @description     Displays the breadcrumbs of the site
 */

$default_args = array( "class" => "" );
$args = array_merge( $default_args, $args ?? [] );

$breadcrumb = array();
$breadcrumb[] = array(
	"title" => "Home",
	"url" => get_home_url(),
);

if ( is_page() ) {
	$ancestors = get_post_ancestors( get_the_ID() );
	$ancestors = array_reverse( $ancestors );

	foreach ( $ancestors as $ancestor ) {
		$breadcrumb[] = array(
			"title" => get_the_title( $ancestor ),
			"url" => get_the_permalink( $ancestor ),
		);
	}

	$breadcrumb[] = array(
		"title" => get_the_title(),
		"url" => "",
	);
} elseif ( is_product() ) {
	$resources_page = get_field( 'resources_page', 'option' ) ?: null;
	$breadcrumb[] = array(
		"title" => $resources_page?->post_title ?: "",
		"url" => get_the_permalink( $resources_page?->ID ) ?: "",
	);

	$breadcrumb[] = array(
		"title" => get_the_title(),
		"url" => "",
	);
} elseif ( is_single() ) {
	$post_type = get_post_type();
	$parent_page_title = "";
	$parent_page_link = "";

	if ( $post_type === "post" ) {
		$blog_page = get_field( "blog_page", "option" ) ?: null;
		$parent_page_title = $blog_page?->post_title ?: "News";
		$parent_page_link = get_the_permalink( $blog_page?->ID ) ?: get_home_url() . "/news";
	} elseif ( $post_type === "story" ) {
		$stories_page = get_field( "stories_page", "option" ) ?: null;
		$parent_page_title = $stories_page?->post_title ?: "Stories";
		$parent_page_link = get_the_permalink( $stories_page?->ID ) ?: get_home_url() . "/stories";
	} elseif ( $post_type === "event" ) {
		$events_page = get_field( "events_page", "option" ) ?: null;

		if ( $events_page ) {
			$parent_page_title = get_the_title( $events_page->ID );
			$parent_page_link = get_permalink( $events_page->ID );
			// get another level up
			$page_up_link = get_permalink( $events_page->post_parent );
			$page_up_title = get_the_title( $events_page->post_parent );

			$breadcrumb[] = array(
				"title" => $page_up_title,
				"url" => $page_up_link,
			);
		}
	} elseif ( $post_type === "faq" ) {
		$parent_page_title = "FAQs";
		$parent_page_link = get_home_url() . "/faqs";
	} else {
		$post_type_object = get_post_type_object( $post_type );
		$post_type_archive_link = get_post_type_archive_link( $post_type );
		$parent_page_title = $post_type_object->labels->name;
		$parent_page_link = $post_type_archive_link;
	}

	$breadcrumb[] = array(
		"title" => $parent_page_title,
		"url" => $parent_page_link,
	);

	$breadcrumb[] = array(
		"title" => get_the_title(),
		"url" => "",
	);

} elseif ( is_category() ) {
	$category = get_queried_object();
	$category_ancestors = get_ancestors( $category->term_id, "category" );
	$category_ancestors = array_reverse( $category_ancestors );

	foreach ( $category_ancestors as $category_ancestor ) {
		$ancestor = get_term( $category_ancestor, "category" );
		$breadcrumb[] = array(
			"title" => $ancestor->name,
			"url" => get_term_link( $ancestor ),
		);
	}

	$breadcrumb[] = array(
		"title" => $category->name,
		"url" => "",
	);

} elseif ( is_tag() ) {
	$tag = get_queried_object();
	$breadcrumb[] = array(
		"title" => $tag->name,
		"url" => "",
	);
} elseif ( is_author() ) {
	$author = get_queried_object();
	$breadcrumb[] = array(
		"title" => $author->display_name,
		"url" => "",
	);
} elseif ( is_archive() ) {
	$post_type = get_post_type();
	$post_type_object = get_post_type_object( $post_type );
	// $post_type_archive = get_post_type_archive_link($post_type);
	$breadcrumb[] = array(
		"title" => $post_type_object->labels->name,
		"url" => "",
	);
} elseif ( is_search() ) {
	$breadcrumb[] = array(
		"title" => "Search",
		"url" => "",
	);
} elseif ( is_404() ) {
	$breadcrumb[] = array(
		"title" => "404 Not Found",
		"url" => "",
	);
}

if ( ! is_admin() && count( $breadcrumb ) <= 1 )
	return;
?>
<div class="celeratewpcss-breadcrumbs <?php echo $args['class']; ?>">
	<?php if ( ! is_admin() ) : ?>
		<?php foreach ( $breadcrumb as $breadcrumb_item ) : ?>
			<?php if ( $breadcrumb_item["url"] ) : ?>
				<a href="<?= $breadcrumb_item["url"] ?>">
					<?= $breadcrumb_item["title"] ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
						<path d="M0 0L5 4.15686L0 8.31373" fill="#F37554" />
					</svg>
				</a>
			<?php else : ?>
				<span>
					<?= $breadcrumb_item["title"] ?>
				</span>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php else : ?>
		<a href="#">
			Page 1
			<svg xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 5 9" fill="none">
				<path d="M0 0L5 4.15686L0 8.31373" fill="#F37554" />
			</svg>
		</a>
		<span>Page 2</span>
	<?php endif; ?>
</div>
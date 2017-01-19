<div class="<?php foundation_sharing_classes(); ?>">
	<a class="twitter-btn no-ajax" href="//twitter.com/intent/tweet?source=wptouchpro3&text=<?php echo htmlspecialchars( urlencode( html_entity_decode( get_the_title() . ' - ' ) ) ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank"></a>
	<a class="linkedin-btn no-ajax" href="//www.linkedin.com/shareArticle?source=wptouchpro3&title=<?php echo htmlspecialchars( urlencode( html_entity_decode( get_the_title() . ' - ' ) ) ); ?>&url=<?php echo urlencode( get_permalink() ); ?>" target="_blank"></a>
	<a class="email-btn no-ajax" href="mailto:?subject=<?php echo rawurlencode( get_the_title() ); ?>&body=<?php echo rawurlencode( get_permalink() ); ?>"></a>
</div>
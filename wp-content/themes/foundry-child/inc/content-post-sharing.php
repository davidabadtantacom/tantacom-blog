<?php
	global $post;
	
	$url[] = '';
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>

<ul class="tags pull-right">
    <li>
        <a class="btn btn-sm btn-icon" target="_blank" href="https://twitter.com/share?original_referer=<?php the_permalink(); ?>&url=<?php echo wp_get_shortlink(); ?>&text=<?php echo get_the_title(); ?>&via=tantacom" onClick="return ebor_tweet_<?php echo the_ID(); ?>()">
            <i class="ti-twitter-alt"></i>
        </a>
    </li>
    <li>
        <a class="btn btn-sm btn-icon" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo get_site_url(); ?>" onClick="return ebor_linkedin<?php echo the_ID(); ?>()">
            <i class="ti-linkedin-alt"></i>
        </a>
    </li>
    <li>
       <a class="btn btn-sm btn-icon" href="mailto:subject=<?php echo get_the_title(); ?>&body=<?php the_permalink(); ?>" target="_blank">
            <i class="ti-email-alt"></i>
        </a>
    </li>
</ul>

<script type="text/javascript">
	function ebor_tweet_<?php echo the_ID(); ?>() {
		window.open('https://twitter.com/share?original_referer=<?php the_permalink(); ?>&url=<?php echo wp_get_shortlink(); ?>&text=<?php echo get_the_title(); ?>&via=tantacom','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_linkedin() {
		window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo get_site_url(); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
</script>
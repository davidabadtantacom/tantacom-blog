<?php
	global $post;
	
	$url[] = '';
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
    
  
        
        <ul class="social-list list-inline">
            <li> 
                <h6 class="uppercase">Comparte la oferta</h6>
            </li>
            <li>
                <a target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>" onClick="return ebor_tweet()">
                    <i class="ti-twitter-alt icon icon-xs"></i>
                </a>
            </li>
            <li>
                <a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" onClick="return ebor_linkedin()">
                    <i class="ti-linkedin icon icon-xs"></i>
                </a>
            </li>
            <li>
               <a href="mailto:someone@example.com?Subject=Hello%20again" target="_blank">
                    <i class="ti-email icon icon-xs"></i>
                </a>
            </li>

        </ul>
        
    </div>
</div>

<script type="text/javascript">
	function ebor_tweet() {
		window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_linkedin() {
		window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
</script>





<section class="social">
  <a href="<?php echo feed_rss_url(); ?>"
     title="Feed RSS"
     target="_blank">
    <section class="feed"><span>RSS</span></section>
  </a>

  <section class="twitter">
    <a href="https://twitter.com/share"
       class="twitter-share-button"
       data-via="marcker"
       data-lang="pt"
       data-hashtags="maua">Tweetar</a>
  </section>

  <section class="facebook">
    <div class="fb-like"
         data-href="<?php the_permalink(); ?>"
         data-layout="button_count"
         data-action="recommend"
         data-show-faces="false"
         data-share="false"></div>
  </section>
</section>

<aside id="secondary" class="widget-area sidebar">
    <div class="cta-sidebar">
        <?php if (is_active_sidebar('cta-sidebar')) : ?>
            <?php dynamic_sidebar('cta-sidebar'); ?>
        <?php endif; ?>
    </div>
    <div class="custom-sidebar">
        <?php if (is_active_sidebar('custom-sidebar')) : ?>
            <?php dynamic_sidebar('custom-sidebar'); ?>
        <?php endif; ?>
    </div>
</aside><!-- #secondary -->


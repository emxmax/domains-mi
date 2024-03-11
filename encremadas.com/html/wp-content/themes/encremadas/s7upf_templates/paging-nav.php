<?php if ($links) :
    // Custom icon/text
    $links['prev_text'] = '<i class="la la-angle-left"></i>';
    $links['next_text'] = '<i class="la la-angle-right"></i>';
    ?>
    <div class="pagi-nav text-center <?php echo esc_attr($style)?>">
        <?php echo apply_filters('s7upf_output_content',paginate_links($links)); ?>
    </div>
<?php endif;?>
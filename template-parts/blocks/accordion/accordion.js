(function ($) {

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    15/4/19
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function ($block) {
        var items = $block.find('.accordion__item');

        items.each(function () {
            var item = $(this);

            item.find('.accordion__question').on('click', function () {
                item.toggleClass('accordion__item--active');
                item.find('.accordion__answer').slideToggle();
            });
        });
    }

    // Initialize each block on page load (front end).
    $(document).ready(function () {
        $('.accordion').each(function () {
            initializeBlock($(this));
        });
    });

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=accordion', initializeBlock);
    }

})(jQuery);
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
        $block.find('.slides').slick();

        const progressLine = $block.find('.progressbar__line');
        const progressCur = $block.find('.progressbar__current');
        const progressAll = $block.find('.progressbar__all');

        $block.find('.slides').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            setProgress($block, nextSlide, progressLine, progressCur, progressAll);
        });

        setProgress($block, 0, progressLine, progressCur, progressAll);
    }

    function setProgress(slider, index, progressLine, progressCur, progressAll) {
        const current = index + 1;
        const all = slider.find('.slides').slick('getSlick').slideCount;

        const calc = (current / all) * 100;

        progressLine.css('background-size', `100% ${calc}%`);

        progressCur.text(('0' + current).slice(-2));
        progressAll.text(('0' + all).slice(-2));        
    }

    // Initialize each block on page load (front end).
    $(document).ready(function () {
        $('.slider').each(function () {
            initializeBlock($(this));
        });
    });

    // Initialize dynamic block preview (editor).
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=slider', initializeBlock);
    }

})(jQuery);
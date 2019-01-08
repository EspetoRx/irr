(function() {

/**
 *
 * CT Truncate
 *
 * Truncate the text of rich text element to { maxChars: n } by recursively
 * searching all nodes and adding the text length of each until we hit our max,
 * then remove all subsequent nodes and modify current node with elipses
 *
 * Options:
 *     truncator (String)
 *         Text to add after truncated characters. Defaults to elipses. If you
 *         require special characters, use escape codes like \u2026, because we
 *         update textContent
 *
 *    maxChars (Number)
 *        At readable text position we truncate the text
 *
 */
$.fn.ctTruncate = function( options ) {
    var $element = this,

        // Running count of how many characters we have
        charCount = 0,

        // Have we hit the max character limit? Flag to start removing nodes
        maxed;

    options = options || {};
    options.truncator = options.truncator || '\u2026';

    // Function to recursively walk the element we are truncating
    var walkNode = function( $node ) {
        var $contents = $node.contents();

        // Go over each child element, (contents also returns text nodes)
        $.each($contents, function(i, item) {
            var $item = $(item);

            // If we're past our character limit, just remove this node
            if( maxed ) {
                $item.remove();

            // If this is a text node...
            } else if( item.nodeType === 3 ) {

                // Ignore brs in char count (should this be an option?)
                if( item.textContent === '\r' || item.textContent === '\n') {
                    return;
                }
                charCount += item.textContent.length;

                // If we are past our limit...
                if( charCount >= options.maxChars ) {

                    // Cut off this node at the amount of characters we went
                    // over, and add the truncator
                    item.textContent = item.textContent.substring(
                        0,
                        item.textContent.length - (charCount - options.maxChars)
                    ) + options.truncator;
                    maxed = true;
                }
            // If this is a div or something else, recursively walk it
            } else {
                walkNode( $item );
            }
        });
    };

    // Walk the element we are truncating to start the pruning process
    walkNode( $element );
};

}());

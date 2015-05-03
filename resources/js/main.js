/*
 Evenup:
 Author: Matt Brunt <matt@burnthebook.co.uk>
 A way equalize the height of 'rows' of items responsively, that is, when the number of items per 'row' can change dynamically based on the size of the screen with your media queries.
 In the context of evenup - a 'row' is not necessarily a collection of items in a row container, it's best explained with an example:

 Given 12 items in a grid with the following arrangement:
 large screen	@ 4 x 3
 medium screen	@ 3 x 4
 small screen	@ 2 x 6

 Effectively, it's just a collection of 12 items:

 In foundation w/ Emmet coding it'd be something like:
 .row>small-6.medium-4.large-3.columns*12

 Now on a large screen, we want 'rows' of 4 items equal heights, but then on medium, rows of 3, on small, rows of 2

 Foundation has a built in equalizer, but that equalizes all items within a collection, so one row with shorter items will still be the same height as the largest item in the whole group.

 This plugin for jQuery solves the issue of having 'rows' of items equal heights on various screen sizes.

 Usage:

 On the wrappers around the items you want to make even, you must specify the number of items at each of your breakpoints, if not, it won't work.

 <div class="row" data-evenup data-options='{ "small": 2, "medium": 4, "large": 5 }'>

 </div>

 Then within that block, you assign data-evenup-item to the things you want to make the same height:

 <div class="small-6 medium-4 large-3 columns" data-evenup-item>

 </div>

 Then you just need to run the evenup plugin like so:

 $(document).ready(function() {
 var breakpoints = { small: 0, medium: 641, large: 1025 };
 $('[data-evenup]').evenup(breakpoints);
 });



 */
(function($) {

    $.fn.evenup = function(breakpoints) {
        // loop through each one of the evenups we have
        this.each(function() {

            var options = $(this).data('options'); // data-options='{ "breakpointLabel": numItems }'

            if( ! options) return; // no options, just return

            var windowWidth = window.innerWidth || $(window).width();

            // work out where we are in respect to our breakpoints
            var currentBreakpoint = '';
            $.each(breakpoints, function( breakpointLabel, breakpointSize )
            {
                if(windowWidth >= breakpointSize)
                {
                    currentBreakpoint = breakpointLabel;
                }
            });

            // get our items to even up, count them, work out how many per 'row' for the breakpoint we're at.
            var evenupItems = $(this).find('[data-evenup-item]');
            var count = evenupItems.length;
            var perRow = options[currentBreakpoint];

            // if we have items and we have a number per row set for the breakpoint we've found
            if(evenupItems.length > 0 && perRow)
            {
                // set the height on all items to auto so it can correctly re-calculate the tallest item in a row
                evenupItems.height('auto');

                // how many rows do we have?
                rows = Math.ceil(count/perRow);

                // loop through our rows for the number per row we have at this breakpoint
                for(var i = 1; i <= rows; i++)
                {
                    // reset the row height
                    var rowHeight = 0;

                    // loop through the items in this row and assign the tallest item to rowHeight
                    for(var j = 1; j <= perRow; j++)
                    {
                        var sliceStart = (i-1)*perRow+j-1; // get the starting item for the 'row' we're in
                        var sliceEnd = (i-1)*perRow+j; // get the last item for the 'row' we're in

                        thisHeight = evenupItems.slice(sliceStart, sliceEnd).height();
                        if(thisHeight > rowHeight) rowHeight = thisHeight;
                    }

                    // set the height of the items on this row to the tallest item
                    var sliceStart = (i-1)*perRow; // get the starting item for the 'row' we're in
                    var sliceEnd = (i-1)*perRow+perRow; // get the last item for the 'row' we're in

                    evenupItems.slice(sliceStart, sliceEnd).height(rowHeight);
                }
            }
        });
    };
}(jQuery));


function evenupItems() {
    // our breakpoints we're using for the various sizes
    var breakpoints = { small: 0, medium: 641, large: 1025 };
    $('[data-evenup]').evenup(breakpoints);
}

$(document).ready(function() {
    $(document).foundation();
    $('#search').focus();

    evenupItems();

    $('#team_id').change(function(event) {
        var teamId = $(this).val();
        $('#manager_id').html('');

        $.get('/vote/get-manager/' + teamId, function(data){
            $.each(data, function(index, manager) {
                $('#manager_id').append('<option value="' + manager.id + '">' + manager.name + '</option>');
            });
        });
    });

    // For the code below... I am sorry.
    $('#star-rating').hide();
    $('.rating-star').vibrate();
    $('.rating-star').hover(
        function() { // mouse over
            $('.rating-star').removeClass('active'); // remove all active ones for now

            $(this).prevAll().addClass('active'); // add class of active to all previous ones
        },
        function() { // mouse out
            $('.rating-star').removeClass('active'); // remove all active ones for now
            $('.rating-star').each(function() { // here we make sure to re-highlight the elements up to and including the one that's already been clicked.
                if((($(this).index() + 1) <= $('#star-rating').val()) && $('#star-rating').val() != '') {
                    $(this).prevAll().addClass('active'); // highlight all previous stars
                    $(this).addClass('active'); // highlight current star
                }
            });
        }
    );
    $('.rating-star').click(function() { // when we click a star
        $('.rating-star').removeClass('active'); // remove all active stars
        $(this).prevAll().addClass('active'); // highlight all previous stars
        $(this).addClass('active'); // highlight current star
        console.log(($(this).index()+1));
        $('#star-rating').attr('value', $(this).index()+1); // update the input to the value of the star
    });

});

$(window).resize(function() {
   evenupItems();
});


// ugh, highcharts...
setTimeout(function() {
    evenupItems();
}, 1000);
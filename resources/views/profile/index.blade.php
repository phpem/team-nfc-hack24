@extends('layouts.main')

@section('meta-title')
    {{ $user->first_name }} {{ $user->last_name }} | Team NFC
@endsection

@section('page-title')
    <img class="page-avatar page-avatar--circle" src="{{ $user->avatar }}" alt="{{ $user->first_name }} {{ $user->last_name }} profile image" /> {{ $user->first_name }} {{ $user->last_name }}
@endsection

@section('content')
    <div class="clearfix" data-evenup data-options='{ "small": 1, "medium": 3, "large": 4 }'>
        @include('partials.statspanel', [
            'statsValue'    => $data['overall']['percentage'] . '%',
            'statsLabel'    =>  'of members voted.',
            'modifier'      =>  Teamnfc\Helpers\ValueBracketCSSModifier::get($data['overall']['percentage'])
        ])
        @include('partials.statspanel', [
            'statsValue'    => $data['positive']['percentage'] . '%',
            'statsLabel'    =>  'of positive votes.',
            'modifier'      =>  Teamnfc\Helpers\ValueBracketCSSModifier::get($data['positive']['percentage'])
        ])
        @include('partials.statspanel', [
            'statsValue'    => $data['negative']['percentage'] . '%',
            'statsLabel'    =>  'of negative votes.',
            'modifier'      =>  Teamnfc\Helpers\ValueBracketCSSModifier::getInverse($data['negative']['percentage'])
        ])
    </div>

    <div class="clearfix" data-evenup data-options='{ "small": 1, "medium": 3, "large": 4 }'>

        <div class="small-12 medium-6 large-6 columns end">
            <div class="panel" data-evenup-item>
                <div class="panel__body">
                    <div id="pie1container"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        $(function() {
            Highcharts.setOptions({
                colors: ['#16a085', '#1e2f38', '#995852']
            });
            var chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'pie1container',
                    type: 'pie',
                    backgroundColor: 'rgba(0,0,0,0)',
                    events: {
                        redraw: function(event) {
                            evenupItems()
                        }
                    }
                },
                title: {
                    style: {
                        color: '#fff',
                        font: 'bold 16px "Trebuchet MS", Verdana, sans-serif'
                    },
                    text: 'Vote makeup'
                },

                plotOptions: {
                    pie: {
                        borderColor: 'rgba(0,0,0,0)',
                        innerSize: '60%'
                    }
                },
                series: [{
                    data: [
                        ['Positive', 44.2],
                        ['Neutral', 26.6],
                        ['Negative', 20],
                        ['Chrome', 3.1],
                        ['Other', 5.4]
                    ]}]
            },
            // using

            function(chart) { // on complete

                var xpos = '50%';
                var ypos = '53%';
                var circleradius = 102;

                // Render the circle
                chart.renderer.circle(xpos, ypos, circleradius).attr({
                    fill: 'rgba(0,0,0,0)'
                }).add();

                // Render the text
                chart.renderer.text('', 155, 215).css({
                    width: circleradius*2,
                    color: 'rgba(0,0,0,0)',
                    fontSize: '16px',
                    textAlign: 'center'
                }).attr({
                    // why doesn't zIndex get the text in front of the chart?
                    zIndex: 999
                }).add();
            });
        });
    </script>
@endsection
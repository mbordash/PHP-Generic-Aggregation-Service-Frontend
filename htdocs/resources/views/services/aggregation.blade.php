@extends('app')

@section('sidenav')

    <nav class="col-xs-2 bs-docs-sidebar">
        <ul class="nav nav-stacked fixed" id="sidebar">
            <li>
                <a href="#about">About the Service</a>
            </li>
            <li>
                <a href="#docs">API Documentation</a>
                <ul class="nav nav-stacked">
                    <li><a href="#docsSecurity">Secure Requests</a></li>
                    <li><a href="#docsIncDecMetric">Increment/Decrement Metric</a></li>
                    <li><a href="#docsSetMetric">Set Metric</a></li>
                    <li><a href="#docsGetMetric">Get Metric</a></li>
                    <li><a href="#docsQuery">Query Counts</a></li>
                </ul>
            </li>
            <li>
                <a href="#sampleCode">Sample Code</a>
            </li>
            <li>
                <a href="#sdks">Google Charts</a>
            </li>
        </ul>
    </nav>

    <div class="col-xs-10">

@endsection


@section('content')

    <h1 id="about">Aggregation in the Cloud</h1>

    <div class="panel panel-default">

        <div class="panel-heading">About the service</div>

        <div class="panel-body">
            <p>
                Most every project needs aggregation, whether counting events for real-time reporting, or tracking events from internet of things devices,
                or storing summary results based on a pivot. Our aggregation service was created with these use cases in mind.
            </p>
            <p>
                Free users may create up to 5 API keys, are limited to 100,000 requests per day per key (max burst of 5 requests/second), with precision to the day.
                Upgrades are available if you need to increase your daily requests limit or if you need aggregation precision down to the hour or minute.
            </p>
            <!--<p>
                Our service goals are 100% uptime with 200ms API request response.
                Paid subscribers are automatically eligible for 99.99% monthly uptime guarantees with 50% refund if we fall short of this goal.
                For SLA purposes, uptime monitoring is provided by Upsert.io.
            </p> -->
        </div>
    </div>

    <h2 id="docs">API Documentation</h2>

    <h3 id="docsSecurity">API Security</h3>
    <div class="bs-callout bs-callout-default">
        <h4>Bearer Tokens</h4>
        Include your token within the API request header. <a href="{{ url('/apikeys') }}">Get your API Token</a>.

        <h5>For example (curl)</h5>
        <code>
            curl --header "content-length: 0" --header "authorization: Bearer {YOUR_SECURE_TOKEN}" --include --request PUT "http://api.upsert.io/2.0/event/put?action=inc&scope=listens&key=caravan"
        </code>
    </div>



    <h3 id="docsIncDecMetric">Increment/Decrement Metric</h3>
    <div class="bs-callout bs-callout-default">
        <h4><span class="label label-warning">PUT</span> http://api.upsert.io/2.0/event/put</h4>
        This API method is helpful for keeping track of metric counts in real-time.
    </div>

    <h4>Parameters</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Required?</th>
                <th>Type</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>action</th>
                <td>Yes</td>
                <td>enum string</td>
                <td>Either "inc" for increment or "dec" for decrement.
                </td>
            </tr>
            <tr>
                <th>scope</th>
                <td>Yes</td>
                <td>string</td>
                <td>A short descriptive name for grouping your metrics.
                    For example, if you're tracking listens for songs, your scope might be "listens",
                    whereas your key might be the song's ID or name.
                </td>
            </tr>
            <tr>
                <th>key</th>
                <td>Yes</td>
                <td>string</td>
                <td>A short descriptive name for your metrics key.
                    For example, if you're tracking listens for songs, your key might be the song's ID or name.
                </td>
            </tr>
        </tbody>
    </table>

    <h3 id="docsSetMetric">Set Metric</h3>
    <div class="bs-callout bs-callout-default">
        <h4><span class="label label-warning">PUT</span> http://api.upsert.io/2.0/event/set</h4>
        This API method is helpful for loading counts for keys for past days or for storing counts as a result of a pivot.
    </div>

    <h4>Parameters</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Required?</th>
                <th>Type</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>scope</th>
                <td>Yes</td>
                <td>string</td>
                <td>A short descriptive name for grouping your keys.
                    For example, if you're tracking listens for songs, your scope might be "listens",
                    whereas your key might be the song's ID or name.
                </td>
            </tr>
            <tr>
                <th>key</th>
                <td>Yes</td>
                <td>string</td>
                <td>A short descriptive name for your metrics key.
                    For example, if you're tracking listens for songs, your key might be the song's ID or name.
                </td>
            </tr>
            <tr>
                <th>val</th>
                <td>Yes</td>
                <td>integer</td>
                <td>The integer value for the metric key count.
                </td>
            </tr>
            <tr>
                <th>date</th>
                <td>Yes</td>
                <td>Date string</td>
                <td>The date value for the metric key count, for example "2010-01-01".
                </td>
            </tr>
        </tbody>
    </table>

    <h3 id="docsGetMetric">Get Count</h3>
    <div class="bs-callout bs-callout-default">
        <h4><span class="label label-success">GET</span> http://api.upsert.io/2.0/event/count</h4>
        This API method is helpful for getting counts for your scope and optionally your key and optionally within a date range.
    </div>

    <h4>Parameters</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Required?</th>
                <th>Type</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>scope</th>
                <td>Yes</td>
                <td>string</td>
                <td>A short descriptive name for grouping your metrics.
                    For example, if you're tracking listens for songs, your scope might be "listens",
                    whereas your key might be the song's ID or name.
                </td>
            </tr>
            <tr>
                <th>start</th>
                <td>No</td>
                <td>Date string</td>
                <td>If you'd like to receive a count based on a date range, this is the start date value for the metric key count, for example "2010-01-01".
                    You must also include an end date.
                </td>
            </tr>
            <tr>
                <th>end</th>
                <td>No</td>
                <td>Date string</td>
                <td>If you'd like to receive a count based on a date range, this is the end date value for the metric key count, for example "2010-01-01".
                    You must also include an end date.
                </td>
            </tr>
            <tr>
                <th>key</th>
                <td>No</td>
                <td>string</td>
                <td>A short descriptive name for your metrics key.
                    For example, if you're tracking listens for songs, your key might be the song's ID or name.
                </td>
            </tr>

        </tbody>
    </table>

    <h3 id="docsQuery">Get List by Query</h3>
    <div class="bs-callout bs-callout-default">
        <h4><span class="label label-success">GET</span> http://api.upsert.io/2.0/event/query</h4>
        This API method is helpful for performing query operations. You can get a list of your keys where the count is greater than a number. You can also get
        a list of total counts grouped by your scope or your key by day. We use this API to generate daily summary data by scope for the google chart demo below.
    </div>

    <h4>Parameters</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Required?</th>
                <th>Type</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>operator</th>
                <td>Yes</td>
                <td>enum string</td>
                <td>One of the following operators: "lt" (less than), "lte" (less than or equal to), "gt" (greater than), "gte" (greater than or equal to)
                </td>
            </tr>
            <tr>
                <th>operand</th>
                <td>Yes</td>
                <td>Integer</td>
                <td>The count as an integer you'd like to use for your query.</td>
            </tr>
            <tr>
                <th>scope</th>
                <td>Yes</td>
                <td>String</td>
                <td>The group name for your keys to be used in the query.</td>
            </tr>
            <tr>
                <th>key</th>
                <td>No</td>
                <td>String</td>
                <td>The name of the key to be used in the query.</td>
            </tr>
            </tr>
            <tr>
                <th>group_by</th>
                <td>No</td>
                <td>Boolean</td>
                <td>Current supports grouping by day. Default is false</td>
            </tr>
            <tr>
                <th>page</th>
                <td>No</td>
                <td>Integer</td>
                <td>The page of results to retrieve. Limit is 100 documents per request.</td>
            </tr>
        </tbody>
    </table>

    <h2 id="sampleCode">Sample Code</h2>
    Here's some sample code to get you started.

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#php" aria-controls="php" role="tab" data-toggle="tab">PHP</a></li>
            <li role="presentation"><a href="#java" aria-controls="java" role="tab" data-toggle="tab">Java</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="php">
                <script src="https://gist.github.com/mbordash/8fd0dbe6323ad4c29735.js"></script>


            </div>
            <div role="tabpanel" class="tab-pane" id="java">java coming soon!</div>
        </div>
    </div>

    <h2 id="sdks">Google Charts</h2>
    Here's a great example of how you can use Google Charts to generate real-time aggregate reports for data you store at Upsert.io. We'll use the Get List by Query API
    above.

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);


        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            var metrics_items = [];
            var http = location.protocol;
            var slashes = http.concat("//");
            var host = slashes.concat(window.location.hostname);

            var proxyUrl = host.concat('/proxy');

            //get chart data
            $.ajax({
                url: proxyUrl,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    var chartData = new google.visualization.DataTable();
                    chartData.addColumn('date', 'Date');
                    chartData.addColumn('number', 'Listens');

                    $.each(data.results, function (key, val) {

                        //var t = val.created_on.split(/[- :]/);
                        //chartData.addRow([new Date(t[0], t[1] - 1, t[2]), parseInt(val.count)]);
                        chartData.addRow([new Date(val.created_on), parseInt(val.count)]);
                    });

                    var options = {
                        title: 'Total Song Listens by Date',
                        seriesType: "line",
                        width: 1000,
                        height: 400,
                        legend: { position: 'bottom' },
                        vAxes:[
                            {title:'Count'} // Axis 1
                        ]
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                    chart.draw(chartData, options);

                }
                //,
                //error: function () {
                //    alert('boo!');
                //}
            });
        }
    </script>

    <div id="chart_div" style="width:400; height:300"></div>

    To render the chart, first we create a server side proxy script to protect our API token.
    This php script will simply create a get request to the API and pass through the result.

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#gc_php" aria-controls="php" role="tab" data-toggle="tab">PHP</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="#gc_php">
                <script src="https://gist.github.com/mbordash/86db2d70b78bf07405f3.js"></script>


            </div>
        </div>
    </div>


    Next, we'll use this proxy script when rendering the Google Charts via JavaScript.

    <div role="tabpanel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#gc_javascript" aria-controls="php" role="tab" data-toggle="tab">JavaScript</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="gc_javascript">
                <script src="https://gist.github.com/mbordash/d102fa8e8511d6a8ebf7.js"></script>
            </div>
        </div>
    </div>


@endsection

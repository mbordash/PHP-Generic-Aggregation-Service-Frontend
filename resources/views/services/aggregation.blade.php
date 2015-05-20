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
            <li>
                <a href="#sdks">SDKs</a>
            </li>
        </ul>
    </nav>

    <div class="col-xs-10">

@endsection


@section('content')

    <h1 id="about">Aggregation in the Cloud <small><span class="label label-default">BETA</span></small></h1>

    <div class="panel panel-default">

        <div class="panel-heading">About the service</div>

        <div class="panel-body">
            <p>
                Most every project needs aggregation, whether counting events for real-time reporting, or tracking events from internet of things devices,
                or storing summary results based on a pivot. Our aggregation service was created with these use cases in mind.
            </p>
            <p>
                Free users may create up to 5 API keys, are limited to 5000 requests per day per key, with precision to the day.
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
            curl --header "authorization: Bearer {YOUR_SECURE_TOKEN}" --include --request PUT "http://api.upsert.io/event/inc/listens/caravan"
        </code>
    </div>



    <h3 id="docsIncDecMetric">Increment/Decrement Metric</h3>
    <div class="bs-callout bs-callout-default">
        <h4><span class="label label-warning">PUT</span> http://api.upsert.io/event/{action}/{scope}/{key}</h4>
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
        <h4><span class="label label-warning">PUT</span> http://api.upsert.io/event/set/{scope}/{key}/{val}/{date}</h4>
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
        <h4><span class="label label-success">GET</span> http://api.upsert.io/event/count/scope/{start}/{end}/{key}</h4>
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
        <h4><span class="label label-success">GET</span> http://api.upsert.io/event/query2/{inputOperator}/{inputOperand}/{scope}/{key}/{group_by}</h4>
        This API method is helpful for performing query operations. You can get a list of your gets where the count is greater than a number. You can also get
        a list of total counts grouped by your scope or your key by day.
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
                <td>Integers</td>
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
        </tbody>
    </table>

    <h3 id="sampleCode">Sample Code</h3>
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

    <h3 id="sdks">Google Charts</h3>
    Coming Soon!


    <h3 id="sdks">SDKs</h3>
    Coming Soon!

@endsection

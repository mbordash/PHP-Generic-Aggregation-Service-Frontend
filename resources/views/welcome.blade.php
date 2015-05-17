<html>
	<head>
		<title>Upsert.io</title>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
                margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<div class="title">Upsert.io</div>
				<div class="quote">A microservices fortress.  Let's start with...</div>
		        <div class="quote">
                    <a class="btn btn-default btn-lg btn-block" href="aggregation">Aggregation</a>
                </div>
                <div class="quote">
                    Be sure to <a href="{{ url('/auth/register') }}">Register for Updates</a>
                </div>
            </div>
		</div>

	</body>
</html>

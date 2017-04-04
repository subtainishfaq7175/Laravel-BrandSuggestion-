<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<h1>This is test page of rating </h1> <br>
<span class="glyphicon glyphicon-star-empty"></span>

<h3>Programmatically set/get rate</h3>
<input type="hidden" class="rating" data-filled="glyphicon glyphicon-heart-empty" data-filled-selected="glyphicon glyphicon-heart" data-empty="glyphicon glyphicon-heart-empty"/>

<input type="hidden" class="rating-tooltip" id="programmatically-rating">
<input type="number" id="programmatically-value">
<button type="button" id="programmatically-set">Set value</button>
<button type="button" id="programmatically-get">Get value</button>
<button type="button" id="programmatically-reset">Reset value</button>
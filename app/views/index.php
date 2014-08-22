<!-- index.html -->
	<!DOCTYPE html>
	<html>
	<head>
	  <!-- SCROLLS -->
	  <!-- load bootstrap and fontawesome via CDN -->
	  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
	  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" />
	  <title>Home page</title>
	</head>
	<body>

		<!-- HEADER AND NAVBAR -->
		<header>
			<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="/">Chat room</a>
				</div>

				<ul class="nav navbar-nav navbar-right">
					<?php

						if (!$user) 
						{
					?>
					<li><a href="/sign-in-with-facebook"><i class="fa fa-home"></i> Sign In</a></li>
					<?php
						} else 
						{
					?>

					<li><a><i class="fa fa-home"></i> <?php echo $user->first_name; ?> </a></li>
					<?php
						}
					?>
				</ul>
			</div>
			</nav>
		</header>

		<!-- MAIN CONTENT AND INJECTED VIEWS -->
		<div id="main" ng-app="commentApp" ng-controller="mainController">

			<div class="col-md-8 col-md-offset-2">

				<!-- PAGE TITLE =============================================== -->
				<div class="page-header">
					<h2>Laravel and Angular Single Page Application</h2>
					<h4>Commenting System</h4>
				</div>

				<!-- NEW COMMENT FORM =============================================== -->
				<form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->

					<!-- COMMENT TEXT -->
					<div class="form-group">
						<input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Say what you have to say">
					</div>
					
					<!-- SUBMIT BUTTON -->
					<div class="form-group text-right">	
						<button type="submit" class="btn btn-primary btn-lg">Submit</button>
					</div>
				</form>

				<!-- LOADING ICON =============================================== -->
				<!-- show loading icon if the loading variable is set to true -->
				<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

				<!-- THE COMMENTS =============================================== -->
				<!-- hide these comments if the loading variable is true -->
				<div class="comment" ng-hide="loading" ng-repeat="comment in comments">
					<h3>Comment #{{ comment.id }}</h3>
					<p>{{ comment.content }}</p>

					<p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
				</div>

			</div>
		</div>

		<!-- FOOTER -->
		<!-- load libs -->
		<script src="js/libs/jquery-1.10.2.js"></script>
		<script src="js/libs/angular.js"></script>
		<script src="js/libs/angular-route.js"></script>
		<script src="js/libs/angular-mocks.js"></script>
		<!-- load angularjs file -->
		<script src="js/app.js"></script> <!-- load our application -->
		<script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
		<script src="js/services/commentService.js"></script> <!-- load our service -->
	</body>
	</html>
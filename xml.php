<html>
<head>
    <meta charset="utf-8">
	<title>Xml | Get News from other site</title>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
</head>
<body>
<style>
    .morgan {
        border: 1px solid #2a4990;
        padding: 4px;
        margin: 15px 15px 20px 15px;
        background: #1094c6;
        box-shadow: 0px 3px 6px 0px;
        width: 30.3%;
        display: inline-grid;
        color: #232b32;
        box-sizing: border-box;
        min-height: 300px;
        border-radius: 6px;
    }
    .morgan:hover {
        box-shadow: 0px 5px 20px 3px;
    }
    
    .morgan img {
        width: 90% !important;
        height: 200px;
        display: block;
        margin: 0 auto;
        object-fit: cover;
        
    }
    @media (max-width: 767px){
        .morgan {
            width: 100%;
            margin: 6px auto 20px;
        }
    }
     @media (max-width: 1023px){
        .morgan {
            width: 45%;
        }
    }
    @media (min-width: 1024px) and (max-width: 1399px) {
        .morgan {
            width: 30%;
        }
    }
    @media (min-width: 1400px) {
        .morgan {
            width: 20%;
        }
    }
    
    select {
        padding: 8px;
        border: 1px solid #000000;
        font-size: 16px;
        outline: none;
        background: #333e4a;
        color: #b5b5b5;
        border-radius: 10px;
    }
</style>
<div ng-app="myApp">
    <div ng-controller="myContr">
        <select ng-model="rssFeed" ng-options="x.name + ' (' + x.site + ')' for x in rss" ng-change="getRss(rssFeed)">
        </select>
    </div>
</div>

<?php
if(isset($_GET['rss'])){
    $rss = trim($_GET['rss']);
    $xml = simplexml_load_file($rss);

foreach($xml->channel->item as $item){
	echo "<div class='morgan'>";
	echo "<h3>" . $item->title . "</h3>";
	echo $item->description . "<br>";
	echo "<a href='{$item->link}'>Read more...</a>";
	echo "</div>";
}
}

?>

<script>
var app = angular.module('myApp', []);
app.controller('myContr', function($scope, $http, $location, $window) {
	$http({
		method: 'post',
		url: 'server.php'
	})
	.then(function( response ){
		$scope.rss = response.data;
	}, function( response ){
		$scope.rss = response.statusText;
	});
    
    $scope.getRss = function(rss){
        var newUrl = $location.url() + '?rss=' + rss.link;
        $window.location.href = newUrl;
    }
});
</script>

</body>
</html>
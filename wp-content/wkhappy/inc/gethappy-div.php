 <form ng-submit="submitHappiness()">

	<div ng-app="happyApp" ng-controller="happyCtrl" class="happy-container">
	
  		<p>How are you feeling today? </p>
        <input id="happy" type="radio" name="happiness" ng-model="happiness" value="happy"/>
		<label class="happiness happy" for="happy"></label>
        <input id="nothappy" type="radio" name="happiness" ng-model="happiness" value="nothappy" />
        <label class="happiness nothappy" for="nothappy"></label>
  
  <p>{{happiness}}</p>
  </div>

</form>
<script>
var app = angular.module("happyApp", []);
app.controller("happyCtrl", function($scope) {
  $scope.myTxt = "You have not yet clicked submit";
  $scope.submitHappiness = function () {
      $scope.myTxt = "You clicked submit!";
  }
});

</script>

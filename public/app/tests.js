var app=angular.module('test-app3',[]);
app.controller('MembersControll2',function($scope,$http){
// $http({
// 		method:'GET',
// 		url:'http://localhost/test2/public/list',
// 	}).then(function(reponse){
// 		$scope.members=reponse.data;
// 	},function(error){
// 		console.log(error);
// 	});

// 	$scope.modal=function(state,id){
// 		$scope.state=state;
// 		$('#myModal').modal('show');
// 	}
	console.log('a');
	$scope.save= function(state){
		console.log($scope.membera.name);
		// console.log($('#name').val());
	}
});
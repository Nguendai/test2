var app=angular.module('test-app2',[]);

app.controller('MembersControll',function($scope,$http){
	$http({
		method:'GET',
		url:'http://localhost/test2/public/list',
	}).then(function(reponse){
		$scope.members=reponse.data;
	},function(error){
		console.log(error);
	});

	$scope.modal=function(state,id){
		$scope.state=state;
		switch(state) {
			case "add":
				$scope.membera={};
				$('#file').val(null);
				$scope.file=null;
				$scope.frmTitle="Add Member";
				$scope.member.$setPristine(true);
				// console.log($scope.membera.name);

				break;
			case "edit" :
				$scope.membera={};
				$('#file').val('');
				$scope.file=null;
				$scope.frmTitle="Edit Member";
				$scope.member.$setPristine(true);
				$http({
					method:'GET',
					url:'http://localhost/test2/public/edit/'+id,
				}).then(function(reponse){
					$scope.membera=reponse.data;
				},function(error){
					console.log(error);
				});
				break;
			default:
		}
		$('#myModal').modal('show');
	}
	
	$scope.save= function(state,id){
		if(state=="add"){
			// event.stopPropagation();
				var file=document.getElementById('file');
				var data=new FormData();
				$scope.membera.age=$scope.membera.age?$scope.membera.age:'';
				$scope.membera.address=$scope.membera.address?$scope.membera.address:'';
				$scope.membera.name=$scope.membera.name?$scope.membera.name:'';		
				data.append('age',$scope.membera.age);
				data.append('address',$scope.membera.address);
				data.append('name',$scope.membera.name);
				data.append('file',file.files[0]);
				$http({
					method:'POST',
					data:data,
					url:'http://localhost/test2/public/add',
					headers :{'Content-Type':undefined}
				}).then(function(reponse){
					console.log(reponse.data)
					$('#myModal').modal('hide');
					$scope.members = reponse.data;
					sweetAlert("Success", "New member was added!", "success");
					
				},function(error){
					sweetAlert("Error", error.data.status, "error");
			});
		}
		$scope.member.$invalid=true;
		if(state=="edit"){
			var file=document.getElementById('file');
			var data=new FormData();
			$scope.membera.age=$scope.membera.age?$scope.membera.age:'';
			$scope.membera.address=$scope.membera.address?$scope.membera.address:'';
			$scope.membera.name=$scope.membera.name?$scope.membera.name:'';
			data.append('name',$scope.membera.name);
			data.append('age',$scope.membera.age);
			data.append('address',$scope.membera.address);
			data.append('file',file.files[0]);
			$http({
				method:'POST',
				data:data,
				url:'http://localhost/test2/public/edit/'+id,
				headers :{'Content-Type':undefined}
			}).then(function(reponse){
				$('#myModal').modal('hide');
				$scope.members = reponse.data;
				sweetAlert("Success", "Member was edited!", "success");
			},function(error){
				if(error.data.file){
					sweetAlert("Error",error.data.file,"error");
				}else{
					sweetAlert("Error", error.data.name+'\n'+error.data.address+'\n'+error.data.age, "error");
				}
			});
		}
	}
	$scope.comfirmDelete=function(id){
		var comfirm=confirm("Are you sure!");
		if(comfirm){
			$http({
					method:'GET',
					url:'http://localhost/test2/public/delete/'+id,
				}).then(function (reponse){
					$scope.members = reponse.data;
					sweetAlert("Congratulation", "You just kicked some asshole out of the squad", "success");
				},function(error){
					console.log(error);
				});	

		}else{
			return false;
		}

	}

	
});
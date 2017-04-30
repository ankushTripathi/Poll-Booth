app.controller('pollController',function($scope,$http){
    
    $scope.polls = [];
    $http.get('/api/polls').
        success(function(data,status,headers,config){
            $scope.polls = data;
        });

    $scope.addVote = function(polloption){
        $http.put('/api/polloptions/'+polloption.id).
            success(function(data,status,headers,config){
                polloption.vote++;
            });
    }
});

app.controller('adminController',function($scope,$http){
    
    $scope.polls = [];
    $scope.newpoll = {};

    $http.get('/api/polls/').
        success(function(data,status,headers,config){
            $scope.polls = data;
        });
    $scope.addPoll = function(){
        $http.post('/api/polls/',$scope.newpoll).
            success(function(data,status,headers,config){
                data.polloptions = [];
                $scope.polls.push(data);
                newpoll.title = "";
            });
    }

    $scope.removePoll = function(poll){
        $http.delete('/api/polls/'+poll.id).
            success(function(data,status,headers,config){
                var obj = $scope.polls.filter(function(obj){
                    return obj.id == poll.id;
                })[0];
            
            var idx = $scope.polls.indexOf(obj);
            $scope.polls.slice(idx,1);

            });
    }

    $scope.addOption = function(poll,newoption){

        newoption.poll_id = poll.id;
        $http.post('/api/polloptions',newoption).
            success(function(data,status,headers,config){
                poll.polloptions.push(data);
                newoption.title = "";
            });
    }

    $scope.removeOption = function(option,poll){

        $http.delete('/api/polloptions/'+option.id).
            success(function(data,status,headers,config){
                var obj = poll.polloptions.filter(function(obj){
                    return obj.id == option.id;
                })[0];
                var idx = poll.polloptions.indexOf(obj);
                poll.polloptions.slice(idx,1);

            });
    }

});
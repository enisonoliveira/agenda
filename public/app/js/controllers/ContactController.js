app.controller('ContactController', function($scope, $http, $compile, $location, $routeParams) {

    $scope.form1 = {}
    $scope.form = {}

    $scope.changeDefaut = function() {
        $http.get(projectURL + '/report/all?token=' + token).success(function(data) {
            $scope.contact = data;
            $('#grid').show();
        }).error(function(data) {
            $(".errormodal").show();
        });
    }

    $scope.buscar = function() {
        $(".grid2").hide();
        $("#grid").show();
        if ($scope.form1.status == '') {
            alert("Infome o site");
            return true;
        } else {
            if ($scope.form1.status == '1') {
                return '/report/withphone?token=' + token
            } else {
                if ($scope.form1.status == '0') {
                    return '/report/withoutphone?token=' + token

                }
            }

        }
    }

    $scope.submitAnts = function(event) {
        var url = $scope.buscar();
        $http.get(projectURL + url).success(function(data) {
            $scope.contact = data;
        }).error(function(data) {
            $(".errormodal").show();
        });
    }

    $scope.deleteContact = function(id) {
        $http.post(projectURL + '/delete?idcontact=' + $scope.idcontact).success(function(data) {
            $scope.contact = data;
            $(".modalGeral").hide();
            $scope.changeDefaut()
        }).error(function(data) {
            // $(".errormodal").show();
        });
    }

    $scope.deleteContactModal = function(e, id) {
        e.preventDefault()
        console.log(id)
        $('#deleteModal').show();
        $scope.idcontact = id;
    }

    $scope.deletePhone = function(id) {
        $http.post(projectURL + '/phone/delete?idcontact=' + id).success(function(data) {
            $scope.contact = data;
        }).error(function(data) {
            $(".errormodal").show();
        });
        $scope.changeDefaut()
    }

    $scope.editardata = function(contact, e) {
        $("#grid").hide();
        $(".grid2").show();
        $scope.form = contact;
    }
    $scope.sair = function() {
        $(".modalGeral").hide();
    }

    $scope.changeDefaut();

});
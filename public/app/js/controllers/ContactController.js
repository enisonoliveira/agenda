app.controller('ContactController', function($scope, $http, $compile, $location, $routeParams) {

    $scope.form1 = {
        tiposite: '',
        telefone: '',
        date1: null,
        date2: null,
        status: ''
    }

    $http.get(projectURL + '/report/all?token=' + token).success(function(data) {
        $scope.contact = data;
        $('#grid').show();
    }).error(function(data) {
        $(".errormodal").show();
    });

    $scope.buscar = function() {
        $(".grid2").hide();
        $("#grid").show();
        console.log($scope.form1.vencimento);
        console.log($scope.form1.status);
        if ($scope.form1.tiposite == '') {
            alert("Infome o site");
            return true;
        } else {
            if ($scope.form1.date1 != '' && $scope.form1.date1 != null) {
                var date1 = $scope.formataData($scope.form1.date1);
                var date2 = $scope.formataData($scope.form1.date2);
                return '/searchcContact?site=' + $scope.form1.tiposite + '&site=' + $scope.form1.tiposite + "&data1=" + date1 + "&data2=" + date2 + "&token=" + token
            } else {
                if ($scope.form1.vencimento == 'Expirando') {
                    return '/searchcContact?site=' + $scope.form1.tiposite + '&vencendo=1&site=' + $scope.form1.tiposite + "&token=" + token

                }
            }

        }
    }

    $scope.submitAnts = function(event) {
        if ($scope.form1.tiposite != '') {
            $http.get(projectURL + url).success(function(data) {
                $scope.contact = data;
            }).error(function(data) {
                $(".errormodal").show();
            });
        }
        setTimeout(function() {}, 3000);
    }

    $scope.copy = function(id) {
        const inputTest = document.querySelector("#" + id);
        inputTest.select();
        document.execCommand('copy');
    }

    $scope.updateContact = function(event) {
        event.preventDefault();
        expvl = $("#planbol option:selected").text();
        expvlplitada = expvl.split("-");
        expvlplitada = expvlplitada;

        $http.get(projectURL + '/salvarcliente?statuscli=667&valor=1 ' + expvlplitada).success(function(data) {

        }).error(function(data) {
            $(".errormodal").show();
        });
    }

    $scope.updateStatus = function(id) {
        $http.get(projectURL + '/contact/updatestatus?status=1&id=' + id + "&token=" + token).success(
            function(data) {});
    }

    $scope.editardata = function(contact, e) {
        $("#grid").hide();
        $(".grid2").show();
        $scope.form = contact;
    }

    $scope.form = {
        email: "",
        nomecliente: "",
        statuscli: "67",
        cpf: "",
        senha: "",
        plan: "",
        telefone: "",
        tiposite: "",
        dataexpira: '',
        id: ''
    }

});
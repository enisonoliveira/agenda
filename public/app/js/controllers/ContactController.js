$('[type=phone]').mask('(00) 0000-0000');
$('[type=phone]').mask('(00) 0000-0000');

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

    $scope.search = function() {
        var url = $scope.buscar();
        $http.get(projectURL + url).success(function(data) {
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

    $scope.newModal = function(event) {
        $('#newModal').show();
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

    $scope.setIdpersons = function(id) {
        $http.post(projectURL + '/idpersons?idpersons=' + id).success(function(data) {
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

    $scope.editModel = function(e, data) {
        $('#newModal').show();
        if (typeof data.idpersons != null) {
            $('#newModal .box1').show();
        }
        $scope.setIdpersons(data.idpersons);
        $scope.form2 = data
    }


    $scope.form2 = {
        idcontact: "",
        idpersons: "",
        idaddress: "",
        name: "",
        phone: {
            number1: "",
            number2: ""
        },
        street: "",
        neighborhood: "",
        city: "",
        state: ""

    }
    $scope.contactId = {
        idpersons: ""
    }
    $scope.dzOptions = {
        url: projectURL + '/save/image?idpersons',
        paramName: 'photo',
        maxFilesize: '10',
        dictDefaultMessage: "Arraste sua foto para cá ou click aqui e selecione uma foto do seu computador",
        addRemoveLinks: true,
        dictResponseError: 'Não foi possivel carregar o arquivo.'
    };

    $scope.saveContact = function(e) {
        e.preventDefault()
        var obj = []
        var json = {
            'number': $scope.form2.phone.number1,
        }
        obj.push(json)
        json = {
            'number': $scope.form2.phone.number2,
        }
        obj.push(json)
        var data = "name=" + $scope.form2.name +
            "&number=" + $scope.form2.number +
            "&idcontact=" + $scope.form2.idcontact +
            "&idpersons=" + $scope.form2.idpersons +
            "&idaddress=" + $scope.form2.idaddress +
            "&email=" + $scope.form2.email +
            "&address=" + $scope.form2.number +
            "&address2=" + $scope.form2.neighborhood +
            "&city=" + $scope.form2.city +
            "&postalCode=" + 12312312321 +
            "&state=" + $scope.form2.state +
            "&phones=" + JSON.stringify(obj);
        $http.get(projectURL + '/save?' + data + '&token = ' + token).success(function(data) {
            $scope.contactId = data;

            $('#newModal .box').hide();
            $('#newModal .box1').show();
        }).error(function(data) {
            $(".errormodal").show();
        });
    }


    $scope.changeDefaut();

});
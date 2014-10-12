'use strict';

var HireMeApp = angular.module('HireMeApp', []);

HireMeApp.controller('SearchCtrl', function($scope, $http) {

    // Pequeño modulo que ejecuta la búsqueda y muestra los candidatos

    $scope.search = function() {

        $http.get('results', {
            params: {name: $scope.searchInput}
        }).success(function (data) {
            $scope.users = data;
        });
    };
});
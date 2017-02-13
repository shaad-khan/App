var app=angular.module("continuity",["ngRoute"]);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "home.html",
        controller: 'table_count'
    })
    .when("/ticket/:email/:type", {
        //templateUrl : "ticket.php",
				//controller: "Ticket"
				//template: "helo there"
       //resolve: resolveController('angular/controller.js')
    templateUrl: function(attrs){
         //alert('ticket.php?Email=' + attrs.email);
               return 'ticket.php'},
      controller  : 'Ticket'
    })
    .when("/green", {
        templateUrl : "green.htm"
    })
    .when("/blue", {
        templateUrl : "blue.htm"
    });
});

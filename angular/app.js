var app=angular.module("continuity",["ngRoute"]);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "home.php",
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
    .when("/credentials", {
        //templateUrl : "ticket.php",
				//controller: "Ticket"
				//template: "helo there"
       //resolve: resolveController('angular/controller.js')
    templateUrl:"credentials.php",
      controller  : "credentials"
    })
    .when("/report", {
        //templateUrl : "ticket.php",
				//controller: "Ticket"
				//template: "helo there"
       //resolve: resolveController('angular/controller.js')
    templateUrl:"report.php",
     controller  : "Report"
    })
     .when("/calender", {
        //templateUrl : "ticket.php",
				//controller: "Ticket"
				//template: "helo there"
       //resolve: resolveController('angular/controller.js')
    templateUrl:"cal.php",
     // controller  : "demo"
    })
    .when("/task", {
        templateUrl : "task.php",
         controller: 'Task'
    })
    .when("/blue", {
        templateUrl : "blue.htm"
    });
});

puzzlersApp.config(function($stateProvider, $urlRouterProvider){
  //If no url specified, redirects to home
  $urlRouterProvider.otherwise('/');

 //Sets up routes for easy maintenence i.e. don't have to retype path each time.
  $stateProvider
  .state('home', {
    url:'/',
    templateUrl: './login/login.html'
  })
   .state('registration', {
     url:'/register',
     templateUrl: './login/registration.html'
   })
   .state('submit', {
     url: '/submit',
     templateUrl: './submit.html'
   })
});
